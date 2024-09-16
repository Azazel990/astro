<?php
// helpers.php

function pr($data = []){
    echo "<pre>";print_r($data);echo "</pre>";exit;
}

function current_timestamp(){
    date_default_timezone_set("Asia/Kolkata");
    return date("Y-m-d h:i:s");
}
?>