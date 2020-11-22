<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
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
}
