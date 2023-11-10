<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function index(){
        return view("login");
    }
    public function login(Request $request){
        $check = $request->only(["name", "password"]);
        if(Auth::attempt($check)){
            $request->session()->regenerate();
            return redirect(route("home"));
        }
        return back()->with(["message" => "名前かパスワードが間違っています"]);
    }
    public function logout(Request $request){
        Auth::logout();
        $request->session()->flush();
        return redirect(route("login"));   
    }
}
