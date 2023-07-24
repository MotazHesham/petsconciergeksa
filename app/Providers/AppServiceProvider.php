<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Pagination\Paginator;

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
        Paginator::useBootstrap(); // use the bootstrap 5 for pagination

        // Model::preventLazyLoading --------------
        // important Note (disable it on production) How ?
        // - app()->isProduction() it refers to .env file to (APP_ENV)
        Model::preventLazyLoading(!app()->isProduction()); // while development it show error if you try to lazy loading query
    }
}
