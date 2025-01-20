<?php

namespace App\Livewire\NewsletterSubscription\Dashboard;

use Livewire\Component;
use Livewire\WithPagination;

use App\NewsletterSubscription;

class NewsletterSubscriptionList extends Component
{
    use WithPagination;

    // public $newsletterSubscriptions;
    public $newsletterSubscriptionsCount;

    public function render()
    {
        $newsletterSubscriptions = NewsletterSubscription::orderBy('newsletter_subscription_id', 'DESC')->paginate(5);
        $this->newsletterSubscriptionsCount = NewsletterSubscription::count();

        return view('livewire.newsletter-subscription.dashboard.newsletter-subscription-list')
            ->with('newsletterSubscriptions', $newsletterSubscriptions);
    }
}
