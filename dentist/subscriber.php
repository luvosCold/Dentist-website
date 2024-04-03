<?php
include_once("functions-page.php");


if(isset($_POST['submit3'])) {
    $email = $_POST['email'];
    $sql = "INSERT INTO `subscribers`(`email`) VALUES (?)";
    if($stmt = mysqli_prepare($conn, $sql)) {
        mysqli_stmt_bind_param($stmt, "s",$email);
        if (mysqli_stmt_execute($stmt)){
            header("location: index.php?error=no");
            exit();
        } else {
            header("location: index.php?error=yes");
            exit();
        }
    }

}


?>
