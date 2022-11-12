<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

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
        // change from http to https (more secure)
        \URL::forceScheme('https');
        // pagination over https
        $this->app['request']->server->set('HTTPS','on');
    }
}
