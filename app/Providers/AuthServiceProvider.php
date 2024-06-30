<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        // 'App\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        /* Authorization gates. */
        Gate::define('is-admin', function ($user) {
            return $user->role === 'admin';
        });

        Gate::define('view-document-file', function ($user, $documentFile) {
            $userUserGroups = $user->userGroups;
            $dfUserGroups = $documentFile->userGroups;

            foreach ($userUserGroups as $userGroup) {
                foreach ($dfUserGroups as $dfUserGroup) {
                    if ($userGroup->user_group_id == $dfUserGroup->user_group_id) {
                        return true;
                    }
                }
            }

            return false;
        });

        Gate::define('view-url-link', function ($user, $urlLink) {
            $userUserGroups = $user->userGroups;
            $ulUserGroups = $urlLink->userGroups;

            foreach ($userUserGroups as $userGroup) {
                foreach ($ulUserGroups as $ulUserGroup) {
                    if ($userGroup->user_group_id == $ulUserGroup->user_group_id) {
                        return true;
                    }
                }
            }

            return false;
        });
    }
}
