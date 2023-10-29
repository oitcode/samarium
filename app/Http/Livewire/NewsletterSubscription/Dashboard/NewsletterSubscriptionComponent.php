<?php

namespace App\Http\Livewire\NewsletterSubscription\Dashboard;

use Livewire\Component;

use App\Traits\ModesTrait;

class NewsletterSubscriptionComponent extends Component
{
    use ModesTrait;

    public $modes = [
        'createMode' => false,
        'listMode' => true,
        'displayMode' => false,
        'updateMode' => false,
        'deleteMode' => false,
    ];

    public function render()
    {
        return view('livewire.newsletter-subscription.dashboard.newsletter-subscription-component');
    }
}
