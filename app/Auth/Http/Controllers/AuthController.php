<?php

namespace App\Auth\Http\Controllers;

use Illuminate\Http\Request;

use App\Base\Http\Controllers\Controller;

class AuthController extends Controller
{
    public function getStatus()
    {
        $user = \Auth::user();
        if ( ! $user) {
            return [
                'id' => 0,
                'name' => 'guest'
            ];
        }
        return $user;
    }
}
