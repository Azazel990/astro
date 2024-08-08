<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer_Model extends Model
{
    use HasFactory;
    protected $table = "customers";

   static public function authUser($username = "",$password = ""){
        return self::where("username",$username)->where("password",$password)->get(["id",'username'])->first();
    }
}
