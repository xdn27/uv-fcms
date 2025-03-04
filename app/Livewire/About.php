<?php

namespace App\Livewire;

use Livewire\Component;

class About extends Component
{
    public function render()
    {
        sleep(5);
        return view('livewire.about');
    }
}
