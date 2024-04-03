<?php 
// session_start(); 
include "functions-page.php";
// isset($_POST['uname']) && isset($_POST['password'])
    // && isset($_POST['name']) && isset($_POST['re_password'])
if (isset($_POST['create-user'])) {

	function validate($data){
       $data = trim($data);
	   $data = stripslashes($data);
	   $data = htmlspecialchars($data);
	   return $data;
	}

	$uname = validate($_POST['uname']);
	$pass = validate($_POST['password']);
	$email = validate($_POST['email']);
	$re_pass = validate($_POST['re_password']);
	$type = "user";
	$name = "";
	// $name = validate($_POST['name']);
	// $type = "user";

	$user_data = 'uname='. $uname. '&name='. $name;
	// echo $pass;
	// exit();


	if (empty($uname)) {
		header("Location: index.php?error=User Name is required&$user_data&showCreateAccountForm=1");
	    exit();
	}else if(empty($pass)){
        header("Location: index.php?error=Password is required&$user_data&showCreateAccountForm=1");
	    exit();
	}
	else if(empty($re_pass)){
        header("Location: index.php?error=Re Password is required&$user_data&showCreateAccountForm=1");
	    exit();
	}

	// else if(empty($name)){
    //     header("Location: index.php?error=Name is required&$user_data&showCreateAccountForm=1");
	//     exit();
	// }

	else if($pass !== $re_pass){
        header("Location: index.php?error=The confirmation password  does not match&$user_data&showCreateAccountForm=1");
	    exit();
	}

	else{

		// hashing the password
        // $pass = password_hash($pass, PASSWORD_DEFAULT);
		
		$hashpass = password_hash($pass, PASSWORD_DEFAULT);
		// echo $hashpass;
		// exit();
	    $sql = "SELECT * FROM users WHERE username='$uname' ";
		$result = mysqli_query($conn, $sql);

		if (mysqli_num_rows($result) > 0) {
			header("Location: index.php?error=The username is taken try another&$user_data&showCreateAccountForm=1");
	        exit();
		}else {
			// $sql2 = "INSERT INTO users (name, username, password, email, type ) VALUES('$name', '$uname', '$pass', '$email', '$type')";
			$sql2 = "INSERT INTO users (username, email, password, type ) VALUES('$uname', '$email', '$hashpass', '$type')";
           $result2 = mysqli_query($conn, $sql2);
           if ($result2) {
           	 header("Location: index.php?error=Your account has been created successfully");
	         exit();
           }else {
	           	header("Location: index.php?error=unknown error occurred&$user_data&showCreateAccountForm=1");
		        exit();
           }
		}
	}
	
}else{
	header("Location: index.php?showCreateAccountForm=1&error=enter%20your%20details");
	exit();
}