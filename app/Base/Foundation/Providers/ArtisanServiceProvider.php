<?php

namespace App\Base\Foundation\Providers;

use App\Base\Console\ControllerMakeCommand;

class ArtisanServiceProvider extends \Illuminate\Foundation\Providers\ArtisanServiceProvider
{
    /**
     * Register the command.
     *
     * @return void
     */
    protected function registerControllerMakeCommand()
    {
        $this->app->singleton('command.controller.make', function ($app) {
            return new ControllerMakeCommand($app['files']);
        });
    }
}
