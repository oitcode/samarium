<?php

namespace App\Livewire\User;

use Livewire\Component;
use Illuminate\View\View;
use Livewire\WithPagination;
use App\Traits\ModesTrait;
use App\User;

class UserList extends Component
{
    use WithPagination;
    use ModesTrait;

    protected string $paginationTheme = 'bootstrap';

    // public $users;

    public int $usersCount;
    public int $adminUsersCount;

    public User | null $deletingUser;

    public $modes = [
        'delete' => false,
    ];

    public function render(): View
    {
        $users = User::orderBy('id', 'DESC')->paginate(5);
        $this->usersCount = User::count();
        $this->adminUsersCount = User::where('role', 'admin')->count();

        return view('livewire.user.user-list')
            ->with('users', $users);
    }

    public function deleteUser(User $user): void
    {
        $this->deletingUser = $user;

        $this->enterMode('delete');
    }

    public function deleteUserCancel(): void
    {
        $this->deletingUser = null;
        $this->exitMode('delete');
    }

    public function confirmDeleteUser(): void
    {
        // Todo: Add delete functionality later.
        //       For now we cannot delete user!
        $this->exitMode('delete');
    }
}
