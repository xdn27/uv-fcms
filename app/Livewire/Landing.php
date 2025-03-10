<?php

namespace App\Livewire;

use App\Models\BlogPost;
use Livewire\Component;

class Landing extends Component
{
    public function mount()
    {

    }

    public function render()
    {
        $entries = BlogPost::type('portfolio')->published()->orderBy('post_at', 'desc')->paginate(5);
        return view('livewire.landing', [
            'entries' => $entries
        ]);
    }
}
