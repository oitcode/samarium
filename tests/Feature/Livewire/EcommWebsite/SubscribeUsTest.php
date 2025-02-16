<?php

namespace Tests\Feature\Livewire\EcommWebsite;

use App\Events\NewsletterSubscriptionCreated;
use App\Livewire\EcommWebsite\SubscribeUs;
use App\NewsletterSubscription;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Event;
use Livewire\Livewire;
use Tests\TestCase;

class SubscribeUsTest extends TestCase
{
    Use RefreshDatabase;

    public function test_renders_sucessfully(): void
    {
        Livewire::test(SubscribeUs::class)
            ->assertStatus(200);
    }

    public function test_displays_intro_message(): void
    {
        Livewire::test(SubscribeUs::class)
            ->assertSee('Please enter your email address to get regular updates on our products. ');
    }

    public function test_can_reset_input_fields(): void
    {
        Livewire::test(SubscribeUs::class)
            ->set('email', 'johndoe@example.com')
            ->assertSet('email', 'johndoe@example.com')
            ->call('resetInputFields')
            ->assertSet('email', '');
    }

    public function test_subscription_fails_when_email_is_missing(): void
    {
        Livewire::test(SubscribeUs::class)
            ->call('store')
            ->assertHasErrors(['email']);
    }

    public function test_subscription_fails_if_email_is_already_subscribed(): void
    {
        $olderSubscription = NewsletterSubscription::factory()->create();

        Livewire::test(SubscribeUs::class)
            ->set('email', $olderSubscription->email)
            ->call('store')
            ->assertHasErrors(['email']);
    }

    public function test_subscription_succeeds_when_email_is_provided(): void
    {
        Livewire::test(SubscribeUs::class)
            ->set('email', 'johndoe@example.com')
            ->call('store')
            ->assertHasNoErrors()
            ->assertSee('Congratulations! Your subscription is added.');

        $this->assertDatabaseHas('newsletter_subscription', [
            'email' => 'johndoe@example.com',
        ]);
    }

    public function test_fields_are_reset_after_subscribing_to_the_newsletter(): void
    {
        Livewire::test(SubscribeUs::class)
            ->set('email', 'johndoe@example.com')
            ->call('store')
            ->assertHasNoErrors()
            ->assertSet('email', '');
    }

    public function test_event_is_dispatched_when_subscription_succeeds(): void
    {
        Event::fake();

        Livewire::test(SubscribeUs::class)
            ->set('email', 'johndoe@example.com')
            ->call('store')
            ->assertHasNoErrors();

        Event::assertDispatched(NewsletterSubscriptionCreated::class);
    }

    public function test_event_is__not_dispatched_when_subscription_fails(): void
    {
        Event::fake();

        Livewire::test(SubscribeUs::class)
            ->call('store')
            ->assertHasErrors(['email']);

        Event::assertNotDispatched(NewsletterSubscriptionCreated::class);
    }
}
