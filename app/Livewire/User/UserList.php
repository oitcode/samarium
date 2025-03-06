<?php

namespace App\Livewire\User;

use Illuminate\Http\Request;
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

    public function confirmDeleteUser(Request $request): void
    {
        if ($request->user()->cannot('delete', $this->deletingUser)) {
            session()->flash('error', 'ERROR! Admin users cannot be deleted.');
            $this->exitMode('delete');
            return;
        }

        try {
            $this->deletingUser->delete();
            session()->flash('success', "SUCCESS! User: {$this->deletingUser?->name} deleted successfully.");
        } catch (\Exception $e) {
            session()->flash('error', 'ERROR! Something went wrong, please try again later.');
        }

        $this->exitMode('delete');
    }
}
