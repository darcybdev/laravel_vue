<?php

namespace App\Base\Routing\Console;

use Symfony\Component\Console\Input\InputArgument;
use Illuminate\Support\Str;

class ControllerMakeCommand extends \Illuminate\Routing\Console\ControllerMakeCommand
{
    protected $name = 'make:controller';

    /**
     * Get the console command arguments.
     *
     * @return array
     */
    protected function getArguments()
    {
        return [
            ['module', InputArgument::REQUIRED, 'The name of the module'],
            ['name', InputArgument::OPTIONAL, 'The name of the class']
        ];
    }

    /**
     * Get the destination class path.
     *
     * @param  string  $name
     * @return string
     */
    protected function getPath($name)
    {
        $name = Str::replaceFirst('App\\', '', $name);
        return $this->laravel['path'].'/'.str_replace('\\', '/', $name).'.php';
    }

    /**
     * Get the desired class name from the input.
     *
     * @return string
     */
    protected function getNameInput()
    {
        $name = trim($this->argument('name'));
        if ( ! $name) {
            $name = $this->argument('module') . 'Controller';
        }
        return $name;
    }

    /**
     * Get the stub file for the generator.
     *
     * @return string
     */
    protected function getStub()
    {
        $stub = null;

        if ($this->option('parent')) {
            $stub = '/stubs/controller.nested.stub';
        } elseif ($this->option('model')) {
            $stub = '/stubs/controller.model.stub';
        } elseif ($this->option('resource')) {
            $stub = '/stubs/controller.stub';
        }

        if ($this->option('api') && is_null($stub)) {
            $stub = '/stubs/controller.api.stub';
        } elseif ($this->option('api') && ! is_null($stub)) {
            $stub = str_replace('.stub', '.api.stub', $stub);
        }

        $stub = $stub ?? '/stubs/controller.plain.stub';

        return __DIR__.$stub;
    }

    /**
     * Get the root namespace for the class.
     *
     * @return string
     */
    protected function rootNamespace()
    {
        return 'App\\' . $this->argument('module') . '\\';
    }
}
