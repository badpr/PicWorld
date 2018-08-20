<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class RiakServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        view()->composer('appname', function () {
            echo 'lol';
        });
    }
}
