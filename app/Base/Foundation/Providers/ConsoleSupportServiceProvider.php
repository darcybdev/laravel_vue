<?php

namespace App\Base\Foundation\Providers;

use App\Base\Foundation\Providers\ArtisanServiceProvider;
use Illuminate\Foundation\Providers\ComposerServiceProvider;
use App\Base\Database\MigrationServiceProvider;

class ConsoleSupportServiceProvider extends \Illuminate\Foundation\Providers\ConsoleSupportServiceProvider
{
    /**
     * The provider class names.
     *
     * @var array
     */
    protected $providers = [
        ArtisanServiceProvider::class,
        MigrationServiceProvider::class,
        ComposerServiceProvider::class,
    ];
}
