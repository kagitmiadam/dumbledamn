<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Artisan;
use Auth;

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
        if(Auth::check()) {
            Artisan::call("period:check");
        }
    }
}
