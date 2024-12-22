<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Hash;

use App\Models\User as User_Model;

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

    public function change_password(){
        if(View::exists("layouts.base")){
            $this->data["main_view"] = "change_password";
            $this->data["page_title"] = "Change Password";

            $this->data["user"] = auth()->user();
            return view("layouts.base",$this->data);
        }
    }

    public function change_password_post(Request $request){
        $rules = ["required","min:3","max:10","alpha_num"];
        
        $request->validate(
            [
                "current_password" =>$rules,
                "new_password" => $rules,
                "new_password_confirm" => $rules
            ]
        );

        $user = auth()->user();

        if(Hash::check(request("current_password"), $user->password)){
           $updated = User_Model::where("id",$user->id)->update(["password" => Hash::make(request("new_password")) ,"updated_at" => current_timestamp()]);
           return \redirect("profile");
        }else{
            return \redirect("password");
        }
    }

    public function edit_profile(Request $request){
        $request->validate(
            [
                "username" => ["required","min:3","alpha_num"],
                "email" => ["required","email"]
            ]
        );

        $logged_in_user = auth()->user();

        $user = User_Model::whereNot("id" , $logged_in_user->id)->where("username" , $request->username)->get()->first();
        if(empty($user)){
            $update = User_Model::where("id",$logged_in_user->id)->update(["username"=>$request->username,"email" => $request->email]);
        
            if($update){
                return redirect("profile");
            }else{
                return redirect("edit");
            }
        }else{
            return redirect("edit");
        }
       
    }
}
