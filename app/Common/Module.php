<?php

namespace App\Common;

class Module
{
    protected static $modules = null;

    /**
     * Check if module exists by name
     * @param string $name
     * @return boolean
     */
    public static function exists($name)
    {
        $modules = static::list();
        $name = strtolower($name);
        foreach ($modules as $module) {
            if (strtolower($module) == $name) {
                return true;
            }
        }
        return false;
    }

    /**
     * Get list of modules
     */
    public static function list()
    {
        if ( ! static::$modules) {
            $paths = glob(File::path('app/*'), GLOB_ONLYDIR);
            static::$modules = array_map('basename', $paths);
        }
        return static::$modules;
    }

    /**
     * Get file path to module directory
     */
    public static function path($name)
    {
        if (static::exists($name)) {
            return File::path('app/' . ucfirst($name));
        }
        return false;
    }

    /**
     * Reset any caches
     */
    public static function reset()
    {
        static::$modules = null;
    }
}
