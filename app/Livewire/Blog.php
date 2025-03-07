<?php

namespace App\Livewire;

use App\Models\BlogCategory;
use App\Models\BlogPost;
use Livewire\Component;
use Livewire\WithPagination;

class Blog extends Component
{
    use WithPagination;
    
    public $categories = [];

    public function mount()
    {
        $this->categories = BlogCategory::published()->type('post')->get();
    }

    public function render()
    {
        $entries = BlogPost::type('post')->published()->paginate(10);
        return view('livewire.blog', [
            'categories' => $this->categories,
            'entries' => $entries
        ]);
    }
}
