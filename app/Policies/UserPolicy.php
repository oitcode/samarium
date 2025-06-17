<?php

namespace App\Policies;

use App\Models\User\User;
use Illuminate\Auth\Access\Response;

class UserPolicy
{
    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, User $model): bool
    {
        if ($model->role === 'admin' || $user->role !== 'admin') {
            return false;
        }

        return true;
    }
}
