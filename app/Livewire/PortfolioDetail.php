<?php

namespace App\Livewire;

use App\Models\BlogPost;
use Livewire\Component;

class PortfolioDetail extends Component
{
    public $post;
    public $prev;
    public $next;

    public function mount($slug)
    {
        $this->post = BlogPost::published()->where('slug', $slug)->first();
        if(empty($this->post)){
            abort(404);
        }

        $this->prev = BlogPost::select('title', 'slug')->type('portfolio')->published()->whereNot('slug', $slug)->where('post_at', '<', $this->post->post_at)->orderBy('post_at', 'desc')->first();
        $this->next = BlogPost::select('title', 'slug')->type('portfolio')->published()->whereNot('slug', $slug)->where('post_at', '>=', $this->post->post_at)->orderBy('post_at', 'asc')->first();
    }

    public function render()
    {
        return view('livewire.portfolio-detail', [
            'post' => $this->post,
            'prev' => $this->prev,
            'next' => $this->next
        ]);
    }
}
