<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Gate;

use App\Models\Posts_Model as Post_Model;

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

    public function createNewPost(Request $request){

        $request->validate(
            [
                "post_title" => ["required","min:3","max:25"],
                "post_desc" => ["alpha_num"],
                "post_img" => ["required"]
            ]
        );

        $user = auth()->user();

        // uploading Image...
        $path = $request->file('post_img')->store('uploads');

        // Adding Post to database;
        $result = Post_Model::insert([
            "post_title" => $request->post_title,
            "post_description" => $request->post_desc,
            "post_thumb" => basename($path),
            "user_id" => $user->id
        ]);

        return back()->with('success', 'Image uploaded successfully.')->with('image_path', Storage::url($path));
    }

    public function updatePost(int $post_id = 0){
        $this->data["post"] = Post_Model::where(["post_id" => $post_id])->get()->first();

        // checking if user is allowed to update post
        if(Gate::denies("check-update-user",$this->data["post"])){
            return redirect("dashboard");
        }

        if(View::exists("layouts.base")){
            $this->data["main_view"] = "update_post";
            $this->data["name"] = auth()->user()->username;
            $this->data["page_title"] = "Update Post";
            return view("layouts.base",$this->data);
        }
    }

    public function updatePostDB(Request $request){
        $request->validate(
            [
                "post_title" => ["required","min:3","max:25"],
                "post_desc" => ["alpha_num"],
            ]
        );

        $post = Post_Model::where(["post_id" => $request->post_id])->get()->first();

        // checking if user is allowed to update post
         if(Gate::denies("check-update-user",$post)){
            return redirect("dashboard");
        }

        $user = auth()->user();
        $updated = Post_Model::where("post_id",$request->post_id)->update(["post_title" => $request->post_title,"post_description" => $request->post_desc]);

        if($updated){
            $request->session()->flash("flash-type","success");
            $request->session()->flash("flash-msg","Post Updated successfully");
            return redirect("dashboard");
        }else{
            $request->session()->flash("flash-type","danger");
            $request->session()->flash("flash-msg","Failed to update post");
            return back();
        }
    }
}
