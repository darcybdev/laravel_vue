<?php

namespace App\Auth\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\ResetsPasswords;
use Illuminate\Support\Facades\Password;

use App\Auth\PasswordReset;
use App\Base\Http\Controllers\Controller;
use App\Common\Response;
use App\User\User;

class ResetPasswordController extends Controller
{

    use ResetsPasswords;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //$this->middleware('guest');
    }

    /**
     * Send a reset password email
     */
    public function reset(Request $request)
    {
        try {
            $this->validate($request, $this->rules(), $this->validationErrorMessages());
        } catch (\Exception $e) {
            return Response::invalid($e->errors());
        }

        // Here we will attempt to reset the user's password. If it is successful we
        // will update the password on an actual user model and persist it to the
        // database. Otherwise we will parse the error and return the response.
        $response = $this->broker()->reset(
            $this->credentials($request), function ($user, $password) {
                $this->resetPassword($user, $password);
            }
        );

        return $response == Password::PASSWORD_RESET
            ? ['status' => 'OK']
            : Response::invalid(['email' => trans($response)]);
    }
}
