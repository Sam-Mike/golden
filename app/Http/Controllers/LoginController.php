<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function login(Request $request)
    {
        $credentials = $request->only('name', 'password');

        if (Auth::attempt($credentials)) {
            return response()->json(Auth::user(), 200);
        }
        return response()->json('The provided credentials are incorrect', 400);
    }
    public function logout()
    {
        Auth::logout();
    }
}
