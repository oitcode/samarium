<?php

namespace App\Livewire\ContactForm\Dashboard;

use Livewire\Component;
use Illuminate\View\View;
use App\Models\ContactMessage\ContactMessage;

class ContactMessageGlanceComponent extends Component
{
    public $contactMessageCount;
    public $newContactMessageCount;

    public function render(): View
    {
        $this->contactMessageCount = ContactMessage::count();
        $this->newContactMessageCount = ContactMessage::where('status', 'new')->count();

        return view('livewire.contact-form.dashboard.contact-message-glance-component');
    }
}
