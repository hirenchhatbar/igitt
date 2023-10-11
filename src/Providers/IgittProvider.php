<?php
/**
 * This file is part of the Igitt package.
 *
 * (c) Hiren Chhatbar <hc.rajkot@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Hiren\Igitt\Providers;

use Illuminate\Support\ServiceProvider;

/**
 * IgittProvider class
 *
 * @author Hiren Chhatbar <hc.rajkot@gmail.com>
 */
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