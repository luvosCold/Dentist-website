<!DOCTYPE html>
<html>
<head>
	<title>LOGIN</title>
	<link rel="stylesheet"  href="lewei.css">
	<link rel="stylesheet" href="main.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <script src='main.js'></script>
</head>

<!-- HEADER -->
<header>
        <div class="container">
            <div class="logo">
                <img width="200" src="images/logos/Advanced-Black-Logo.png" alt="logo">
            </div>
            <nav>
                <a href="index.php#specialist">Home</a>
                <a href="index.php#about">About</a>
                <a href="index.php#services">Services</a>
                <a href="index.php#dentists">Dentists</a>
                <a href="index.php#contact">Contact</a>
            </nav>

            <a href="" class="btn">Appointment</a>
         </div>
    </header>
<!-- APPOINTMENT -->

<body>
     <form action="load-page.php" method="post">
	 					<div class="col-md-4 hidden-sm-down2" id="_desktop_logo">
                            <h1>
                                <a href="#home"><img class="logo img-responsive" src="images/logo.jpg" alt="Connex Store" style="width:90%;"></a>
                            </h1>
                        </div>

     	<h2>LOGIN</h2>
     	<?php if (isset($_GET['error'])) { ?>
     		<p class="error"><?php echo $_GET['error']; ?></p>
     	<?php } ?>
     	<label>User Name</label>
     	<input type="text" name="uname" placeholder="User Name"><br>

     	<label>Password</label>
     	<input type="password" name="password" placeholder="Password"><br>

     	<button type="submit" name="submit2">log in</button>
        <a href="signup.php" class="ca">Create an account</a>
		
     </form>
	  <!-- FOOTER -->
	  <footer>
        <div class="container">
            <div class="box">
                <img width="200" src="images/logos/Advanced-Black-Logo.png" alt="logo">
                <p>Follow our Social Media</p>
                <div class="icons">
                    <a href="" class="fa fa-facebook-f"></a>
                    <a href="" class="fa fa-instagram"></a>
                    <a href="" class="fa fa-linkedin"></a>
                    <a href="" class="fa fa-twitter"></a>
                </div>
            </div>
    
            <div class="box">
                <h2>Quick Links</h2>
                <a href="index.php">Home</a>
                <a href="">About</a>
                <a href="">Services</a>
                <a href="">Dentist</a>
                <a href="">Contact</a>
            </div>
    
            <div class="box">
                <h2>Opennig Hours</h2>
                <ul>
                    <li>Mon: 08:00-16:00</li>
                    <li>Tue: 08:00-16:00</li>
                    <li>Wend: 08:00-16:00</li>
                    <li>Thur: 08:00-16:00</li>
                    <li>Fri: 08:00-16:00</li>
                    <li>Sat: 10:00-14:00</li>
                    <li>Sat: closed</li>
                </ul>
            </div>
    
            <div class="box">
                <h2>Send Feed back</h2>
                <form action="subscriber.php" method="post">
                <div class="input">
                    <input type="email" name="email" placeholder="Enter Your Email" required>
                    <button type="submit" class="send" name="submit3">Subscribe</button>
                </div>
            </form>
            </div>
        </div>
    
        <div class="credit">
            <p>All Rights Reserved | Created by @ <span>Luvo ngqele</span></p>
        </div>
    </footer>
</body>
</html>
