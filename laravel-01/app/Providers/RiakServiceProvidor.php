<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class RiakServiceProvidor extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        //
        return [Connection::class];
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        //
        $this->app->singleton(Connection::class,function ($app) {
            return new Connection(config('rick'));
        });
    }
}
