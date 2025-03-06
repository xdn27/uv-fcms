<?php

namespace App\Filament\Resources;

use App\Fcore\Trait\BlogPostResourceTrait;
use App\Filament\Resources\PortfolioResource\Pages;
use App\Filament\Resources\PortfolioResource\RelationManagers;
use App\Models\BlogPost;
use App\Models\Portfolio;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class PortfolioResource extends Resource
{
    use BlogPostResourceTrait;
    
    protected static ?string $model = BlogPost::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';
    protected static ?string $navigationGroup = 'Portfolio';
    protected static ?int $navigationSort = 1;
    public static ?string $label = 'Entries';

    public static function type()
    {
        return 'portfolio';
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
        return ['summary'];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListPortfolios::route('/'),
            'create' => Pages\CreatePortfolio::route('/create'),
            'view' => Pages\ViewPortfolio::route('/{record}'),
            'edit' => Pages\EditPortfolio::route('/{record}/edit'),
        ];
    }
}
