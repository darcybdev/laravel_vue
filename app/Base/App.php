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
     * Check if module exists by name
     * @param string $name
     * @return boolean
     */
    public static function moduleExists($name)
    {
        $modules = static::modules();
        $name = strtolower($name);
        foreach ($modules as $module) {
            if (strtolower($module) == $name) {
                return true;
            }
        }
        return false;
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

    /**
     * Reset any caches
     */
    public static function reset()
    {
        static::$modules = null;
    }
}
