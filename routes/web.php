<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Login;
use App\Http\Controllers\Dashboard;
use App\Http\Controllers\Ajax;

Route::get('/', [Login::class,'index']);

// Route::get('/sample/{number}', function ($number = 0) {
//     return view('sample',["number" => $number]);
// });

Route::middleware(['auth'])->group(function () {
    Route::get("dashboard",[Dashboard::class,'index'])->name("dashboard");
});

Route::redirect("/home","/");

// Adding Login controller
Route::get("login",[Login::class,'index'])->name("login");

Route::post("userLogin",[Login::class,"userLogin"]);
Route::post("login1",[Login::class,"login1"]);

Route::view('base_template', 'base_template');

Route::post('logout', [Ajax::class,"logMeOut"])->name("logout");


// Route::get("loginApp",[Login::class,"loginApp"]);
// Route::get("test",[Login::class,"test"]);
