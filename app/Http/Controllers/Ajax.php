<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class Ajax extends Controller
{
    public function logMeOut(){
        return $this->logout();
    }
}
