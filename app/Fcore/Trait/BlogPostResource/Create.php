<?php

namespace App\Fcore\Trait\BlogPostResource;

trait Create
{
    protected function afterCreate(): void
    {
        $data = $this->form->getState();
        if(!empty($this->record)){
            $this->handleMetaSaving($this->getRecord(), $data);
        }
    }

    public function handleMetaSaving($record, array $data): void
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
