<?php

namespace App\Filament\Resources\BlogPostResource\Pages;

use App\Filament\Resources\BlogPostResource;
use App\Models\BlogPost;
use App\Models\BlogPostMeta;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditBlogPost extends EditRecord
{
    protected static string $resource = BlogPostResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\ViewAction::make(),
            Actions\DeleteAction::make(),
        ];
    }

    protected function beforeSave(): void
    {
        $data = $this->form->getState();
        // $this->record->metas = $data['metas'] ?? [];
        unset($data['metas']);
        $this->form->fill($data);
    }

    protected function afterSave(): void
    {
        $data = $this->form->getState();
        dd($data, $this->record);
        $this->handleMetaSaving($this->record, $data);
    }

    private function handleMetaSaving(BlogPost $record, array $data): void
    {
        // dd($data);
        $metas = collect($data['metas'] ?? [])
        ->map(function ($meta) {
            return [
                'key' => $meta['key'],
                'value' => $meta['value']
            ];
        });

        // Clear existing metas
        $record->metas()->delete();

        // Create new metas
        $record->metas()->createMany($metas->toArray());
    }
}
