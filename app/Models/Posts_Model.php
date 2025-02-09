<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;


class Posts_Model extends Model
{
    use HasFactory;
    protected $table = "posts";

    public $timestamps = false;

    protected $fillable = [
        'post_title',
        'post_thumb',
        'post_description',
        'status',
        'user_id'
    ];

    static public function getAllPosts(){
        return DB::table('posts')->join('users','users.id','=','posts.user_id')->where(["posts.status" => 1])->get(["users.username","users.following","posts.post_id","posts.user_id","posts.post_title","posts.post_thumb","posts.post_description"]);
    }
}
