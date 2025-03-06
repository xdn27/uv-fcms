<?php

namespace App\Fcore\Trait;

use App\Filament\Resources\BlogCategoryResource\Pages;
use App\Filament\Resources\BlogCategoryResource\RelationManagers;
use App\Models\BlogCategory;
use App\Models\BlogPostType;
use Filament\Forms;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Hidden;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\ToggleColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

trait BlogCategoryResourceTrait
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
        return true;
    }

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('title')->required(),
                TextInput::make('slug')->required()->unique(ignoreRecord: true),
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
                    ->hidden(self::hideType()),
                Hidden::make('type')->default(function () {
                    if (!empty(self::type())) {
                        return self::type();
                    }

                    return BlogPostType::where('is_default', 1)->first()->id;
                })->disabled(!self::disableType()),
                FileUpload::make('banner')
                    ->image()
                    ->imageEditor()
                    ->columnSpanFull(),
                Toggle::make('is_published')->label('Publish')
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('title')->searchable()->sortable(),
                TextColumn::make('slug'),
                ToggleColumn::make('is_published')->sortable()->label('Published')
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
            'index' => Pages\ListBlogCategories::route('/'),
            'create' => Pages\CreateBlogCategory::route('/create'),
            'edit' => Pages\EditBlogCategory::route('/{record}/edit'),
        ];
    }

    public static function getEloquentQuery(): Builder
    {
        return parent::getEloquentQuery()->where('type', self::type());
    }
}
