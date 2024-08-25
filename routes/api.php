<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Login;
use App\Http\Controllers\Dashboard;

// Route::get('/user', function (Request $request) {
//     return $request->user();
// })->middleware('auth:sanctum');


Route::post("loginApp",[Login::class,"loginApp"]);

Route::get("dashboard",[Dashboard::class,"sample"])->middleware("auth:sanctum");    