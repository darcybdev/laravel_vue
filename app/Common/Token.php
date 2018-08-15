<?php

namespace App\Common;

class Token
{
    /**
     * Generates a unique token
     * @return string
     */
    public static function generate()
    {
        return strtr(base64_encode(random_bytes(64)), '+/', '-_');
    }
}
