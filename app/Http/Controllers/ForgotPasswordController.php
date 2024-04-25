<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Password;
use App\Http\Controllers\Controller;
use App\Notifications\CustomResetPasswordNotification;
use App\Models\User;

class ForgotPasswordController extends Controller
{
    public function showForgotPasswordForm()
    {
        return view('auth.forgot-password');
    }

    public function sendResetLinkEmail(Request $request)
    {
        $request->validate(['email' => 'required|email']);

        $user = User::where('email', $request->email)->first();

        if (!$user) {
            // Menggunakan response()->json untuk mengirim pesan error sebagai respons JSON
            return response()->json(['error' => 'We cannot find a user with that email address.'], 404);
        }

        // Generate token
        $token = Password::createToken($user);

        // Send notification
        $user->notify(new CustomResetPasswordNotification($token));

        // Menggunakan response()->json untuk mengirim pesan sukses sebagai respons JSON
        return response()->json(['success' => 'We have emailed your password reset link!'], 200);
    }
}
