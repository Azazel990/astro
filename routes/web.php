<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Login;
use App\Http\Controllers\Dashboard;


Route::get('/', function () {
    return view('welcome'); 
});

// Route::get('/sample/{number}', function ($number = 0) {
//     return view('sample',["number" => $number]);
// });


Route::redirect("/home","/");


// Adding Login controller
Route::get("login",[Login::class,'index'])->name("login");
Route::get("dashboard",[Dashboard::class,'index'])->name("dashboard");


Route::post("userLogin",[Login::class,"userLogin"]);

Route::view('base_template', 'base_template');
Route::view('dashboardView', 'dashboard');

