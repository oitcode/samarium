<?php

namespace Tests\Feature\Livewire\User;

use App\Livewire\User\UserComponent;
use App\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Livewire\Livewire;
use Tests\TestCase;

class UserComponentTest extends TestCase
{
    public function test_component_exists_on_the_page(): void
    {
        $user = User::where('role', 'admin')->first();

        $this->actingAs($user)
            ->get('/dashboard/users')
            ->assertSeeLivewire(UserComponent::class)
            ->assertStatus(200);
    }

    public function test_exit_create_user_mode_on_user_created()
    {
        Livewire::test(UserComponent::class)
            ->set('modes.createUserMode', true)
            ->call('userCreated')
            ->assertSet('modes.createUserMode', false);
    }

    public function test_exit_create_user_mode_on_exit_create_user_mode()
    {
        Livewire::test(UserComponent::class)
            ->set('modes.createUserMode', true)
            ->call('exitCreateUserMode')
            ->assertSet('modes.createUserMode', false);
    }

    public function test_display_user_on_display_user()
    {
        $user = User::where('role', 'admin')->first();

        Livewire::test(UserComponent::class)
            ->assertSet('modes.displayUserMode', false)
            ->call('displayUser', $user)
            ->assertSet('modes.displayUserMode', true);
    }

    public function test_exit_user_display_mode_on_exit_user_display_mode()
    {
        Livewire::test(UserComponent::class)
            ->set('modes.displayUserMode', true)
            ->call('exitUserDisplayMode')
            ->assertSet('modes.displayUserMode', false);
    }
}
