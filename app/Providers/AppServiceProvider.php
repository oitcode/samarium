<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
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
        $company = Company::first();
        $cmsTheme = CmsTheme::first();

        View::share('company', $company);
        View::share('cmsTheme', $cmsTheme);
    }
}
