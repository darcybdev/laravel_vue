<?php

namespace App\Base\Database\Console\Seeds;

use Symfony\Component\Console\Input\InputArgument;
use Illuminate\Support\Str;

use App\Common\File;

class SeederMakeCommand extends \Illuminate\Database\Console\Seeds\SeederMakeCommand
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
        return File::path('app/' . ucfirst($this->argument('module')) . '/database/seeds/' . $name . '.php');
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
