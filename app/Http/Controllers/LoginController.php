<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class LoginController extends Controller
{
    public function login(Request $request)
    {
        $credentials = $request->only('name', 'password');

        if (Auth::attempt($credentials)) {
            $user = User::where('name', $request['name'])->firstOrFail();
            $token = $user->createToken('auth_token')->plainTextToken;
            return response()->json(['accessToken' => $token, 'token_type' => 'Bearer'], 200);
        }
        return response()->json('The provided credentials are incorrect', 401);
    }
    public function logout()
    {
        Auth::logout();
    }
}
