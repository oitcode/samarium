<?php

namespace App\Http\Livewire\NewsletterSubscription\Dashboard;

use Livewire\Component;

use App\Traits\ModesTrait;

class NewsletterSubscriptionDisplay extends Component
{
    use ModesTrait;

    public $newsletterSubscription;

    public $modes = [
        'deleteMode' => false,
    ];

    public function render()
    {
        return view('livewire.newsletter-subscription.dashboard.newsletter-subscription-display');
    }
}
