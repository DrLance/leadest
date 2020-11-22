<?php

namespace App\Http\Controllers\PublicHome;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index() {

        if(auth()->check()) {


            if(auth()->user()->is_agent) {
                return redirect()->route('dashboard.index');
            } else {
                return redirect()->route('leads.index');
            }
        }

        return view('welcome');
    }
}
