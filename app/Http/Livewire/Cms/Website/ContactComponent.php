<?php

namespace App\Http\Livewire\Cms\Website;

use Livewire\Component;

use App\Company;
use App\ContactMessage;

class ContactComponent extends Component
{
    public $company;

    public $sender_name;
    public $sender_email;
    public $sender_phone;
    public $message;

    public function render()
    {
        $this->company = Company::first();
        return view('livewire.cms.website.contact-component');
    }

    public function store()
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

    public function resetInputFields()
    {
        $this->sender_name = '';
        $this->sender_email = '';
        $this->sender_phone = '';
        $this->message = '';
    }
}
