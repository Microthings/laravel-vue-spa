<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Jenssegers\Optimus\Optimus;

class OptimusServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->app->singleton(Optimus::class, function ($app) {
            return new Optimus(474972457, 168209177, 13693072, 31);
        });
    }
}
