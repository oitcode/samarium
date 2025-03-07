<?php

namespace Tests\Feature\Livewire\User;

use App\Livewire\User\UserList;
use App\User;
use Livewire\Livewire;
use Tests\TestCase;

class UserListTest extends TestCase
{
    public function test_enter_user_delete_mode_on_delete_user(): void
    {
        Livewire::test(UserList::class)
            ->assertSet('modes.delete', false)
            ->call('deleteUser')
            ->assertSet('modes.delete', true);
    }

    public function test_exit_user_delete_mode_false_on_delete_user_cancel(): void
    {
        $user = User::where('role', 'admin')->first();

        Livewire::test(UserList::class)
            ->call('deleteUser', $user)
            ->assertSet('modes.delete', true)
            ->call('deleteUserCancel')
            ->assertSet('modes.delete', false);
    }

    public function test_exit_user_delete_mode_false_on_confirm_delete_user(): void
    {
        $adminUsers = User::where('role', 'admin')->take(2)->get();

        Livewire::actingAs($adminUsers[0])
            ->test(UserList::class)
            ->call('deleteUser', $adminUsers[1])
            ->assertSet('modes.delete', true)
            ->call('confirmDeleteUser')
            ->assertSet('modes.delete', false);
    }

    public function test_is_not_possible_to_delete_admin_users()
    {
        $adminUsers = User::where('role', 'admin')->take(2)->get();

        Livewire::actingAs($adminUsers[0])
            ->test(UserList::class)
            ->call('deleteUser', $adminUsers[1])
            ->assertSet('modes.delete', true)
            ->call('confirmDeleteUser')
            ->assertSeeText('ERROR! Admin users cannot be deleted.')
            ->assertSet('modes.delete', false);
    }

    public function test_admin_users_can_delete_standard_users()
    {
        $admin = User::where('role', 'admin')->first();
        $standard = User::create([
            'name' => 'Standard User',
            'email' => 'standarduser@example.com',
            'role' => 'standard',
            'password' => 'password'
        ]);

        Livewire::actingAs($admin)
            ->test(UserList::class)
            ->call('deleteUser', $standard)
            ->assertSet('modes.delete', true)
            ->call('confirmDeleteUser')
            ->assertSeeText("SUCCESS! User: {$standard->name} deleted successfully.")
            ->assertSet('modes.delete', false);
    }
}
