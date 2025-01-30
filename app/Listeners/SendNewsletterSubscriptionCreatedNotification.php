<?php

namespace App\Listeners;

use App\Events\NewsletterSubscriptionCreated;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Mail;
use App\Mail\NewsletterSubscriptionCreatedNotificationEmail;

class SendNewsletterSubscriptionCreatedNotification
{
    /**
     * Create the event listener.
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     */
    public function handle(NewsletterSubscriptionCreated $event): void
    {
        Mail::to(
            $event->newsletterSubscription->email
        )->send(
            new NewsletterSubscriptionCreatedNotificationEmail($event->newsletterSubscription)
        );
    }
}
