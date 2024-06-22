<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class VerifyEmailController extends Controller
{
    public function show()
    {
        return view('auth.verify-email');
    }

    public function verify(EmailVerificationRequest $request)
    {
        $request->fulfill();

        return redirect('/admin')->with('verified', true);
    }

    public function sendVerificationEmail(Request $request)
    {
        $user = Auth::user();

        if ($user) {
            $user->sendEmailVerificationNotification();
            return back()->with('message', 'Verification link sent!');
        }

        return back()->withErrors(['email' => 'We could not find a user with that email address.']);
    }

}
