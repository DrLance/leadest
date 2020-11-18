<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Password;

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
            $user->sendPasswordResetNotification($token);
        } catch (\Exception $e) {
            $responseData['error'] = true;
            $responseData['message'] = 'User Not Found';

            return response()->json($responseData);
        }

        return response()->json($responseData);

    }

    public function showForm() {
        return view('auth.register');
    }
}
