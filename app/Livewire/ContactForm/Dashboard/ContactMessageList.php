<?php

namespace App\Livewire\ContactForm\Dashboard;

use Livewire\Component;
use Illuminate\View\View;
use Livewire\WithPagination;
use App\Traits\ModesTrait;
use App\Services\ContactMessage\ContactMessageService;
use App\ContactMessage;

/**
 * ContactMessageList Component
 * 
 * This Livewire component handles the listing of contact messages.
 * It also handles deletion of contact messages.
 */
class ContactMessageList extends Component
{
    use ModesTrait;
    use WithPagination;

    /**
     * Contact messages per pagination
     *
     * @var int
     */
    public $perPage = 5;

    /**
     * Total count of contact messages
     *
     * @var int
     */
    public $totalContactMessageCount;

    /**
     * Contact message which needs to be deleted
     *
     * @var ContactMessage
     */
    public $deletingContactMessage;

    /**
     * Component display modes
     *
     * @var array
     */
    public $modes = [
        'deleteContactMessageMode' => false,

        'showOnlyNewMode' => true,
        'showOnlyProgressMode' => false,
        'showOnlyDoneMode' => false,
        'showAllMode' => false,

        'confirmDelete' => false, 
        'cannotDelete' => false, 
    ];

    /**
     * Render the component
     *
     * @return \Illuminate\View\View
     */
    public function render(ContactMessageService $contactMessageService): View
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

        $this->totalContactMessageCount = $contactMessages->count();

        return view('livewire.contact-form.dashboard.contact-message-list', [
            'contactMessages' => $contactMessages,
        ]);
    }

    /**
     * Confirm if user really wants to delete a contact message
     *
     * @return void
     */
    public function confirmDeleteContactMessage(int $contact_message_id, ContactMessageService $contactMessageService): void
    {
        $this->deletingContactMessage = ContactMessage::find($contact_message_id);

        if ($contactMessageService->canDeleteContactMessage($contact_message_id)) {
            $this->enterModeSilent('confirmDelete');
        } else {
            $this->enterModeSilent('cannotDelete');
        }
    }

    /**
     * Cancel contact message delete
     *
     * @return void
     */
    public function cancelDeleteContactMessage(): void
    {
        $this->deletingContactMessage = null;
        $this->exitMode('confirmDelete');
    }

    /**
     * Turn off the mode that shows that a contact message cannot be deleted
     *
     * @return void
     */
    public function cancelCannotDeleteContactMessage(): void
    {
        $this->deletingContactMessage = null;
        $this->exitMode('cannotDelete');
    }

    /**
     * Delete contact message
     *
     * @return void
     */
    public function deleteContactMessage(ContactMessageService $contactMessageService): void
    {
        $contactMessageService->deleteContactMessage($this->deletingContactMessage->contact_message_id);
        $this->deletingContactMessage = null;
        $this->exitMode('confirmDelete');
    }
}
