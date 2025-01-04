<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Login;
use App\Http\Controllers\Dashboard;
use App\Http\Controllers\User;
use App\Http\Controllers\Posts;
use App\Http\Controllers\Ajax;

Route::get('/', [Login::class,'index']);

// Route::get('/sample/{number}', function ($number = 0) {
//     return view('sample',["number" => $number]);
// });

Route::middleware(['auth'])->group(function () {

    Route::get("dashboard",[Dashboard::class,'index'])->name("dashboard");
    Route::get("profile",[User::class,'index'])->name("profile");
    Route::get("edit",[User::class,'edit'])->name("edit");
    Route::get("password",[User::class,'change_password'])->name("change_password");
    Route::get("newPost",[Posts::class,'newPost'])->name("newPost");
    Route::get("post/update/{post_id?}",[Posts::class,'updatePost'])->whereNumber('post_id')->name("updatePost");
    
    Route::get("compressImage",[Posts::class,'compressImage'])->name("compressImage");

    Route::post("edit_profile",[User::class,'edit_profile'])->name("edit_profile");
    Route::post("change_password_post",[User::class,'change_password_post'])->name("change_password_post");
    Route::post("createNewPost",[Posts::class,'createNewPost'])->name("createNewPost");
});

Route::redirect("/home","/");

// Adding Login controller
Route::get("login",[Login::class,'index'])->name("login");
Route::get("signup",[Login::class,'signup'])->name("signup");

Route::post("userLogin",[Login::class,"userLogin"]);
Route::post("login1",[Login::class,"login1"]);
Route::post("signupUser",[Login::class,"signupUser"]);

Route::view('base_template', 'base_template');

Route::post('logout', [Ajax::class,"logMeOut"])->name("logout");

