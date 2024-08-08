<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;

abstract class Controller
{
    //
    public function __construct(){
        $this->checkUserSession();
    }

    private function checkUserSession(){
        if(session()->has("user_id")){
            $result= DB::table('customers')->where('id',session()->get("user_id"))->get("id");
            if(empty($result)){
                $this->logout();
            }
        }else{
            $this->logout();
        }
    }

    public function logout(){
        
        if(session()->has("user_id")){
            session()->forget("user_id");
        }
        return redirect("login");
    }
}

