<?php

namespace App\Livewire\ContactForm\Dashboard;

use Livewire\Component;
use Illuminate\View\View;
use App\Traits\ModesTrait;

class ContactMessageDisplay extends Component
{
    use ModesTrait;

    public $contactMessage;

    public $contact_message_status;

    public $modes = [
        'updateStatus' => false,
    ];

    public function render(): View
    {
        return view('livewire.contact-form.dashboard.contact-message-display');
    }

    public function changeStatus(): void
    {
        /* Todo: Validation */

        $this->contactMessage->status = $this->contact_message_status;
        $this->contactMessage->save();
        $this->contactMessage = $this->contactMessage->fresh();
        $this->exitMode('updateStatus');

        session()->flash('message', 'Status updated');
    }
}
