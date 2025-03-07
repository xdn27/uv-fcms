<?php

namespace App\Fcore\Trait;

use App\Fcore\Class\BlockSchema;
use App\Filament\Resources\BlogPostResource\Pages;
use App\Filament\Resources\BlogPostResource\RelationManagers;
use App\Models\BlogCategory;
use App\Models\BlogPost;
use App\Models\BlogPostMeta;
use App\Models\BlogPostMetaTemplate;
use App\Models\BlogPostType;
use Filament\Forms;
use Filament\Forms\Components\Builder;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Grid;
use Filament\Forms\Components\Hidden;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Split;
use Filament\Forms\Components\TagsInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Form;
use Filament\Forms\Get;
use Filament\Forms\Set;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\ToggleColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder as EloquentBuilder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Illuminate\Support\Str;

trait BlogPostResourceTrait
{
    public static function type()
    {
        return 'post';
    }

    public static function disableType()
    {
        return true;
    }

    public static function hideType()
    {
        return false;
    }

    public static function hideFields()
    {
        return [];
    }

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Section::make([
                    Hidden::make('user_id')->default(auth()->id()),
                    TextInput::make('title')
                        ->required()
                        ->live(onBlur: true)
                        ->afterStateUpdated(fn(Set $set, ?string $state) => $set('slug', Str::slug($state))),
                    Textarea::make('summary')
                        ->rows(3)
                        ->columnSpanFull()
                        ->hidden(fn() => in_array('summary', self::hideFields())),
                    Grid::make(2)
                        ->schema(function (Get $get) {

                            if (empty($get('type')) || empty($get('metas'))) {
                                return [];
                            }

                            $metas = $get('metas');
                            $fields = [];
                            foreach ($metas['key'] as $i => $key) {
                                $fields[] = Hidden::make('metas.key.' . $i)
                                    ->default($key);
                                $fields[] = TextInput::make('metas.value.' . $i)
                                    ->label($key)
                                    ->default($metas['value'][$i] ?? null);
                            }

                            return $fields;
                        }),
                    Toggle::make('is_using_builder')
                        ->label('Use Builder')
                        ->live()
                        ->columnSpanFull()
                        ->afterStateUpdated(fn(Set $set, ?bool $state) => $state ? $set('body_html', null) : $set('body_json', null)),
                    RichEditor::make('body_html')
                        ->label('Content')
                        ->default(null)
                        ->columnSpanFull()
                        ->hidden(fn(Get $get): bool => $get('is_using_builder') != false),
                    Builder::make('body_json')
                        ->label('Content')
                        ->default(null)
                        ->blocks(BlockSchema::getList())
                        ->columnSpanFull()
                        ->hidden(fn(Get $get): bool => $get('is_using_builder') != true),
                ])->columnSpan(8),
                Grid::make(1)->schema([
                    Section::make([
                        Toggle::make('is_published')->label('Publish'),
                        Select::make('type')
                            ->required()
                            ->options(BlogPostType::where('is_active', 1)->pluck('name', 'id'))
                            ->default(function () {
                                if (!empty(self::type())) {
                                    return self::type();
                                }

                                return BlogPostType::where('is_default', 1)->first()->id;
                            })
                            ->disabled(self::disableType())
                            ->hidden(self::hideType())
                            ->live()
                            ->afterStateHydrated(function(Get $get, Set $set, ?string $state){
                                if(empty($state)){
                                    return;
                                }

                                $metas = BlogPostMeta::where('post_id', $get('id'))->get();
                                if($metas->count() > 0){
                                    foreach ($metas as $i => $meta){
                                        $set('metas.key.'.$i, $meta->key);
                                        $set('metas.value.'.$i, $meta->value);
                                    }
                                }else{
                                    $template = BlogPostMetaTemplate::where('post_type', $state)->first();
                                    if (!empty($template)) {
                                        $if = 0;
                                        foreach ($template->meta as $field => $default) {
                                            $set('metas.key.'.$if, $field);
                                            $set('metas.value.'.$if, $default);
                                            $if++;
                                        }
                                    }
                                }
                            })
                            ->afterStateUpdated(function(Set $set, ?string $state){
                                if(empty($state)){
                                    return;
                                }

                                $template = BlogPostMetaTemplate::where('post_type', $state)->first();
                                if (!empty($template)) {
                                    $if = 0;
                                    foreach ($template->meta as $field => $default) {
                                        $set('metas.key.'.$if, $field);
                                        $set('metas.value.'.$if, $default);
                                        $if++;
                                    }
                                }else{
                                    $set('metas.key', []);
                                    $set('metas.value', []);
                                }
                            }),
                        Hidden::make('type')->default(function () {
                                if (!empty(self::type())) {
                                    return self::type();
                                }
            
                                return BlogPostType::where('is_default', 1)->first()->id;
                            })->disabled(!self::disableType()),
                        TextInput::make('slug')->required()->unique(ignoreRecord: true),
                        DatePicker::make('post_at')
                            ->required()
                            ->default(now())
                            ->native(false),
                        Select::make('categories')
                            ->relationship('categories', 'title')
                            ->multiple()
                            ->searchable()
                            ->getSearchResultsUsing(fn(string $search): array => BlogCategory::type(self::type())->published()->where('title', 'like', "%{$search}%")->limit(5)->pluck('title', 'id')->toArray())
                            ->getOptionLabelsUsing(fn(array $values): array => BlogCategory::type(self::type())->published()->whereIn('id', $values)->pluck('title', 'id')->toArray())
                            // ->preload()
                            ->saveRelationshipsUsing(function (BlogPost $post, $state) {
                                $post->categories()->sync($state);
                            })
                    ]),
                    Section::make([
                        FileUpload::make('banner')
                            ->image()
                            ->imageEditor()
                            ->optimize('webp')
                            ->directory('post')
                            ->columnSpanFull(),
                    ])
                ])->columnSpan(4)
            ])->columns(12);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('title')->searchable()->sortable(),
                TextColumn::make('slug'),
                TextColumn::make('post_at'),
                ToggleColumn::make('is_published')->label('Published')
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListBlogPosts::route('/'),
            'create' => Pages\CreateBlogPost::route('/create'),
            'view' => Pages\ViewBlogPost::route('/{record}'),
            'edit' => Pages\EditBlogPost::route('/{record}/edit'),
        ];
    }

    public static function getEloquentQuery(): EloquentBuilder
    {
        return parent::getEloquentQuery()->where('type', self::type());
    }
}
