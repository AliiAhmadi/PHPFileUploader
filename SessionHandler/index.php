<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>File Uploader - Session Handler</title>
</head>
<body>
    <form action="<?php
        echo $_SERVER["PHP_SELF"];
    ?>" method="post" style="text-align: center;">
    <label for="file" style="color: <?php
        require_once "Uploader.php";
        if($GLOBALS["status"]){
            echo "green";
        }else{
            echo "red";
        }
    ?>;">
    <?php
        echo $GLOBALS["message"];
    ?>
    </label>
    <br><br>
        <input type="file" name="file" id="file">
        <br><br>
        <input type="submit" value="Submit" name="submit">
    </form>
</body>
</html>