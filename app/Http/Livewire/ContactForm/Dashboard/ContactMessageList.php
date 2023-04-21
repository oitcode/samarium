<?php

namespace App\Http\Livewire\ContactForm\Dashboard;

use Livewire\Component;

use App\Traits\ModesTrait;

use App\ContactMessage;

class ContactMessageList extends Component
{
    use ModesTrait;

    public $contactMessages;

    public $deletingContactMessage;

    public $modes = [
        'deleteContactMessageMode' => false,

        'showOnlyNewMode' => true,
        'showOnlyDoneMode' => false,
        'showAllMode' => false,
    ];

    public function render()
    {
        if ($this->modes['showAllMode']) {
            $this->contactMessages = ContactMessage::orderBy('contact_message_id', 'desc')->get();
        } else if ($this->modes['showOnlyNewMode']) {
            $this->contactMessages = ContactMessage::where('status', 'new')->orderBy('contact_message_id', 'desc')->get();
        } else if ($this->modes['showOnlyDoneMode']) {
            $this->contactMessages = ContactMessage::where('status', 'done')->orderBy('contact_message_id', 'desc')->get();
        } else {
            dd ('Whoops');
        }

        return view('livewire.contact-form.dashboard.contact-message-list');
    }

    public function deleteContactMessage(ContactMessage $contactMessage)
    {
        $this->deletingContactMessage = $contactMessage;
        $this->enterMode('deleteContactMessageMode');
    }

    public function deleteContactMessageCancel()
    {
        $this->deletingContactMessage = null;
        $this->exitMode('deleteContactMessageMode');
    }

    public function confirmDeleteContactMessage()
    {
        $this->deletingContactMessage->delete();

        $this->deletingContactMessage = null; 
        $this->exitMode('deleteContactMessageMode');

    }
}
