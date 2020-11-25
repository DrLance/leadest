<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Facades\Validator;

class ResetPasswordController extends Controller
{
    public function __construct()
    {
        $this->middleware('throttle:5,1')->only('sendEmail');
    }

    public function sendEmail(Request $request) {
        $responseData = [
          'error'   => false,
          'message' => '',
          'data'    => [
            'errors' => [],
            'url'    => '',
          ],
        ];

        try {
            $user = User::where('email', $request->input('email'))->firstOrFail();
            $token = Password::getRepository()->create($user);

            dispatch(function () use ($user, $token) {
                $user->sendPasswordResetNotification($token);
            })->afterResponse();

        } catch (\Exception $e) {
            $responseData['error'] = true;
            $responseData['message'] = 'User Not Found';

            return response()->json($responseData);
        }

        return response()->json($responseData);

    }

    public function showForm($token, Request $request)
    {
        if ($token) {
            return view('auth.password-reset', ['token' => $token, 'email' => $request->email]);
        }

        return redirect()->route('home');
    }

    public function changePassword(Request $request) {

        $validator = Validator::make($request->all(), [
          'token' => 'required',
          'email' => 'required|email',
          'password' => 'required',
        ]);

        $credentials =  $request->only('email', 'token');

        $user = Password::getUser($credentials);

        if ($validator->fails()) {

            return redirect()->back()->withErrors($validator->errors());
        }

        $user->password = Hash::make($request->password);
        $user->save();

        return redirect()->route('login');
    }
}
