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

    public function index(){
        if(View::exists("layouts.base")){

            $user = auth()->user();

            $this->data["main_view"] = "dashboard";
            $this->data["name"] = $user->username;
            $this->data["page_title"] = "Dashboard";

            // get User's Posts
            $posts = Posts_Model::getAllPosts();
            // foreach($posts as $index => $post){
            //     if(Gate::denies("view-post",$post)){
            //         unset($posts[$index]);
            //     }
            // }
            $this->data["posts"] = $posts;
            // get User's Posts

            return view("layouts.base",$this->data);
        }
    }  
}
