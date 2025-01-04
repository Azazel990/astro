<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;


class Posts_Model extends Model
{
    use HasFactory;
    protected $table = "posts";

    static public function getAllPosts(){
        return DB::table('posts')->where(["status" => 1])->get(["post_id","user_id","post_title","post_thumb","post_description"]);
    }
}
