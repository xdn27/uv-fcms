<?php

namespace App\Livewire;

use App\Models\BlogPost;
use Livewire\Component;

class PortfolioDetail extends Component
{
    public function render()
    {
        $post = BlogPost::where('slug', request()->route('slug'))->first();
        return view('livewire.portfolio-detail', [
            'post' => $post
        ]);
    }
}
