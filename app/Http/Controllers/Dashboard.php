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
            $this->data["posts"] = Posts_Model::getAllPosts();
            // get User's Posts

            return view("layouts.base",$this->data);
        }
    }  
}
