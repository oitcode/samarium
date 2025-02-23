<?php

namespace Tests\Feature\Livewire\User\Dashboard;

use App\Livewire\User\Dashboard\UserProfileDisplay;
use App\User;
use Tests\TestCase;

class UserProfileDisplayTest extends TestCase
{
    public function test_auth_user_can_access_to_his_profile()
    {
        $user = User::where('role', 'admin')->first();

        $this->actingAs($user)
            ->get('/dashboard/own-profile')
            ->assertOk()
            ->assertSee($user->name)
            ->assertSeeLivewire(UserProfileDisplay::class);
    }
}
