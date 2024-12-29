<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;

class Posts extends Controller
{
    public $data = [];

    public function __construct(){
        parent::__construct();
    }

    public function newPost(){
        if(View::exists("layouts.base")){
            $this->data["main_view"] = "new_post";
            $this->data["name"] = auth()->user()->username;
            $this->data["page_title"] = "Create Post";
            return view("layouts.base",$this->data);
        }
    }  

    public function createNewPost(){
        pr($_POST);
    }
}
