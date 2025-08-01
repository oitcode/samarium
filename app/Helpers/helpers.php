<?php

use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;
use App\Models\Company\Company;
use App\Models\Cms\CmsTheme\CmsTheme;
use App\Models\Cms\CmsNavMenu\CmsNavMenu;

if (!class_exists('App\Helpers\RouteHelper')) {
    require_once __DIR__ . '/RouteHelper.php';
}

if (!function_exists('has_module')) {
    function has_module(string $module): bool
    {
        return config('app.modules.' . $module) == true;
    }
}

if (!function_exists('share_global_view_data')) {

    function share_global_view_data(): void
    {
        if (!is_database_connected()) {
            return;
        }

        try {
            if (Schema::hasTable('company')) {
                $company = Company::first();
                View::share('company', $company);
            }

            if (Schema::hasTable('cms_theme')) {
                $cmsTheme = CmsTheme::first();
                View::share('cmsTheme', $cmsTheme);
            }

            if (Schema::hasTable('cms_nav_menu')) {
                $cmsNavMenu = CmsNavMenu::first();
                View::share('cmsNavMenu', $cmsNavMenu);
            }
        } catch (\Exception $e) {
            logger('Global view data sharing failed: ' . $e->getMessage());
        }
    }
}

if (!function_exists('is_database_connected')) {

    function is_database_connected(): bool
    {
        try {
            DB::connection()->getPdo();
            return true;
        } catch (\Exception $e) {
            return false;
        }
    }
}

if (!function_exists('is_running_migration_command')) {

    function is_running_migration_command(): bool
    {
        if (!app()->runningInConsole()) {
            return false;
        }

        $command = $_SERVER['argv'][1] ?? '';

        $migrationCommands = [
            'migrate',
            'migrate:fresh',
            'migrate:refresh',
            'migrate:reset',
            'migrate:rollback',
            'migrate:status',
            'db:seed',
            'package:discover',
            'optimize:clear',
            'config:cache',
            'route:cache',
            'route:clear',
            'view:cache',
            'cache:clear'
        ];

        return in_array($command, $migrationCommands);
    }
}