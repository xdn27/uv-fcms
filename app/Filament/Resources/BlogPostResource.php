<?php

namespace App\Filament\Resources;

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
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Illuminate\Support\Str;

class BlogPostResource extends Resource
{
    protected static ?string $model = BlogPost::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';
    protected static ?string $navigationGroup = 'Blogging';
    protected static ?int $navigationSort = 1;
    public static ?string $label = 'Post';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Section::make([
                    Hidden::make('user_id')->default(auth()->id()),
                    TextInput::make('title')
                        ->required()
                        ->live(onBlur: true)
                        ->afterStateUpdated(fn (Set $set, ?string $state) => $set('slug', Str::slug($state))),
                    Textarea::make('summary')
                        ->rows(3)
                        ->columnSpanFull(),
                    Grid::make(2)
                        ->schema(function(Get $get){
                            
                            if(empty($get('type'))){
                                return [];
                            }

                            $templates = BlogPostMetaTemplate::where('post_type', $get('type'))->get();
                            $fields = [];
                            foreach($templates as $it => $template){

                                $if = 0;
                                foreach($template->meta as $field => $default){
                                    $fields[] = Hidden::make('metas'.$it.$if.'.key')->default($field);
                                    $fields[] = TextInput::make('metas'.$it.$if.'.value')->label($field);

                                    $if++;
                                }
                            }
                            
                            return $fields;
                        })
                        ->key('MetaPost')
                        ->statePath('metas'),
                    Toggle::make('is_using_builder')
                        ->label('Use Builder')
                        ->live()
                        ->columnSpanFull()
                        ->afterStateUpdated(fn (Set $set, ?bool $state) => $state ? $set('body_html', null) : $set('body_json', null)),
                    RichEditor::make('body_html')
                        ->label('Content')
                        ->default(null)
                        ->columnSpanFull()
                        ->hidden(fn (Get $get): bool => $get('is_using_builder') != false),
                    Builder::make('body_json')
                        ->label('Content')
                        ->default(null)
                        ->columnSpanFull()
                        ->hidden(fn (Get $get): bool => $get('is_using_builder') != true),
                ])->columnSpan(8),
                Grid::make(1)->schema([
                    Section::make([
                        Toggle::make('is_published')->label('Publish'),
                        Select::make('type')
                            ->required()
                            ->options(BlogPostType::where('is_active', 1)->pluck('name', 'id'))
                            ->default(fn() => BlogPostType::where('is_default', 1)->first()->id)
                            ->live()
                            ->afterStateUpdated(function (Select $component){
                                $section = $component->getContainer()->getComponent('MetaPost');
                                if($section){
                                    $section->getChildComponentContainer()->fill();
                                    $this->form->fill(['metas' => []]);
                                }
                            }),
                        TextInput::make('slug')->required(),
                        DatePicker::make('post_at')
                            ->required()
                            ->default(now())
                            ->native(false),
                        Select::make('categories')
                            ->relationship('categories', 'title')
                            ->multiple()
                            ->searchable()
                            ->getSearchResultsUsing(fn (string $search): array => BlogCategory::where('title', 'like', "%{$search}%")->limit(5)->pluck('title', 'id')->toArray())
                            ->getOptionLabelsUsing(fn (array $values): array => BlogCategory::whereIn('id', $values)->pluck('title', 'id')->toArray())
                            ->preload()
                            ->saveRelationshipsUsing(function (BlogPost $post, $state) {
                                $post->categories()->sync($state);
                            })
                    ]),
                    Section::make([
                        FileUpload::make('banner')
                            ->image()
                            ->imageEditor()
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
                ToggleColumn::make('is_published')
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\ViewAction::make(),
                Tables\Actions\EditAction::make(),
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
}
