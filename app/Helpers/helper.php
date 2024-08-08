<?php
// helpers.php

function pr($data = []){
    echo "<pre>";print_r($data);echo "</pre>";exit;
}

function userLogout(){
    if(session()->has("user_id")){
        session()->forget("user_id");
    }
}


?>