<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function authentication(Request $request)
    {
        $credentials = $request->only(['email', 'password']);
        if(Auth::attempt($credentials) === false) {
            return response()->json(['message' => 'Invalid credentials.'], 401);
        };
        
        $user = Auth::user();
        $user->tokens()->delete();
        $token = $user->createToken(
            'token',
            ['*'],
            now()->addDays(1)

        );
        return response()->json(['token' => $token->plainTextToken]);
    }
}
