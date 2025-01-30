<?php

namespace App\Livewire\ContactForm\Dashboard;

use Livewire\Component;
use App\ContactMessage;

class ContactMessageGlanceComponent extends Component
{
    public $contactMessageCount;
    public $newContactMessageCount;

    public function render()
    {
        $this->contactMessageCount = ContactMessage::count();
        $this->newContactMessageCount = ContactMessage::where('status', 'new')->count();

        return view('livewire.contact-form.dashboard.contact-message-glance-component');
    }
}
