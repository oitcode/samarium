<?php
 
namespace Tests\Feature\Livewire;
 
use App\Livewire\NewsletterSubscription\Dashboard\NewsletterSubscriptionComponent;
use Tests\TestCase;

use App\User;
 
class NewsletterSubscriptionComponentTest extends TestCase
{
    public function test_component_exists_on_the_page()
    {
        $user = User::where('role', 'admin')->first();

        $this->actingAs($user)
            ->get('/dashboard/newsletter-subscription')
            ->assertSeeLivewire(NewsletterSubscriptionComponent::class);
    }
}
