<?php

// app/Http/Controllers/ResetPasswordController.php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class ResetPasswordController extends Controller
{
    public function showResetPasswordForm($token)
    {
        return view('auth.reset-password', ['token' => $token]);
    }

    public function reset(Request $request)
{
    $request->validate([
        'password' => 'required|confirmed|min:8',
        'token' => 'required'
    ]);

    // Ambil alamat email dari notifikasi
    $email = $request->email;

    // Cari pengguna berdasarkan alamat email
    $user = User::where('email', $email)->first();

    if (!$user) {
        return back()->withErrors(['email' => ['We can\'t find a user with that email address']]);
    }

    // Reset password untuk pengguna yang ditemukan
    $status = Password::reset(
        ['email' => $email, 'password' => $request->password, 'password_confirmation' => $request->password_confirmation, 'token' => $request->token],
        function ($user, $password) {
            $user->forceFill([
                'password' => bcrypt($password)
            ])->save();
        }
    );

    return $status == Password::PASSWORD_RESET
                ? redirect()->route('login')->with('status', __($status))
                : back()->withErrors(['email' => [__($status)]]);
}

}

