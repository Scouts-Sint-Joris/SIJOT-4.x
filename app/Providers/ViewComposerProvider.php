<?php

namespace Sijot\Providers;

use Illuminate\Support\ServiceProvider;

/**
 * Class ViewComposerProvider
 * 
 * @author      Tim Joosten <topairy@gmail.com>
 * @copyright   2018 Tim Joosten
 * @package     Sijot\Providers
 */
class ViewComposerProvider extends ServiceProvider
{
    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot(): void
    {
        view()->composer('*', \Sijot\Http\ViewComposers\GlobalComposer::class);
    }
}
