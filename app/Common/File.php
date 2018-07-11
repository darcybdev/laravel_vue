<?php

namespace App\Common;

class File
{
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
