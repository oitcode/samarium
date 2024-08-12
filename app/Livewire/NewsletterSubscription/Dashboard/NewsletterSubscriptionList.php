<?php

namespace App\Livewire\NewsletterSubscription\Dashboard;

use Livewire\Component;

use App\NewsletterSubscription;

class NewsletterSubscriptionList extends Component
{
    public $newsletterSubscriptions;
    public $newsletterSubscriptionsCount;

    public function render()
    {
        $this->newsletterSubscriptions = NewsletterSubscription::all();
        $this->newsletterSubscriptionsCount = NewsletterSubscription::count();

        return view('livewire.newsletter-subscription.dashboard.newsletter-subscription-list');
    }
}
