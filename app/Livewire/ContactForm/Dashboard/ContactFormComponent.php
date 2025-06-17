<?php

namespace App\Livewire\ContactForm\Dashboard;

use Livewire\Component;
use Illuminate\View\View;
use App\Traits\ModesTrait;
use App\Models\ContactMessage\ContactMessage;

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
        'exitContactMessageDisplay'
    ];

    public function render(): View
    {
        return view('livewire.contact-form.dashboard.contact-form-component');
    }

    public function displayContactMessage(int $contactMessageId): void
    {
        $this->displayingContactMessage = ContactMessage::find($contactMessageId);
        $this->enterMode('displayContactMessageMode');
    }

    public function exitContactMessageDisplay(): void
    {
        $this->displayingContactMessage = null;
        $this->exitMode('displayContactMessageMode');
    }
}
