<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Services\UserService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;


class UserController extends Controller
{
    public function store(Request $request)
    {
        $responseData = [
          'error'   => false,
          'message' => 'OK',
          'data'    => [
            'errors' => [],
            'url'    => route('public.login'),
          ],
        ];

        $validator = Validator::make($request->all(), [
          'email' => 'required|email|unique:users',
          'password' => 'required'
        ]);

        if ($validator->fails()) {

            $responseData['error'] = true;

            foreach ($validator->errors()->all() as $error) {
                $responseData['data']['errors'][] = $error;
            }

            return response()->json($responseData);
        }

        $user = UserService::createNewUser($request->all());

        return response()->json($responseData);
    }
}
