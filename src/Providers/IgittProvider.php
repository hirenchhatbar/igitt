<?php

namespace Hiren\Igitt\Providers;

use Illuminate\Support\ServiceProvider;

class IgittProvider extends ServiceProvider
{
    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot(): void
    {
        $this->loadRoutesFrom(__DIR__.'/../routes/role.php');
        $this->loadViewsFrom(__DIR__.'/../resources/views', 'api-platform');
    }
}