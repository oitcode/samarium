<?php

namespace App\Http\Livewire\ContactForm\Dashboard;

use Livewire\Component;

class ContactMessageDisplay extends Component
{
    public $contactMessage;

    public function render()
    {
        return view('livewire.contact-form.dashboard.contact-message-display');
    }
}
