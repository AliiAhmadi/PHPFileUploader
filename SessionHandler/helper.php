<?php
session_start();

function CheckExtension($extension)
{
    $allowedExtensions = [
        "jpg",
        "jpag",
        "json",
        "pdf",
        "txt",
        "doc",
        "rtf",
        "gif",
        "rar"
    ];
    if (in_array($extension, $allowedExtensions)) {
        return true;
    } else {
        return false;
    }
}

function sizeChecker($size)
{
    return ($size <= 50000);
}


function splitFile($data)
{
    return explode(".", $data);
}


$message = null;
$status = false;
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if ($_POST["submit"] == "Submit") {
        if (isset($_FILES["file"]) && !empty($_FILES["file"])) {
            $GLOBALS["fileName"] = $_FILES["file"]["name"];
            $GLOBALS["fileSize"] = $_FILES["file"]["size"];
            $GLOBALS["fileType"] = $_FILES["file"]["type"];

            $fileOptions = splitFile($GLOBALS["fileName"]);
            $fileOptions[1] = strtolower($fileOptions[1]);

            if (CheckExtension($fileOptions[1]) && sizeChecker($GLOBALS["fileSize"])) {
                $fileNameInServer = md5($GLOBALS["fileName"] . time()) . "." . $fileOptions[1];
                $uploadLocation = "../uploads/";
                $fullPath = $uploadLocation . $fileNameInServer;

                if (move_uploaded_file($_FILES["file"]["tmp_name"], $fullPath)) {
                    $GLOBALS["message"] = "file successfuly uploaded";
                    $GLOBALS["status"] = true;
                } else {
                    $GLOBALS["message"] = "Error";
                    $GLOBALS["status"] = false;
                }
            } else {
                $GLOBALS["message"] = "This file is not allowed for upload";
                $GLOBALS["status"] = false;
            }
        } else {
            $GLOBALS["message"] = "First select your file";
            $GLOBALS["status"] = false;
        }
    } else {
        $GLOBALS["message"] = "Please select your file";
        $GLOBALS["status"] = true;
    }
} else {
    $GLOBALS["message"] = "Please select your file";
    $GLOBALS["status"] = true;
}
$_SESSION["message"] = $message;
$_SESSION["status"] = $status;
$_SESSION["size"] = $fileSize;
header("location:index.php");
