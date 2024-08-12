<?php

namespace App\Livewire\EcommWebsite;

use Livewire\Component;

use App\NewsletterSubscription;

class SubscribeUs extends Component
{
    public $email;

    public $introMessage = 'Please enter your email address to get regular updates on our products. ';

    public function render()
    {
        return view('livewire.ecomm-website.subscribe-us');
    }

    public function store()
    {
        $validatedData = $this->validate([
            'email' => 'required|email|unique:newsletter_subscription',
        ]);

        $validatedData['status'] = 'active';

        NewsletterSubscription::create($validatedData);
        $this->resetInputFields();
        session()->flash('subscriptionMessage', 'Congratulations! Your subscription is added.');
    }

    public function resetInputFields()
    {
        $this->email = '';
    }
}
