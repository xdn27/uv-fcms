<?php

namespace App\Filament\Resources;

use App\Filament\Resources\BlogPostMetaTemplateResource\Pages;
use App\Filament\Resources\BlogPostMetaTemplateResource\RelationManagers;
use App\Models\BlogPostMetaTemplate;
use App\Models\BlogPostType;
use Filament\Forms;
use Filament\Forms\Components\KeyValue;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class BlogPostMetaTemplateResource extends Resource
{
    protected static ?string $model = BlogPostMetaTemplate::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';
    protected static ?string $navigationGroup = 'Other';
    protected static ?int $navigationSort = 101;
    public static ?string $label = 'Meta Templates';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('name')
                    ->required(),
                Select::make('post_type')
                    ->options(BlogPostType::where('is_active', 1)->pluck('name', 'id')),
                KeyValue::make('meta')
                    ->addActionLabel('Add Field')
                    ->keyLabel('Field Name')
                    ->valueLabel('Default Value')
                    ->columnSpanFull()
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('name')->searchable()->sortable(),
                TextColumn::make('post_type')->searchable()->sortable(),
                TextColumn::make('created_at')->sortable()
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
            'index' => Pages\ListBlogPostMetaTemplates::route('/'),
            'create' => Pages\CreateBlogPostMetaTemplate::route('/create'),
            'edit' => Pages\EditBlogPostMetaTemplate::route('/{record}/edit'),
        ];
    }
}
