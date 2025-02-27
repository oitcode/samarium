<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Schema;
use App\Company;
use App\CmsTheme;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        if (Schema::hasTable('company')) {
            $company = Company::first();
            View::share('company', $company);
        }

        if (Schema::hasTable('cms_theme')) {
            $cmsTheme = CmsTheme::first();
            View::share('cmsTheme', $cmsTheme);
        }
    }
}
