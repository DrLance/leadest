<?php

namespace App\Http\Controllers\PublicHome;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index() {

        if(auth()->check()) {
            return redirect()->route('dashboard.index');
        }

        return view('welcome');
    }
}
