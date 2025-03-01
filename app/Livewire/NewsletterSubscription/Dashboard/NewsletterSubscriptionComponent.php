<?php

namespace App\Livewire\NewsletterSubscription\Dashboard;

use Livewire\Component;
use Illuminate\View\View;
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

    public function render(): View
    {
        return view('livewire.newsletter-subscription.dashboard.newsletter-subscription-component');
    }

    public function displayNewsletterSubscription(NewsletterSubscription $newsletterSubscription): void
    {
        $this->displayingNewsletterSubscription = $newsletterSubscription;

        $this->enterMode('displayMode');
    }

    public function exitNewsletterSubscriptionDisplay(): void
    {
        $this->displayingNewsletterSubscription = null;
        $this->exitMode('displayMode');
    }
}
