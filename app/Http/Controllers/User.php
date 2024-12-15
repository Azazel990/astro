<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;

class User extends Controller
{
    public function index(){
        if(View::exists("layouts.base")){
            $this->data["main_view"] = "user_profile";
            $this->data["page_title"] = "Profile";

            $this->data["user"] = auth()->user();

            return view("layouts.base",$this->data);
        }
    }
    public function edit(){
        if(View::exists("layouts.base")){
            $this->data["main_view"] = "edit_profile";
            $this->data["page_title"] = "Edit Profile";

            $this->data["user"] = auth()->user();
            return view("layouts.base",$this->data);
        }
    }
}
