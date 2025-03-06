<?php

namespace App\Filament\Resources\BlogPostResource\Pages;

use App\Fcore\Trait\BlogPostResource\Create;
use App\Filament\Resources\BlogPostResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateBlogPost extends CreateRecord
{
    use Create;

    protected static string $resource = BlogPostResource::class;
}
