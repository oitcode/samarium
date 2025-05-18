<?php

namespace App\Services\NewsletterSubscription;

use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\UploadedFile;
use Illuminate\Pagination\LengthAwarePaginator;
use App\NewsletterSubscription;

class NewsletterSubscriptionService
{
    /**
     * Get paginated list of newsletter subscriptions
     *
     * @param int $perPage
     * @return LengthAwarePaginator
     */
    public function getPaginatedNewsletterSubscriptions(int $perPage = 5): LengthAwarePaginator
    {
        return NewsletterSubscription::orderBy('newsletter_subscription_id', 'DESC')->paginate($perPage);
    }

    /**
     * Create a new newsletter subscription
     *
     * @param array $data
     * @return NewsletterSubscription
     */
    public function createNewsletterSubscription(array $data): NewsletterSubscription
    {
        $newsletterSubscription = NewsletterSubscription::create($data);

        return $newsletterSubscription;
    }

    /**
     * Check if a newsletter subscription can be deleted.
     *
     * @param int $newsletter_subscription_id
     * @return void
     */
    public function canDeleteNewsletterSubscription(int $newsletter_subscription_id): bool
    {
        $newsletterSubscription = NewsletterSubscription::find($newsletter_subscription_id);

        // Todo

        return true;
    }

    /**
     * Delete newsletter subscription
     *
     * @param int $newsletter_subscription_id
     * @return void
     */
    public function deleteNewsletterSubscription(int $newsletter_subscription_id): void
    {
        $newsletterSubscription = NewsletterSubscription::find($newsletter_subscription_id);

        $newsletterSubscription->delete();
    }

    /**
     * Get total newsletter subscription count
     *
     * @return int
     */
    public function getTotalNewsletterSubscriptionCount(): int
    {
        return NewsletterSubscription::count();
    }
}
