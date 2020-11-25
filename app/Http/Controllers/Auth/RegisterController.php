<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
    public function register(Request  $request) {

        if(auth()->check()) {

            if (auth()->user()->is_agent) {
                return redirect()->route('dashboard.index');
            } else {
                return redirect()->route('leads.index');
            }
        }

        return view('auth.register');

    }

    public function registerFinish() {
        if(auth()->check()) {

            return view('auth.register-finish', ['email' => auth()->user()->email]);
        }

        return redirect()->route('home');
    }

    public function resendVerificationEmail(Request  $request) {
        if(auth()->check()) {
            $user = auth()->user();

            event(new Registered($user));

            $request->session()->flash('status', 'Email Successful Resend');
        }

        return redirect()->back();
    }
}
