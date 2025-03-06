<?php

namespace App\Filament\Resources;

use App\Fcore\Class\BlockSchema;
use App\Fcore\Interface\BlockSchema as InterfaceBlockSchema;
use App\Filament\Resources\PageResource\Pages;
use App\Filament\Resources\PageResource\RelationManagers;
use App\Models\Page;
use Filament\Forms;
use Filament\Forms\Components\Builder;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Grid;
use Filament\Forms\Components\Hidden;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\ToggleColumn;
use Filament\Tables\Table;

class PageResource extends Resource
{
    protected static ?string $model = Page::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';


    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Section::make([
                    Hidden::make('user_id')->default(auth()->id()),
                    TextInput::make('title'),
                    FileUpload::make('banner')
                        ->image()
                        ->imageEditor()
                        ->directory('page')
                        ->optimize('webp'),
                ])->columnSpan(8),
                Section::make([
                    Toggle::make('is_published')->label('Publish'),
                    TextInput::make('slug'),
                ])->columnSpan(4),
                Section::make([
                    Grid::make(3)->schema([
                        Builder::make('body_json.left')->blocks(BlockSchema::getList())->label(''),
                        Builder::make('body_json.middle')->blocks(BlockSchema::getList())->label(''),
                        Builder::make('body_json.right')->blocks(BlockSchema::getList())->label('')
                    ])
                ])
            ])->columns(12);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('title')->searchable()->sortable(),
                TextColumn::make('slug'),
                TextColumn::make('type'),
                ToggleColumn::make('is_published')->label('Publish'),
                TextColumn::make('updated_at')
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
            'index' => Pages\ListPages::route('/'),
            'create' => Pages\CreatePage::route('/create'),
            'view' => Pages\ViewPage::route('/{record}'),
            'edit' => Pages\EditPage::route('/{record}/edit'),
        ];
    }
}
