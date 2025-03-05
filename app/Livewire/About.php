<?php

namespace App\Livewire;

use App\Models\Page;
use Livewire\Component;

class About extends Component
{
    public function render()
    {
        $data = Page::where('slug', 'about')->first();
        return view('livewire.about', [
            'data' => $data
        ]);
    }
}
