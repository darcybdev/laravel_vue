<?php

namespace App\Base\Database\Console\Migrations;

use App\Common\Module;
use App\Common\File;

class MigrateMakeCommand extends \Illuminate\Database\Console\Migrations\MigrateMakeCommand
{
    /**
     * The console command signature.
     *
     * @var string
     */
    protected $signature = 'make:migration {module : The module name} {name : The name of the migration.}
        {--create= : The table to be created.}
        {--table= : The table to migrate.}
        {--path= : The location where the migration file should be created.}
        {--realpath : Indicate any provided migration file paths are pre-resolved absolute paths.}';

    /**
     * Get migration path (either specified by '--path' option or default location).
     *
     * @return string
     */
    protected function getMigrationPath()
    {
        if (! is_null($targetPath = $this->input->getOption('path'))) {
            return ! $this->usingRealPath()
                            ? $this->laravel->basePath().'/'.$targetPath
                            : $targetPath;
        }
        $module = ucfirst(trim($this->argument('module')));
        if ( ! Module::exists($module)) {
            $this->error('Module: ' . $module . ' doesn\'t exist');
            die;
        }
        $path = File::path('app/' . $module . '/database/migrations');
        if ( ! file_exists($path)) {
            mkdir($path, 0755, true);
        }
        return $path;
    }
}
