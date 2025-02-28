<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Password;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Illuminate\Auth\Events\PasswordReset;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class ResetPasswordController extends Controller
{
    public function resetPasswordEmail(Request $request)
    {
        $request->validate(['email' => 'required|email']);

        $status = Password::sendResetLink(
            $request->only('email')
        );

        return $status === Password::ResetLinkSent
            ? back()->with(['status' => __($status)])
            : back()->withErrors(['email' => __($status)]);
    }


    public  function showPasswordReset(string $token)
    {


        return view('forgotPassword', ['token' => $token]);
    }


    public function passwordUpdate(Request $request)
    {
        $request->validate([
            'token' => 'required',
            'email' => 'required|email',
            'password' => 'required|min:3|confirmed',
        ]);

        // Try to reset the password
        $status = Password::reset(
            $request->only('email', 'password', 'password_confirmation', 'token'),
            function (User $user, string $password) {
                $user->forceFill([
                    'password' => Hash::make($password),
                ])->setRememberToken(Str::random(60));

                $user->save();

                event(new PasswordReset($user));
            }
        );

        // Check the status and return a custom error message if invalid token
        if ($status === Password::PasswordReset) {
            return redirect()->route('login')->with('status', __('Your password has been reset successfully.'));
        }

        // Custom error handling for invalid token or other errors
        if ($status === Password::INVALID_TOKEN) {
            return back()->withErrors(['email' => __('Invalid Email. Please check your email and try again.')]);
        }

        // Default error handling for any other errors
        return back()->withErrors(['email' => __($status)]);
    }
}
