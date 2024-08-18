<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;

class Dashboard extends Controller
{
    public $data = [];

    public function __construct(){
        parent::__construct();
    }
 
    public function index(){
        if(View::exists("layouts.base")){
            $this->data["main_view"] = "dashboard";
            $this->data["name"] = auth()->user()->username;
            $this->data["title"] = "Dashboard";
            return view("layouts.base",$this->data);
        }
    }  
}
