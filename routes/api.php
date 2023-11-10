<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\api\ApiLoginController;

use App\Models\User;
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post("auth/login", [ApiLoginController::class, "login"]);
Route::get("auth/logout", [ApiLoginController::class, "logout"]);

Route::middleware('auth:sanctum')->put('edit', function (Request $request) {
    $request->validate(["name" => "required"]);
    $user = User::find($request->user()->id);
    $user->update([
        "name" => $request->name,
        "memo" => $request->memo,
    ]);

    return $user;
});
Route::middleware('auth:sanctum')->delete('delete', function (Request $request) {
    $user = User::find($request->user()->id);
    $user->delete();

    return true;
});