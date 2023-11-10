<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\AdminController;
use App\Models\User;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/


Route::group(["middleware" => ["noStore"]], function(){
    Route::group(["middleware" => ["auth"]], function(){
        Route::get('/', function () {
            $users = User::get();
            return view('home', compact("users"));
        })->name("home");
        Route::get("logout", [LoginController::class, "logout"])->name("logout");
        route::group(["middleware" => ["can:admin"], "prefix" => "admin", "as" => "admin."], function(){
            Route::get("create", [AdminController::class, "createUser"])->name("createUser");
            Route::post("create", [AdminController::class, "storeUser"]);
            Route::get("show/{id}", [AdminController::class, "showUser"])->name("showUser");
            Route::get("edit/{id}", [AdminController::class, "editUser"])->name("editUser");
            Route::put("edit/{id}", [AdminController::class, "updateUser"])->name("editUser");
            
            Route::delete("delete/{id}", [AdminController::class, "deleteUser"])->name("deleteUser");
        });
    });
    
    Route::get("login", [LoginController::class, "index"])->name("login");
    Route::post("login", [LoginController::class, "login"]);
    
    
});

