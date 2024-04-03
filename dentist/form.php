<?php
include_once("functions-page.php");


if(isset($_POST['form-submit'])) {
    $name = $_POST['full-name'];
    $email = $_POST['email'];
    $number = $_POST['phone'];
    $date = $_POST['preferred-date'];
    $time = $_POST['preferred-time'];
    $info = $_POST['services'];
    $sql = "INSERT INTO `appointments`(`name`, `email`, `number`, `date`, `time`, `info`) VALUES (?, ?, ?, ?, ?, ?)";
    if($stmt = mysqli_prepare($conn, $sql)) {
        mysqli_stmt_bind_param($stmt, "ssssss", $name, $email, $number, $date, $time, $info);
        if (mysqli_stmt_execute($stmt)){
            header("location: appointment.php?error=no");
            exit();
        } else {
            header("location: appointment.php?error=yes");
            exit();
        }
    }

}
