<?php

namespace App\Livewire;

use Livewire\Component;

class Landing extends Component
{
    public function render()
    {
        sleep(5);
        return view('livewire.landing');
    }
}
