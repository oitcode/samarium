<?php

namespace App\Helpers;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\Route;
use App\Models\Cms\Webpage\Webpage;

class RouteHelper
{
    private static array $skipCommands = [
        'package:discover',
        'optimize:clear',
        'config:cache',
        'route:cache',
        'route:clear',
        'view:cache',
        'cache:clear',
        'migrate',
        'migrate:fresh',
        'migrate:refresh',
        'migrate:reset',
        'migrate:rollback',
        'migrate:status',
        'db:seed'
    ];


    public static function canLoadDynamicRoutes(): bool
    {
        return self::isNotInSkipCommands() && self::isDatabaseConnected();
    }


    private static function isNotInSkipCommands(): bool
    {
        if (!app()->runningInConsole()) {
            return true;
        }

        $command = $_SERVER['argv'][1] ?? '';
        return !in_array($command, self::$skipCommands);
    }


    private static function isDatabaseConnected(): bool
    {
        try {
            DB::connection()->getPdo();
            return true;
        } catch (\Exception $e) {
            return false;
        }
    }


    public static function loadWebpageRoutes(): void
    {
        try {
            if (!Schema::hasTable('webpage')) {
                return;
            }

            $webpages = Webpage::where('visibility', 'public')->get();

            foreach ($webpages as $webpage) {
                Route::get($webpage->permalink, 'WebsiteController@webpage')
                    ->name('website-webpage-' . $webpage->permalink);
            }
        } catch (\Exception $e) {
            logger('Dynamic webpage routes loading failed: ' . $e->getMessage());
        }
    }


    public static function loadDynamicRoutes(): void
    {
        if (self::canLoadDynamicRoutes()) {
            self::loadWebpageRoutes();
        }
    }
}