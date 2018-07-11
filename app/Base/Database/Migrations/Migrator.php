<?php

namespace App\Base\Database\Migrations;

use Illuminate\Support\Collection;

use App\Common\Module;
use App\Common\File;

class Migrator extends \Illuminate\Database\Migrations\Migrator
{
    /**
     * Get all of the migration files in a given path.
     *
     * @param  string|array  $paths
     * @return array
     */
    public function getMigrationFiles($paths)
    {
        // Ignore paths for now, use module paths
        $paths = [];
        $modules = Module::list();
        foreach ($modules as $module) {
            $paths[] = File::path('app/' . $module . '/database/migrations');
        }

        return Collection::make($paths)->flatMap(function ($path) {
            return $this->files->glob($path.'/*_*.php');
        })->filter()->sortBy(function ($file) {
            return $this->getMigrationName($file);
        })->values()->keyBy(function ($file) {
            return $this->getMigrationName($file);
        })->all();
    }
}
