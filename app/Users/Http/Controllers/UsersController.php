<?php

namespace App\Users\Http\Controllers;

use Illuminate\Http\Request;

use App\Base\Http\Controllers\ResourceController;
use App\Users\User;

class UsersController extends ResourceController
{
    protected function getModel()
    {
        return User::class;
    }
}
