<?php

namespace App\Fcore\Trait\BlogPostResource;

use Filament\Actions;

trait Edit
{
    protected function getHeaderActions(): array
    {
        return [
            // Actions\ViewAction::make(),
            Actions\DeleteAction::make(),
        ];
    }

    protected function afterSave(): void
    {
        $data = $this->form->getState();
        $this->handleMetaSaving($this->record, $data);
    }

    public function handleMetaSaving($record, array $data): void
    {
        $record->postMeta()->delete();
        if(isset($data['metas']['key'])){
            foreach($data['metas']['key'] as $i => $key){
                $record->postMeta()->updateOrCreate([
                    'post_id' => $record->id,
                    'key' => $key
                ], [
                    'value' => $data['metas']['value'][$i] ?? null
                ]);
            }
        }
    }
}
