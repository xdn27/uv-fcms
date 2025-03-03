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

    protected function afterSave(): void
    {
        $data = $this->form->getState();
        $this->handleMetaSaving($this->record, $data);
    }

    private function handleMetaSaving(BlogPost $record, array $data): void
    {
        $metas = [];
        if(isset($data['metas']['key'])){
            foreach($data['metas']['key'] as $i => $key){
                $metas[] = [
                    'post_id' => $record->id,
                    'key' => $key,
                    'value' => $data['metas']['value'][$i] ?? null
                ];
            }
        }

        $record->postMeta()->upsert($metas, ['post_id', 'key']);
    }
}
