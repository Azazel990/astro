<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;

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

    public function edit_profile(Request $request){
        $request->validate(
            [
                "username" => ["required","min:3","alpha_num"],
                "email" => ["required","email"]
            ]
        );

        // $user = User_Model::where("username",$request->username)->get()->first();
        $user = User_Model::whereNot("id" , $request->user_id)->where("username" , $request->username)->get()->first();
        if(empty($user)){
            $update = User_Model::where("id",$request->user_id)->update(["username"=>$request->username,"email" => $request->email]);
        
            if($update){
                return redirect("profile");
            }else{
                return redirect("edit");
            }
        }else{

        }
       
    }
}
