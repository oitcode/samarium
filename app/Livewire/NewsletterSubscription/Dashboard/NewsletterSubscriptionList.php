<?php

namespace App\Livewire\NewsletterSubscription\Dashboard;

use Livewire\Component;
use Illuminate\View\View;
use Livewire\WithPagination;
use App\Traits\ModesTrait;
use App\Services\NewsletterSubscription\NewsletterSubscriptionService;
use App\NewsletterSubscription;

/**
 * NewsletterSubscriptionList Component
 * 
 * This Livewire component handles the listing of newsletter subscriptions.
 * It also handles deletion of newsletter subscriptions.
 */
class NewsletterSubscriptionList extends Component
{
    use WithPagination;
    use ModesTrait;

    /**
     * Newsletter subscriptions per pagination
     *
     * @var int
     */
    public $perPage = 5;

    /**
     * Total count of newsletter subscriptions
     *
     * @var int
     */
    public $totalNewsletterSubscriptionCount;

    /**
     * Newsletter Subscription which needs to be deleted
     *
     * @var NewsletterSubscription
     */
    public $deletingNewsletterSubscription;

    /**
     * Component display modes
     *
     * @var array
     */
    public $modes = [
        'confirmDelete' => false, 
        'cannotDelete' => false, 
    ];

    /**
     * Render the component
     *
     * @return \Illuminate\View\View
     */
    public function render(NewsletterSubscriptionService $newsletterSubscriptionService): View
    {
        $newsletterSubscriptions = $newsletterSubscriptionService->getPaginatedNewsletterSubscriptions($this->perPage);
        $this->totalNewsletterSubscriptionCount = $newsletterSubscriptionService->getTotalNewsletterSubscriptionCount();

        return view('livewire.newsletter-subscription.dashboard.newsletter-subscription-list', [
            'newsletterSubscriptions' => $newsletterSubscriptions,
        ]);
    }

    /**
     * Confirm if user really wants to delete a newsletter subscription
     *
     * @return void
     */
    public function confirmDeleteNewsletterSubscription(int $newsletter_subscription_id, NewsletterSubscriptionService $newsletterSubscriptionService): void
    {
        $this->deletingNewsletterSubscription = NewsletterSubscription::find($newsletter_subscription_id);

        if ($newsletterSubscriptionService->canDeleteNewsletterSubscription($newsletter_subscription_id)) {
            $this->enterModeSilent('confirmDelete');
        } else {
            $this->enterModeSilent('cannotDelete');
        }
    }

    /**
     * Cancel newsletter subscription delete
     *
     * @return void
     */
    public function cancelDeleteNewsletterSubscription(): void
    {
        $this->deletingNewsletterSubscription = null;
        $this->exitMode('confirmDelete');
    }

    /**
     * Turn off the mode that shows that an newsletter subscription cannot be deleted
     *
     * @return void
     */
    public function cancelCannotDeleteNewsletterSubscription(): void
    {
        $this->deletingNewsletterSubscription = null;
        $this->exitMode('cannotDelete');
    }

    /**
     * Delete newsletter subscription
     *
     * @return void
     */
    public function deleteNewsletterSubscription(NewsletterSubscriptionService $newsletterSubscriptionService): void
    {
        $newsletterSubscriptionService->deleteNewsletterSubscription($this->deletingNewsletterSubscription->newsletter_subscription_id);
        $this->deletingNewsletterSubscription = null;
        $this->exitMode('confirmDelete');
    }
}
