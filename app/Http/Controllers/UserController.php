<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Services\UserService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;


class UserController extends Controller
{
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
          'email' => 'required|email|unique:users',
          'password' => 'required'
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator);
        }

        UserService::createNewUser($request->all());

        return redirect()->route('home');
    }
}
