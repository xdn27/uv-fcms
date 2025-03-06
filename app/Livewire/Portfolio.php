<?php

namespace App\Livewire;

use App\Models\BlogCategory;
use Livewire\Component;

class Portfolio extends Component
{
    public $categories = [];

    public function mount()
    {
        $this->categories = BlogCategory::published()->type('portfolio')->get();
    }
    
    public function render()
    {
        return view('livewire.portfolio', [
            'categories' => $this->categories
        ]);
    }
}
