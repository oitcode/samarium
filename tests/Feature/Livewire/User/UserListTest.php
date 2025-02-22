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

    public function test_exit_user_delete_mode_on_delete_user_cancel(): void
    {
        $user = User::where('role', 'admin')->first();

        Livewire::test(UserList::class)
            ->call('deleteUser', $user)
            ->assertSet('modes.delete', true)
            ->call('deleteUserCancel')
            ->assertSet('modes.delete', false);
    }

    public function test_exit_user_delete_mode_on_confirm_delete_user(): void
    {
        $user = User::where('role', 'admin')->first();

        Livewire::test(UserList::class)
            ->call('deleteUser', $user)
            ->assertSet('modes.delete', true)
            ->call('confirmDeleteUser')
            ->assertSet('modes.delete', false);
    }
}
