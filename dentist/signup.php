<!DOCTYPE html>
<html>
<head>
	<title>SIGN UP</title>
	<link rel="stylesheet"  href="lewei.css">
</head>
<body>
     <form action="signup-check.php" method="post">
     <div class="col-md-4 hidden-sm-down2" id="_desktop_logo">
                            <h1>
                                <a href="#home"><img class="logo img-responsive" src="images/logo.jpg" alt="Connex Store" style="width:90%;"></a>
                            </h1>
                        </div>

     	<h2>SIGN UP</h2>
     	<?php if (isset($_GET['error'])) { ?>
     		<p class="error"><?php echo $_GET['error']; ?></p>
     	<?php } ?>

          <?php if (isset($_GET['success'])) { ?>
               <p class="succ"><?php echo $_GET['success']; ?></p>
          <?php } ?>

          <label>Name</label>
          <?php if (isset($_GET['name'])) { ?>
               <input type="text" name="name" placeholder="Name" value="<?php echo $_GET['name']; ?>"><br>
          <?php }else{ ?>
               <input type="text" name="name" placeholder="Name"><br>
          <?php }?>

          <label>email</label>
          <?php if (isset($_GET['email'])) { ?>
               <input type="text" name="email" placeholder="email" value="<?php echo $_GET['email']; ?>"><br>
          <?php }else{ ?>
               <input type="text" name="email" placeholder="email"><br>
          <?php }?>

          <label>User Name</label>
          <?php if (isset($_GET['uname'])) { ?>
               <input type="text" name="uname" placeholder="User Name" value="<?php echo $_GET['uname']; ?>"><br>
          <?php }else{ ?>
               <input type="text" name="uname" placeholder="User Name"><br>
          <?php }?>


     	<label>Password</label>
     	<input type="password" name="password" placeholder="Password"><br>

          <label>Re Password</label>
          <input type="password" name="re_password" placeholder="Re_Password"><br>

     	<button type="submit" value="luvo.php">Sign Up</button>
          <a href="luvo.php" class="ca">Already have an account? Login</a>
     </form>
</body>
</html>