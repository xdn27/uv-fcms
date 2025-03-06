<?php

namespace App\Livewire;

use App\Models\BlogCategory;
use Livewire\Component;

class Blog extends Component
{
    public $categories = [];

    public function mount()
    {
        $this->categories = BlogCategory::published()->type('post')->get();
    }

    public function render()
    {
        return view('livewire.blog', [
            'categories' => $this->categories
        ]);
    }
}
