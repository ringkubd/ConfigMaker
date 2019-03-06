<?php

namespace Anwar\ConfigMaker;

use Anwar\ConfigMaker\Helpers\BaseCreator;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\ServiceProvider;

class ConfigMakerProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->loadRoutesFrom(__DIR__.'/Route.php');
        $this->loadViewsFrom(__DIR__.'/views', 'ConfigMaker');
        $this->publishes([
            __DIR__.'/resources' => public_path('vendor/config_maker'),
        ], 'public');

        require_once "helpers/support.php";
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        $this->app->bind('ConfigMakerBaseCreator', function () {
            return new BaseCreator();
        });
    }
}
