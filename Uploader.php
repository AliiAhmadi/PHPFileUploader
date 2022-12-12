<?php

session_start();
$message = null;
$status = false;
if($_SERVER["REQUEST_METHOD"] == "POST"){
    if($_POST["submit"] == "Submit"){
        if(isset($_POST["file"]) && !empty($_POST["file"])){
            
        }else{
            $GLOBALS["message"] = "Please Upload your file";
            $GLOBALS["status"] = false;
        }
    }
}else{
    $GLOBALS["message"] = "Select your file";
    $GLOBALS["status"] = true;
}

?>