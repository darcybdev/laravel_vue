<?php

namespace App\Base\Foundation\Console;

use Symfony\Component\Console\Input\InputArgument;
use Illuminate\Support\Str;

class PolicyMakeCommand extends \Illuminate\Foundation\Console\PolicyMakeCommand
{
    /**
     * Get the console command arguments.
     *
     * @return array
     */
    protected function getArguments()
    {
        return [
            ['module', InputArgument::REQUIRED, 'The name of the module'],
            ['name', InputArgument::REQUIRED, 'The name of the class']
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

        $path = $this->laravel['path'].'/'.str_replace('\\', '/', $name).'.php';
        return $path;
    }

    /**
     * Get the root namespace for the class.
     *
     * @return string
     */
    protected function rootNamespace()
    {
        return 'App\\' . ucfirst($this->argument('module')) . '\\';
    }
}
