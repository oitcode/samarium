<?php

namespace App\Livewire\EcommWebsite;

use Illuminate\View\View;
use Livewire\Component;
use App\NewsletterSubscription;

use App\Events\NewsletterSubscriptionCreated;

class SubscribeUs extends Component
{
    public string $email;

    public string $introMessage = 'Please enter your email address to get regular updates on our products. ';

    public function render(): View
    {
        return view('livewire.ecomm-website.subscribe-us');
    }

    public function store(): void
    {
        $validatedData = $this->validate([
            'email' => 'required|email|unique:newsletter_subscription',
        ]);

        $validatedData['status'] = 'active';

        $newsletterSubscription = NewsletterSubscription::create($validatedData);

        $this->resetInputFields();

        NewsletterSubscriptionCreated::dispatch($newsletterSubscription);

        session()->flash('subscriptionMessage', 'Congratulations! Your subscription is added.');
    }

    public function resetInputFields(): void
    {
        $this->email = '';
    }
}
