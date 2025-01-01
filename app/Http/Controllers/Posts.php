<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Storage;
// use Intervention\Image\Facades\Image;
use Intervention\Image\Laravel\Facades\Image as Img;
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
        $image = $request->file('post_img');

        // Resize and compress the image
        $resizedImage = Img::read($image)->resize(800, null, function ($constraint) {
                $constraint->aspectRatio(); // Maintain aspect ratio
            })->encode('jpg', 75); // Adjust quality (0-100)

        // Save the compressed image
        $filename = 'uploads/' . time() . '.jpg';
        Storage::disk('public')->put($filename, $resizedImage);

        // Adding Post to database;
        $result = Post_Model::insert([
            "post_title" => $request->post_title,
            "post_description" => $request->post_desc,
            "post_thumb" => basename($filename),
            "user_id" => $user->id
        ]);

        return back()->with('success', 'Image uploaded successfully.')->with('image_path', Storage::url($path));
    }

    // public function createNewPost(Request $request){

    //     $request->validate(
    //         [
    //             "post_title" => ["required","min:3","max:25"],
    //             "post_desc" => ["alpha_num"],
    //             "post_img" => ["required"]
    //         ]
    //     );

    //     $user = auth()->user();

    //     // uploading Image...
    //     $path = $request->file('post_img')->store('uploads');

    //     // Adding Post to database;
    //     $result = Post_Model::insert([
    //         "post_title" => $request->post_title,
    //         "post_description" => $request->post_desc,
    //         "post_thumb" => basename($path),
    //         "user_id" => $user->id
    //     ]);

    //     return back()->with('success', 'Image uploaded successfully.')->with('image_path', Storage::url($path));
    // }
}
