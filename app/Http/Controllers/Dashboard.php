<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;


class Dashboard extends Controller
{
    public function __construct(){
        parent::__construct();
    }

    public function index(){
        echo "dashboard";
    }
}
