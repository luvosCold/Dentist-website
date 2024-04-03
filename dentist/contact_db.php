<?php
include_once("functions-page.php");

if(isset($_POST['go-submit'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $info = $_POST['message'];
    $sql = "INSERT INTO `contact`(`name`, `email`, `info`) VALUES (?, ?, ?)";
    if($stmt = mysqli_prepare($conn, $sql)) {
        mysqli_stmt_bind_param($stmt, "sss", $name, $email, $info);
        if (mysqli_stmt_execute($stmt)){
            header("location: index.php?error=no");
            exit();
        } else {
            header("location: index.php?error=yes");
            exit();
        }
    }
}

