<?php

namespace App\Auth\Listeners;

use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Mail;

use App\Auth\Mail\RegisteredUser;

class EmailRegisteredUser
{
    public function handle(Registered $event)
    {
        $user = $event->user;
        Mail::to($user)->send(new RegisteredUser($user));
    }
}
