<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function login(Request $request)
    {

        $credentials = $request->all();

        $exists = Auth::attempt($credentials);

        if ($exists) {
            // Create API Token
            $user = auth()->user();

            $token = $user->createToken('login')->plainTextToken;

            $user['token'] = $token;

            return $user;
        } else {
            return 'Invalid credentials.';
        }
    }
}
