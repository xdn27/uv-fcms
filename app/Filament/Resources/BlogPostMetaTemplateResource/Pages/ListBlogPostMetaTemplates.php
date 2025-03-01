<?php

namespace App\Filament\Resources\BlogPostMetaTemplateResource\Pages;

use App\Filament\Resources\BlogPostMetaTemplateResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListBlogPostMetaTemplates extends ListRecords
{
    protected static string $resource = BlogPostMetaTemplateResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
