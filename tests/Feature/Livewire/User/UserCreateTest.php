<?php

namespace Tests\Feature\Livewire\User;

use App\Livewire\User\UserCreate;
use App\User;
use Illuminate\Support\Facades\Event;
use Illuminate\Support\Facades\Hash;
use Livewire\Livewire;
use Tests\TestCase;

class UserCreateTest extends TestCase
{
    public function test_can_create_a_new_user(): void
    {
        $user = User::where('role', 'admin')->first();
        $email = fake()->email;

        Livewire::actingAs($user)
            ->test(UserCreate::class)
            ->set('name', 'John Doe')
            ->set('email', $email)
            ->set('role', 'standard')
            ->set('password', 'password')
            ->set('password_confirm', 'password')
            ->call('store');

        $this->assertDatabaseHas('users', [
            'email' => $email,
        ]);

        $this->deleteCreatedUser($email);
    }

    public function test_all_fields_are_required(): void
    {
        $user = User::where('role', 'admin')->first();

        Livewire::actingAs($user)
            ->test(UserCreate::class)
            ->call('store')
            ->assertHasErrors([
                'name' => 'required',
                'email' => 'required',
                'role' => 'required',
                'password' => 'required',
                'password_confirm' => 'required',
            ]);
    }

    public function test_email_should_be_unique(): void
    {
        $user = User::where('role', 'admin')->first();

        Livewire::actingAs($user)
            ->test(UserCreate::class)
            ->set('email', $user->email)
            ->call('store')
            ->assertHasErrors([
                'email' => 'unique',
            ]);
    }

    public function test_created_user_has_hashed_password(): void
    {
        $user = User::where('role', 'admin')->first();
        $email = fake()->email;

        Livewire::actingAs($user)
            ->test(UserCreate::class)
            ->set('name', 'John Doe')
            ->set('email', $email)
            ->set('role', 'standard')
            ->set('password', 'password')
            ->set('password_confirm', 'password')
            ->call('store');

        $createdUser = User::where('email', $email)->first();

        $this->assertTrue(Hash::check('password', $createdUser->password));

        $this->deleteCreatedUser($email);
    }

    public function test_created_user_has_last_login_at(): void
    {
        $user = User::where('role', 'admin')->first();
        $email = fake()->email;

        Livewire::actingAs($user)
            ->test(UserCreate::class)
            ->set('name', 'John Doe')
            ->set('email', $email)
            ->set('role', 'standard')
            ->set('password', 'password')
            ->set('password_confirm', 'password')
            ->call('store');

        $createdUser = User::where('email', $email)->first();

        $this->assertNotNull($createdUser->last_login_at);

        $this->deleteCreatedUser($email);
    }

    public function test_user_created_event_is_dispatched_after_create_new_user(): void
    {
        Event::fake();

        $user = User::where('role', 'admin')->first();
        $email = fake()->email;

        Livewire::actingAs($user)
            ->test(UserCreate::class)
            ->set('name', 'John Doe')
            ->set('email', $email)
            ->set('role', 'standard')
            ->set('password', 'password')
            ->set('password_confirm', 'password')
            ->call('store')
            ->assertDispatched('userCreated');

        $this->deleteCreatedUser($email);
    }

    public function deleteCreatedUser(string $email): void
    {
        User::where('email', $email)->delete();
    }
}
