<?php

namespace App\Livewire\NewsletterSubscription\Dashboard;

use Livewire\Component;
use Illuminate\View\View;
use App\Traits\ModesTrait;

class NewsletterSubscriptionDisplay extends Component
{
    use ModesTrait;

    public $newsletterSubscription;

    public $modes = [
        'deleteMode' => false,
    ];

    public function render(): View
    {
        return view('livewire.newsletter-subscription.dashboard.newsletter-subscription-display');
    }
}
