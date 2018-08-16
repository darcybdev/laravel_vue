<div>
    <p>Hi {{ $user->username }}!</p>
    <p>Thank you for registering. Use this link to confirm your account: <a href="{{ url('/auth/confirm?u=' . $user->id . '&t=' . $user->confirmation_code) }}">Confirm account</a></p>
</div>
