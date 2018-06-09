<?php

namespace App\Home\Http\Controllers;

class HomeController extends \Controller
{
    public function homepage()
    {
        return view('home');
    }
}
