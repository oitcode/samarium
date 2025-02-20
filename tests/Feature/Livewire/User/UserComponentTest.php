<?php

namespace Tests\Feature\Livewire\User;

use App\Livewire\User\UserComponent;
use App\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
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
}
