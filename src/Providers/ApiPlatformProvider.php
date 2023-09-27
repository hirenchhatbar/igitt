<?php

namespace Hiren\ApiPlatform\Providers;

use Illuminate\Support\ServiceProvider;

class ApiPlatformProvider extends ServiceProvider
{
    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        $this->loadRoutesFrom(__DIR__.'/../routes/role.php');
        $this->loadViewsFrom(__DIR__.'/../resources/views', 'api-platform');
    }
}