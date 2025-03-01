<?php

namespace App\Livewire\ContactForm\Dashboard;

use Livewire\Component;
use Illuminate\View\View;

class ContactMessageCreate extends Component
{
    public function render(): View
    {
        return view('livewire.contact-form.dashboard.contact-message-create');
    }
}
