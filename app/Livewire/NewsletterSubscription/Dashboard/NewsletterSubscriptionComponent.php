<?php

namespace App\Livewire\NewsletterSubscription\Dashboard;

use Livewire\Component;

use App\Traits\ModesTrait;

use App\NewsletterSubscription;

class NewsletterSubscriptionComponent extends Component
{
    use ModesTrait;

    public $displayingNewsletterSubscription;

    public $modes = [
        'createMode' => false,
        'listMode' => true,
        'displayMode' => false,
        'updateMode' => false,
        'deleteMode' => false,
    ];

    public $listeners = [
        'displayNewsletterSubscription',
        'exitNewsletterSubscriptionDisplay',
    ];

    public function render()
    {
        return view('livewire.newsletter-subscription.dashboard.newsletter-subscription-component');
    }

    public function displayNewsletterSubscription(NewsletterSubscription $newsletterSubscription)
    {
        $this->displayingNewsletterSubscription = $newsletterSubscription;

        $this->enterMode('displayMode');
    }

    public function exitNewsletterSubscriptionDisplay()
    {
        $this->displayingNewsletterSubscription = null;
        $this->exitMode('displayMode');
    }
}
