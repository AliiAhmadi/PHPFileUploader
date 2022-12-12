<?php
session_start();
?>
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
                    echo "helper.php";
                    ?>" method="post" style="text-align: center;" enctype="multipart/form-data">
        <label for="file" style="color: <?php
                                        if (isset($_SESSION["status"]) && $_SESSION["status"]) {
                                            echo "green";
                                        } else {
                                            echo "red";
                                        }
                                        ?>;">
            <?php
            if (isset($_SESSION["message"])) {
                echo $_SESSION["message"];
            }
            ?>
        </label>
        <br><br>
        <input type="file" name="file" id="file">
        <br><br>
        <input type="submit" value="Submit" name="submit">
    </form>
</body>

</html>