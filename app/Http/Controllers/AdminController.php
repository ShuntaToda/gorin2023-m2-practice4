<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
class AdminController extends Controller
{
    public function createUser(){
        return view("createUser");
    }
    public function storeUser(Request $request){
        $request->validate([
            "name" => "required",
            "email" => "required|email",
            "password" => "required",
            // password_confirmationがわからない
        ]);

        $user = User::create([
            "name" => $request->name,
            "email" => $request->email,
            "password" => $request->password,
            "memo" => $request->memo,
        ]);

        return redirect(route("admin.createUser"))->with(["message" => "登録完了しました"]);
    }

    public function showUser($id){
        $user = User::find($id);
        return view("showUser", compact("user"));
    }

    public function editUser($id){
        $user = User::find($id);
        return view("editUser", compact("user"));
    }
    public function updateUser(Request $request, $id){
        $request->validate([
            "name" => "required",
            "email" => "required|email",
           ]);
        $user = User::find($id);

        $user->update([
            "name" => $request->name,
            "email" => $request->email,
            "memo" => $request->memo,
            "is_active" => $request->is_active == "on" ? true : false
        ]);
        return redirect(route("admin.editUser", $id))->with(["message" => "更新完了しました"]);
    }

    public function deleteUser($id){
        $user = User::find($id);
        $user->delete();
        return redirect(route("home"));
    }
}
