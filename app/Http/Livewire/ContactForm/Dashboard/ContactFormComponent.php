<?php

namespace App\Http\Livewire\ContactForm\Dashboard;

use Livewire\Component;

use App\Traits\ModesTrait;

use App\ContactMessage;

class ContactFormComponent extends Component
{
    use ModesTrait;

    public $displayingContactMessage;
    public $updatingContactMessage;
    public $deletingContactMessage;

    public $modes = [
        'createContactMessageMode' => false,
        'listContactMessageMode' => true,
        'displayContactMessageMode' => false,
    ];

    protected $listeners = [
        'displayContactMessage',
    ];

    public function render()
    {
        return view('livewire.contact-form.dashboard.contact-form-component');
    }

    public function displayContactMessage(ContactMessage $contactMessage)
    {
        $this->displayingContactMessage = $contactMessage;
        $this->enterMode('displayContactMessageMode');
    }
}
