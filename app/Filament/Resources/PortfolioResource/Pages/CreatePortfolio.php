<?php

namespace App\Filament\Resources\PortfolioResource\Pages;

use App\Fcore\Trait\BlogPostResource\Create;
use App\Filament\Resources\PortfolioResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreatePortfolio extends CreateRecord
{
    use Create;
    
    protected static string $resource = PortfolioResource::class;
}
