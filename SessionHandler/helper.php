<?php
session_start();

$message = null;
$status = false;
if($_SERVER["REQUEST_METHOD"] == "POST"){
    if($_POST["submit"] == "Submit"){
        if(isset($_POST["file"]) && !empty($_POST["file"])){
            $GLOBALS["message"] = "file successfuly uploaded";
            $GLOBALS["status"] = true;
        }else{
            $GLOBALS["message"] = "First select your file";
            $GLOBALS["status"] = false;
        }
    }else{
        $GLOBALS["message"] = "Please select your file";
        $GLOBALS["status"] = true;
    }
}else{
        $GLOBALS["message"] = "Please select your file";
        $GLOBALS["status"] = true;
}
$_SESSION["message"] = $message;
$_SESSION["status"] = $status;

var_dump($message);

header("location:index.php");
?>