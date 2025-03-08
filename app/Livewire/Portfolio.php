<?php

namespace App\Livewire;

use App\Models\BlogCategory;
use App\Models\BlogPost;
use Livewire\Component;
use Livewire\WithPagination;

class Portfolio extends Component
{
    use WithPagination;
    
    public $categories = [];

    public function mount()
    {
        $this->categories = BlogCategory::published()->type('portfolio')->get();
    }
    
    public function render()
    {
        $entries = BlogPost::type('portfolio')->published()->orderBy('post_at', 'desc')->paginate(12);
        return view('livewire.portfolio', [
            'categories' => $this->categories,
            'entries' => $entries
        ]);
    }
}
