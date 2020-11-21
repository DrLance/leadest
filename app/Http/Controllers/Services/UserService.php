<?php

namespace App\Http\Controllers\Services;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserService extends Controller
{

    /**
     * @param $data
     *
     * @return mixed
     */
    public static function createNewUser($data) {

        $user = User::create([
          'name' => $data['email'],
          'email' => $data['email'],
          'password' => Hash::make($data['password']),
        ]);

        event(new Registered($user));

        return $user;
    }
}
