<?php
include_once('functions-page.php');
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <!DOCTYPE html>
    <html>
    <head>
        <meta charset='utf-8'>
        <meta http-equiv='X-UA-Compatible' content='IE=edge'>
        <title>Dental care</title>
        <meta name='viewport' content='width=device-width, initial-scale=1'>
        <link rel='stylesheet' type='text/css' media='screen' href='style.css'>
        <link rel='stylesheet' type='text/css' media='screen' href='main.css'>
        <link rel='stylesheet' type='text/css' media='screen' href='bookings.css'>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <script src='main.js'></script>
        

        <!-- links -->
            <link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
            <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
            <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
            <link rel="stylesheet" type="text/css" href="styles.css">
            <link rel="stylesheet" type="text/css" href="custom-datepicker-style.css">

    </head>
    <body>
    <!-- HEADER -->
    <header>
        <div class="container">
            <div class="logo">
                <img width="200" src="images/logos/Advanced-Black-Logo.png" alt="logo">
            </div>
            <nav>
                <a href="index.php#home">Home</a>
                <a href="index.php#about">About</a>
                <a href="index.php#services">Services</a>
                <a href="index.php#dentists">Dentists</a>
                <a href="index.php#contact">Contact</a>
            </nav>
            <?php
        if (isset($_SESSION['useruid'])) {
            echo "<a class='btn' style='background: white; color: #333; border-bottom:3px solid black;' id='welcome-message'>welcome: " . $_SESSION['useruid'] . "</a>";
            echo "<a href='logout.php' class='btn' style='background: white; color: blue; border: 1px solid blue;'>Log out</a>";
        }
        ?>

            <!-- <a href="" class="btn">Appointment</a> -->
         </div>
    </header>
<!-- APPOINTMENT -->
    <section class="appointment" id="appointment">
        <div class="container">
            <!-- <h1>Get An Appointment</h1> -->
            <div class="box">
                <div class="content">
                <form action="form.php" method="post" onsubmit="return validateForm()">
                <div class="form-container">
                    <div>
                        <h2 style='color:blue; font-size:20px; border-bottom:5px solid blue;'>CLIENT DETAILS</h2>
                    </div>
                    <div>
                        <label for="full-name">Full Name:</label>
                        <input type="text" id="full-name" name="full-name" placeholder="enter Full name">
                    </div>
                    <div>
                        <label for="email">Email:</label>
                        <input type="email" id="email" name="email" placeholder="enter email">
                    </div>
                    <div>
                        <label for="phone">Phone Number:</label>
                        <input type="number" id="phone" name="phone" placeholder="phone number">
                    </div>
                    <div class="date-picker-container">
                        <label for="preferred-date">Preferred Date:</label>
                        <input placeholder="Click to select date" type="text" id="preferred-date" name="preferred-date">
                    </div>
                    <div>
                        <label for="preferred-time">Preferred Time:</label>
                        <input type="time" id="preferred-time" name="preferred-time">
                    </div>
                    <div>
                        <label for="services">Services Required:</label>
                        <textarea id="services" name="services" rows="4" placeholder="..."></textarea>
                    </div>
                    <button type="submit" class="submit" name="form-submit">Submit</button>
                </div>
            </form>

                        <div class="vector-container">
                            
                        </div>
                </div>
            </div>
        </div>
    </section>
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

    <!-- Add SweetAlert2 library -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>

<script>
    function validateForm() {
    var fullName = document.getElementById('full-name').value;
    var email = document.getElementById('email').value;
    var phone = document.getElementById('phone').value;
    var preferredDateInput = document.getElementById('preferred-date');
    var preferredTime = document.getElementById('preferred-time').value;

    // Add your validation logic here

    if (fullName === '' || email === '' || phone === '' || preferredTime === '') {
        Swal.fire({
            icon: 'error',
            title: 'Error',
            text: 'Please fill in all required fields.'
        });
        return false; // Prevent form submission
    }

    var selectedDate = new Date(preferredDateInput.value);
    var currentDate = new Date();
    
    if (selectedDate <= currentDate) {
        Swal.fire({
            icon: 'error',
            title: 'Error',
            text: 'Please select a future date.'
        });
        return false; // Prevent form submission
    }

        Swal.fire({
        icon: 'success',
        title: 'Success',
        text: 'Your appointment is successfully booked!',
        timer: 240000, // Automatically close after 2 minutes (120 seconds)
});

    return true; // Allow form submission
}

// calenda

    $(function() {
      $("#preferred-date").datepicker();
    });

</script>

    </html>