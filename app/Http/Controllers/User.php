<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Hash;

use App\Models\User as User_Model;

class User extends Controller
{
    public function index($profile_id = null){
        if(View::exists("layouts.base")){
            $this->data["main_view"] = "user_profile";
            $this->data["page_title"] = "Profile";

            $this->data["user"] = is_null($profile_id) ? auth()->user() : User_Model::where("id",$profile_id)->get()->first();

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

        $logged_in_user = auth()->user();

        $user = User_Model::whereNot("id" , $logged_in_user->id)->where("username" , $request->username)->get()->first();

        $request->session()->flash("flash",true);

        if(empty($user)){
            $update = User_Model::where("id",$logged_in_user->id)->update(["username"=>$request->username,"email" => $request->email]);
        
            if($update){
                $request->session()->flash("flash-type","success");
                $request->session()->flash("flash-msg","Details Updated Successfully");
                return redirect("profile");
            }else{
                $request->session()->flash("flash-type","danger");
                $request->session()->flash("flash-msg","Failed to update details");
                return redirect("edit");
            }
        }else{
            $request->session()->flash("flash-type","danger");
            $request->session()->flash("flash-msg","Username Alerady Taken");
            return redirect("edit");
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

        $request->session()->flash("flash",true);
        if(request("new_password") != request("new_password_confirm")){
            $request->session()->flash("flash-type","danger");
            $request->session()->flash("flash-msg","Password Doesn't Match");
            return \redirect("password");
        }

        $user = auth()->user();

        if(Hash::check(request("current_password"), $user->password)){
           $updated = User_Model::where("id",$user->id)->update(["password" => Hash::make(request("new_password")) ,"updated_at" => current_timestamp()]);
           $request->session()->flash("flash-type","success");
           $request->session()->flash("flash-msg","Password Changed Successfully");
           return \redirect("profile");
        }else{
            $request->session()->flash("flash-type","danger");
            $request->session()->flash("flash-msg","Failed to change Password");
            return \redirect("password");
        }
    }


    public function followThisUser(){
        $profile_id = $_POST["profile_id"];

        $following = User_Model::getFollowingList();
        $following = !empty($following) ? explode(",",$following) : [];
        if(!in_array($profile_id,$following)){
            array_push($following,$profile_id);
        }
        $following = implode(",",$following);

        $user = auth()->user();

        $result = User_Model::where("id",$user->id)->update(["following" => $following]);

        if($result){
            return response()->json([
                'success' => true,
                'message' => 'Successfully Following User!',
            ], 200);
        }
    }
   
}
