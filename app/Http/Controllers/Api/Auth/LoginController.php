<?php

namespace App\Http\Controllers\Api\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\User;

class LoginController extends Controller
{
    // fungsi invoke untuk route single endpoint
    public function __invoke(Request $request)
    {
       $credentials = $request->only('email', 'password');

       if(Auth::attempt($credentials)) {
            $user = Auth::user();

            $message = "Login Successfully";
            $token = $user->createToken('LatihanToken')->accessToken;
            $code = 200;
       } else {
           $message = "incorrect username or password. please try again.";
           $code = 401;
       }

       return response()->json([
           'message' => $message,
           'data' => [
                'user' => $user,
                'token' => $token,
           ]
           ], $code);
    }
}
