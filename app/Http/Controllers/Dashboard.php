<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Gate;

use App\Models\Posts_Model;

class Dashboard extends Controller
{
    public $data = [];

    public function __construct(){
        parent::__construct();
    }

    public function index(int $preference = 1){
        if(View::exists("layouts.base")){

            $user = auth()->user();

            $this->data["main_view"] = "dashboard";
            $this->data["name"] = $user->username;
            $this->data["page_title"] = "Dashboard";

            // get User's Posts
            $posts = Posts_Model::getAllPosts();
            if($preference != 1){
                $all_gates = ['2' => "my-posts",'3' =>'is-following'];
                $gate_used = isset($all_gates[$preference]) ? $all_gates[$preference] : 1;
                foreach($posts as $index => $post){
                    if(Gate::denies($gate_used,$post)){
                        unset($posts[$index]);
                    }
                }
            }
            $this->data["posts"] = $posts;
            // get User's Posts

            return view("layouts.base",$this->data);
        }
    }  
}
