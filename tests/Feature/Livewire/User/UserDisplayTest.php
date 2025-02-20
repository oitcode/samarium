<?php

namespace Tests\Feature\Livewire\User;

use App\Livewire\User\UserDisplay;
use App\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Livewire\Livewire;
use Tests\TestCase;

class UserDisplayTest extends TestCase
{
    public function test_add_user_to_group_mode_on_add_user_to_group_cancelled(): void
    {
        $user = User::where('role', 'admin')->first();

        Livewire::test(UserDisplay::class, ['user' => $user])
            ->set('modes.addUserToGroupMode', true)
            ->call('addUserToGroupCancelled')
            ->assertSet('modes.addUserToGroupMode', false);
    }

    public function test_add_user_to_group_mode_on_add_user_to_group_completed(): void
    {
        $user = User::where('role', 'admin')->first();

        Livewire::test(UserDisplay::class, ['user' => $user])
            ->set('modes.addUserToGroupMode', true)
            ->call('addUserToGroupCompleted')
            ->assertSet('modes.addUserToGroupMode', false);
    }

    public function test_exit_user_display_mode_dispatched_on_close_this_component(): void
    {
        $user = User::where('role', 'admin')->first();

        Livewire::test(UserDisplay::class, ['user' => $user])
            ->call('closeThisComponent')
            ->assertDispatched('exitUserDisplayMode');
    }
}
