<?php

namespace App\Livewire\ContactForm\Dashboard;

use Livewire\Component;
use Livewire\WithPagination;
use App\Traits\ModesTrait;
use App\ContactMessage;

class ContactMessageList extends Component
{
    use ModesTrait;
    use WithPagination;

    // public $contactMessages;

    public $deletingContactMessage;

    public $contactMessageCount;

    public $modes = [
        'deleteContactMessageMode' => false,

        'showOnlyNewMode' => true,
        'showOnlyProgressMode' => false,
        'showOnlyDoneMode' => false,
        'showAllMode' => false,
    ];

    public function render()
    {
        $contactMessages = null;

        if ($this->modes['showAllMode']) {
            $contactMessages = ContactMessage::orderBy('contact_message_id', 'desc')->paginate(5);
        } else if ($this->modes['showOnlyNewMode']) {
            $contactMessages = ContactMessage::where('status', 'new')->orderBy('contact_message_id', 'desc')->paginate(5);
        } else if ($this->modes['showOnlyProgressMode']) {
            $contactMessages = ContactMessage::where('status', 'progress')->orderBy('contact_message_id', 'desc')->paginate(5);
        } else if ($this->modes['showOnlyDoneMode']) {
            $contactMessages = ContactMessage::where('status', 'done')->orderBy('contact_message_id', 'desc')->paginate(5);
        } else {
            // Todo
        }

        $this->contactMessageCount = count($contactMessages);

        return view('livewire.contact-form.dashboard.contact-message-list')
            ->with('contactMessages', $contactMessages);
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
