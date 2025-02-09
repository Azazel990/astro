<?php
// helpers.php
use Illuminate\Support\Facades\Gate;

function pr($data = []){
    echo "<pre>";print_r($data);echo "</pre>";exit;
}

function current_timestamp(){
    date_default_timezone_set("Asia/Kolkata");
    return date("Y-m-d h:i:s");
}

function getImagePath($path = ""){
    return "storage/uploads/".$path;
}

function getUploadPath($path = ""){
    return url('storage/uploads/'.$path);
}

function getLoggedInUserName(){
    return auth()->user()->username;
}

function checkUserPostUpdate($post){
    return Gate::allows("check-update-user",$post);
}

function checkIfUserAllowedToEdit($guest){
    return Gate::allows("edit-profile",$guest);
}


function getProfilePic($path = ""){
    return url('assets/images/profile/bg-2.jpg');
}

?>