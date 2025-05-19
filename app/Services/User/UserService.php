<?php

namespace App\Services\User;

use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\UploadedFile;
use Illuminate\Pagination\LengthAwarePaginator;
use App\User;

class UserService
{
    /**
     * Get paginated list of users
     *
     * @param int $perPage
     * @return LengthAwarePaginator
     */
    public function getPaginatedUsers(int $perPage = 5): LengthAwarePaginator
    {
        return User::orderBy('id', 'DESC')->paginate($perPage);
    }

    /**
     * Create a new user
     *
     * @param array $data
     * @return User
     */
    public function createUser(array $data): User
    {
        $user = User::create($data);

        return $user;
    }

    /**
     * Check if a user can be deleted.
     *
     * @param int $user_id
     * @return void
     */
    public function canDeleteUser(int $user_id): bool
    {
        $user = User::find($user_id);

        // Todo

        return true;
    }

    /**
     * Delete user
     *
     * @param int $user_id
     * @return void
     */
    public function deleteUser(int $user_id): void
    {
        $user = User::find($user_id);

        $user->delete();
    }

    /**
     * Get total user count
     *
     * @return int
     */
    public function getTotalUserCount(): int
    {
        return User::count();
    }

    /**
     * Get admin user count
     *
     * @return int
     */
    public function getTotalAdminUserCount(): int
    {
        return User::where('role', 'admin')->count();
    }
}
