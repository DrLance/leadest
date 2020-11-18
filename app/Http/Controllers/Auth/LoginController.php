<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Laravel\Socialite\Facades\Socialite;

class LoginController extends Controller
{
    public function authenticate(Request $request)
    {
        $responseData = [
          'error'   => false,
          'message' => 'OK',
          'data'    => [
            'errors' => [],
            'url'    => '',
          ],
        ];

        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            $responseData['data']['url'] = route('dashboard.index');

            return response()->json($responseData);
        }

        $responseData['error'] = true;
        $responseData['data']  = [
          'errors' => [
            [
              'message' => 'Login failed',
            ],
          ],
        ];

        return response()->json($responseData);
    }

    public function redirectToProvider()
    {
        return Socialite::driver('google')->redirect();
    }

    public function handleProviderCallback()
    {
        try {
            $user = Socialite::driver('google')->user();
        } catch (\Exception $e) {
            return redirect()->route('home');
        }

        $existingUser = User::where('email', $user->email)->first();

        if ($existingUser) {
            auth()->login($existingUser, true);
        } else {
            // create a new user
            $newUser                  = new User;
            $newUser->name            = $user->name;
            $newUser->email           = $user->email;
            $newUser->password        = Hash::make($user->email . $user->name . 'password');
            $newUser->google_id       = $user->id;
            $newUser->avatar          = $user->avatar;
            $newUser->avatar_original = $user->avatar_original;
            $newUser->save();
            auth()->login($newUser, true);
        }

        return redirect()->to('/dashboard');
    }
}
