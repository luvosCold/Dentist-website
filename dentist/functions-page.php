<?php
session_start();

$dbsevername = "localhost";
$dbusername = "root";
$dbpassword = "";
$dbname = "dental";

$conn = mysqli_connect($dbsevername, $dbusername, $dbpassword);

mysqli_select_db($conn, $dbname);


function uidExists($conn, $User, $email) {
	// $sql = "SELECT * FROM users WHERE username = ? OR email = ?;";
	$sql = "SELECT * FROM `users` WHERE  username = ? OR email = ?;";
	// $sql1 = "SELECT * FROM admin WHERE usersUid = ? OR usersEmail = ?;";
	$stmt = mysqli_stmt_init($conn);
	if (!mysqli_stmt_prepare($stmt, $sql)) {
		header("location: index.php?error=stmtfailed");
        exit();
	}

	mysqli_stmt_bind_param($stmt, "ss", $User, $email);

	mysqli_stmt_execute($stmt);

	$resultData = mysqli_stmt_get_result($stmt);

	if ($row = mysqli_fetch_assoc($resultData)) {
		return $row;
	}else {
		$result = false;
		return $result;
	}

	mysqli_stmt_close($stmt);
}

// function createUser($conn, $name, $sur, $User, $email, $cell, $password) {
// 	$sql = "INSERT INTO users (usersName, usersSur, usersUid, usersEmail, usersNumber, usersPassword) VALUES (?, ?, ?, ?, ?, ?);";
// 	$stmt = mysqli_stmt_init($conn);
// 	if (!mysqli_stmt_prepare($stmt, $sql)) {
// 		header("location: sign-up.php?error=stmtfailed");
//         exit();
// 	}
// 	$hashPwd = password_hash($password, PASSWORD_DEFAULT);
// 	mysqli_stmt_bind_param($stmt, "ssssss", $name, $sur, $User, $email, $cell, $hashPwd);

// 	mysqli_stmt_execute($stmt);
// 	mysqli_stmt_close($stmt);

// 	header("location: login.php");
//     exit();
// }

function loginUser($conn, $User, $pass) {
	$uidExists = uidExists($conn, $User, $User);

	if($uidExists === false) {
		header("location: index.php?error=userdoesnotexist");
	}
	
	$pwdHashed = $uidExists["password"];
	// echo $pwdHashed;
	// exit();
	$checkPwd = password_verify($pass, $pwdHashed);
	
	
	if($checkPwd === false) {
		header("location: index.php?error=incorrect-password/username&showLoginPopup=1");
		exit();
	}
	else if ($checkPwd === true) {
		$_SESSION["userid"] = $uidExists["id"];
		$_SESSION["useruid"] = $uidExists["username"];
		$_SESSION["type"] = $uidExists["type"];

		if($_SESSION["type"] == "admin") {
			header("location: admin.php");
			exit();
		}else{
			header("location: index.php?you`re successfully loggedin");
			exit();
		}
		
	}
}

function select_all($varconn, $dbname, $table, $row_title)
{

	$query = "SELECT `$row_title` FROM `$table`;";
	
	$result = mysqli_query($varconn, $query);

	$items = array();
      
	while ($row = mysqli_fetch_assoc($result)) {
		$value = $row[$row_title];
		array_push($items,$value);
	}
	
	return $items;


}
//end
