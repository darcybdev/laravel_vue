<?php

namespace App\Base\Console;

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
     * Get the root namespace for the class.
     *
     * @return string
     */
    protected function rootNamespace()
    {
        return 'App\\' . $this->argument('module') . '\\';
    }
}
