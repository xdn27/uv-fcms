<?php

namespace App\Livewire;

use App\Models\Page;
use Livewire\Component;

class About extends Component
{
    public $data;

    public function mount()
    {
        $this->data = Page::where('slug', 'about')->first();    
        if(empty($data)){
            abort(404);
        }    
    }

    public function render()
    {
        return view('livewire.about', [
            'data' => $this->data
        ]);
    }
}
