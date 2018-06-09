<?php

namespace App\Base;

class App extends \Illuminate\Support\Facades\App
{
    protected static $modules = null;

    /**
     * Get list of modules in the app
     */
    public static function modules()
    {
        if ( ! static::$modules) {
            $paths = glob(static::path('app/*'), GLOB_ONLYDIR);
            static::$modules = array_map('basename', $paths);
        }
        return static::$modules;
    }

    /**
     * Get the fully qualified path from the base
     * of the repo
     */
    public static function path($relativePath = null)
    {
        if ($relativePath) {
            $relativePath = ltrim($relativePath, '/');
            return base_path($relativePath);
        }
        return base_path();
    }
}
