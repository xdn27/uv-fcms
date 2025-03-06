<?php

namespace App\Filament\Resources\PortfolioResource\Pages;

use App\Fcore\Trait\BlogPostResource\Edit;
use App\Filament\Resources\PortfolioResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditPortfolio extends EditRecord
{
    use Edit;

    protected static string $resource = PortfolioResource::class;
}
