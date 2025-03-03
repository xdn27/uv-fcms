<?php

namespace App\Filament\Resources\BlogPostResource\Pages;

use App\Filament\Resources\BlogPostResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateBlogPost extends CreateRecord
{
    protected static string $resource = BlogPostResource::class;
    
    protected function afterCreate(): void
    {
        $data = $this->form->getState();
        if(!empty($this->record)){
            $this->handleMetaSaving($this->getRecord(), $data);
        }
    }

    private function handleMetaSaving($record, array $data): void
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
