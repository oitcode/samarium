<?php

namespace App\Livewire\User\Dashboard;

use Illuminate\Http\Request;
use Livewire\Component;
use Illuminate\View\View;
use Livewire\WithPagination;
use App\Traits\ModesTrait;
use App\Services\User\UserService;
use App\Models\User\User;

/**
 * UserList Component
 * 
 * This Livewire component handles the listing of users.
 * It also handles deletion of users.
 */
class UserList extends Component
{
    use WithPagination;
    use ModesTrait;

    /**
     * Users per pagination
     *
     * @var int
     */
    public $perPage = 5;

    /**
     * Total count of users
     *
     * @var int
     */
    public $totalUsersCount;

    /**
     * Total count of admin users
     *
     * @var int
     */
    public $totalAdminUsersCount;

    /**
     * User which needs to be deleted
     *
     * @var User
     */
    public $deletingUser;

    /**
     * Component display modes
     *
     * @var array
     */
    public $modes = [
        'confirmDelete' => false, 
        'cannotDelete' => false, 
    ];

    /**
     * Render the component
     *
     * @return \Illuminate\View\View
     */
    public function render(UserService $userService): View
    {
        $users = $userService->getPaginatedUsers($this->perPage);
        $this->totalUsersCount = $userService->getTotalUserCount();
        $this->totalAdminUsersCount = $userService->getTotalAdminUserCount();

        return view('livewire.user.dashboard.user-list', [
            'users' => $users,
        ]);
    }

    /**
     * Confirm if user really wants to delete a user
     *
     * @return void
     */
    public function confirmDeleteUser(int $user_id, UserService $userService): void
    {
        $this->deletingUser = User::find($user_id);

        if ($userService->canDeleteUser($user_id)) {
            $this->enterModeSilent('confirmDelete');
        } else {
            $this->enterModeSilent('cannotDelete');
        }
    }

    /**
     * Cancel user delete
     *
     * @return void
     */
    public function cancelDeleteUser(): void
    {
        $this->deletingUser = null;
        $this->exitMode('confirmDelete');
    }

    /**
     * Turn off the mode that shows that an user cannot be deleted
     *
     * @return void
     */
    public function cancelCannotDeleteUser(): void
    {
        $this->deletingUser = null;
        $this->exitMode('cannotDelete');
    }

    /**
     * Delete user
     *
     * @return void
     */
    public function deleteUser(UserService $userService): void
    {
        try {
            $userService->deleteUser($this->deletingUser->id);
            session()->flash('success', "SUCCESS! User: {$this->deletingUser?->name} deleted successfully.");
            $this->deletingUser = null;
            $this->exitMode('confirmDelete');
        } catch (\Exception $e) {
            session()->flash('error', 'ERROR! Something went wrong, please try again later.');
        }
    }
}
