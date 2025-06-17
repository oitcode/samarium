<?php

namespace App\Livewire\Cms\Website;

use Livewire\Component;
use Illuminate\View\View;
use App\Company;
use App\Models\ContactMessage\ContactMessage;

class ContactComponent extends Component
{
    public $company;

    public $sender_name;
    public $sender_email;
    public $sender_phone;
    public $message;

    public $onlyForm = 'no';

    public function render(): View
    {
        $this->company = Company::first();
        return view('livewire.cms.website.contact-component');
    }

    public function store(): void
    {
        $validatedData = $this->validate([
            'sender_name' => 'nullable',
            'sender_email' => 'nullable|email',
            'sender_phone' => 'required',
            'message' => 'required',
        ]);

        $validatedData['status'] = 'new';

        ContactMessage::create($validatedData);

        $this->resetInputFields();
        session()->flash('message', 'Contact message received. Thanks!');
    }

    public function resetInputFields(): void
    {
        $this->sender_name = '';
        $this->sender_email = '';
        $this->sender_phone = '';
        $this->message = '';
    }
}
