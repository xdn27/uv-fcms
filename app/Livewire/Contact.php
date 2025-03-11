<?php

namespace App\Livewire;

use App\Models\Contact as ModelsContact;
use App\Models\Setting;
use Livewire\Component;

class Contact extends Component
{
    public $name;
    public $email;
    public $message;

    public function submit()
    {
        sleep(10);
        
        $this->validate([
            'name' => 'required',
            'email' => 'required|email',
            'message' => 'required'
        ]);

        ModelsContact::create([
            'name' => $this->name,
            'email' => $this->email,
            'message' => $this->message
        ]);
    }

    public function render()
    {
        $contact = Setting::getByGroup('contact');
        return view('livewire.contact', [
            'contact' => $contact
        ]);
    }
}
