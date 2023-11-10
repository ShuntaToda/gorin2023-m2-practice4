<?php

namespace App\Http\Controllers\api;

use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ApiLoginController extends Controller
{
    public function login(Request $request){
        $check = $request->only(["name", "password"]);
        if(Auth::attempt($check)){
            $request->session()->regenerate();
            $token = $request->user()->createToken("token");
            return ["user" => $request->user(), "token" => $token->plainTextToken];
        }
        return "名前かパスワードが間違っています";
    }
    public function logout(Request $request){
        $request->user()->tokens()->delete();
        Auth::logout();
        $request->session()->regenerate();
        return true;
    }
}
