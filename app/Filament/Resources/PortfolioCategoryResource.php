<?php

namespace App\Filament\Resources;

use App\Fcore\Trait\BlogCategoryResourceTrait;
use App\Filament\Resources\PortfolioCategoryResource\Pages;
use App\Filament\Resources\PortfolioCategoryResource\RelationManagers;
use App\Models\BlogCategory;
use App\Models\PortfolioCategory;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class PortfolioCategoryResource extends Resource
{
    use BlogCategoryResourceTrait;

    protected static ?string $model = BlogCategory::class;
    
    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';
    protected static ?string $navigationGroup = 'Portfolio';
    protected static ?int $navigationSort = 2;
    public static ?string $label = 'Category';

    public static function type()
    {
        return 'portfolio';
    }

    public static function hideType()
    {
        return true;
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListPortfolioCategories::route('/'),
            'create' => Pages\CreatePortfolioCategory::route('/create'),
            'view' => Pages\ViewPortfolioCategory::route('/{record}'),
            'edit' => Pages\EditPortfolioCategory::route('/{record}/edit'),
        ];
    }
}
