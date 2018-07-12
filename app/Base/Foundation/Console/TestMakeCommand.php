<?php

namespace App\Base\Foundation\Console;

use Symfony\Component\Console\Input\InputArgument;
use Illuminate\Support\Str;

class TestMakeCommand extends \Illuminate\Foundation\Console\TestMakeCommand
{
    /**
     * The console command name.
     *
     * @var string
     */
    protected $signature = 'make:test {module : The name of the module} {name : The name of the class} {--unit : Create a unit test}';

     /**
     * Get the destination class path.
     *
     * @param  string  $name
     * @return string
     */
    protected function getPath($name)
    {
        $name = Str::replaceFirst('App\\', '', $name);

        $path = $this->laravel['path'].'/'.str_replace('\\', '/', $name).'.php';
        return $path;
    }

    /**
     * Get the stub file for the generator.
     *
     * @return string
     */
    protected function getStub()
    {
        if ($this->option('unit')) {
            return __DIR__.'/stubs/unit-test.stub';
        }

        return __DIR__.'/stubs/test.stub';
    }

    /**
     * Get the root namespace for the class.
     *
     * @return string
     */
    protected function rootNamespace()
    {
        return 'App\\' . ucfirst($this->argument('module')) . '\\Tests\\';
    }
}
