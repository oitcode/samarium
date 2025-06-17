<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;
use App\Models\NewsletterSubscription\NewsletterSubscription;

class NewsletterSubscriptionCreated
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public NewsletterSubscription $newsletterSubscription;

    /**
     * Create a new event instance.
     */
    public function __construct($newsletterSubscription)
    {
        $this->newsletterSubscription = $newsletterSubscription;
    }
}
