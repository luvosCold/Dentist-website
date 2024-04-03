<?php
include_once('functions-page.php');
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>Dental clinic</title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <link rel='stylesheet' type='text/css' media='screen' href='main.css'>
    <link rel='stylesheet' type='text/css' media='screen' href='extra.css'>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">



    <style>
/* Styles for the chat button */
#chat-button {
  position: fixed;
  bottom: 20px;
  right: 20px;
  background-color: blue;
  color: white;
  padding: 10px 20px;
  border: none;
  cursor: pointer;
  border-radius: 5px;
  z-index: 999;
}

#chat-button:hover{ 
    background-color: white;
    color: blue;
    border: 1px solid blue;
}

/* style for map responsive */
    @media screen and (max-width: 455px) {
      #map iframe {
        width: 100%; /* Set the width to 100% on smaller screens */
        margin-left: 5px; /* Remove the left margin on smaller screens */
      }
    }

    /* Add your custom styles here */
.modal {
    display: none;
    position: fixed;
    z-index: 1;
    left: 0;
    top: 0;
    width: 100%;
    height: 100%;
    background-color: rgba(0,0,0,0.5);
}

.modal-content {
    background-color: #fff;
    margin: 15% auto;
    padding: 20px;
    border: 1px solid #888;
    width: 80%;
    max-width: 400px;
    left:34rem;
    position: relative;
    border-radius:12px;
}

.modal-content h2{
    color:blue;
}

.close {
    position: absolute;
    top: 0;
    right: 0;
    padding: 10px;
    cursor: pointer;
}

#chat-box {
    height: 200px;
    border: 1px solid blue;
    overflow: auto;
    margin-bottom: 10px;
    border-radius:3px;
}

#user-message {
    width: 80%;
    padding: 5px;
    border-bottom:2px solid blue;
}

#send-message {
    width: 25%;
    padding: 5px;
    cursor: pointer;
    color:blue;
    border:1px solid blue;
}

#send-message:hover{
    background-color:blue;
    color:white;
}

/* Default styles for the menu bar */
.menu-button {
    display: none; /* Hide the menu button by default */
}

nav {
    display: block;
}

nav a {
    display: inline-block;
    margin-right: 20px;
}

/* Media query for screens with a maximum width of 455px */
@media (max-width: 455px) {
    .menu-button {
        display: block; /* Display the menu button on smaller screens */
        cursor: pointer;
    }

    nav {
        display:; /* Hide the navigation links by default on smaller screens */
    }

    nav.active {
        display: block; /* Display the navigation links when the menu button is clicked */
    }
}




</style>
</head>
<body>
<!-- HEADER -->
<header>
    <div class="container">
        <div class="logo">
            <img width="200" src="images/logos/Advanced-Black-Logo.png" alt="logo">
        </div>
        <!-- <div class="menu-button">&#9776;</div> -->
            <nav>
                <a href="#home" id="home-button">Home</a>
                <a href="#about" id="about-button">About</a>
                <a href="#services" id="services-button">Services</a>
                <a href="#specialist" id="specialist-button">Dentists</a>
                <a href="#contact" id="contact-button">Contact</a>
            </nav>
        <!-- <a href="shop.php" class="btn">Shop Now</a> -->
        <?php
        if (isset($_SESSION['useruid'])) {
            echo "<a class='btn' style='background: white; color: #333; border-bottom:3px solid black;' id='welcome-message'>welcome: " . $_SESSION['useruid'] . "</a>";
            echo "<a href='logout.php' class='btn' style='background: white; color: blue; border: 1px solid blue;'>Log out</a>";
        } else {
            echo "<a href='#' class='btn' style='background: white; color: blue; border: 1px solid blue;' id='login-button'>Login</a>";
        }
        ?>
        <script>
            $(document).ready(function() {
    $(".menu-button").click(function() {
        $("nav").toggleClass("active");
    });
});
</script>
        </script>
    </div>
<script></script>

</header>


<!-- Pop-up login form -->
<div id="login-popup" class="popup">
    <div class="popup-content">
        <span class="close" id="close-popup">&times;</span>
        <div id="continue-with">
            <h3>Continue with:</h3>
            <button id="continue-google"><i style="font-size:24px" class="fa">&#xf0d4;</i>Google</button>
            <button id="continue-facebook"><i style="font-size:24px" class="fa">&#xf082;</i>Facebook</button>
            <button id="continue-apple"><i style="font-size:24px" class="fa">&#xf179;</i>Apple</button>
        </div>
        <div id="login-form">
            <h2>Login</h2>
            <form action="load-page.php" method="post">
                <?php if (isset($_GET['error'])) { ?>
                    <p class="error"><?php echo $_GET['error']; ?></p>
                <?php } ?>
                <input type="text" name="uname" placeholder="user name">
                <input type="password" name="password" placeholder="Password">
                <button type="submit" name="submit">Login</button>
            </form>
            <p>Don't have an account? <a href="#" id="create-account-link">Create one</a></p>
        </div>
        <div id="create-account-form" style="display: none;">
            <h2>Create Account</h2>
            <form action="signup-check.php" method="post">
            <?php if (isset($_GET['error'])) { ?>
                    <p class="error"><?php echo $_GET['error']; ?></p>
                <?php } ?>
                <?php if (isset($_GET['uname'])) { ?>
                    <input type="text" name="uname" placeholder="User Name" value="<?php echo $_GET['uname']; ?>">
                <?php } else { ?>
                    <input type="text" name="uname" placeholder="User Name"><br>
                <?php } ?>

                <?php if (isset($_GET['email'])) { ?>
                    <input type="text" name="email" placeholder="email" value="<?php echo $_GET['email']; ?>"><br>
                <?php } else { ?>
                    <input type="text" name="email" placeholder="email">
                <?php } ?>

                <input type="password" name="password" placeholder="Password"><br>
                <input type="password" name="re_password" placeholder="Re_Password"><br>
                <button type="submit" name="create-user" value="switch-to-login">Sign Up</button>
            </form>
            <p>Already have an account? <a href="#" id="switch-to-login">Login</a></p>
        </div>
    </div>
</div>



<script>
    // JavaScript to control the pop-up and switch between login and registration forms
    const loginPopup = document.getElementById("login-popup");
    const loginButton = document.getElementById("login-button");
    const closePopup = document.getElementById("close-popup");
    const createAccountLink = document.getElementById("create-account-link");
    const switchToLogin = document.getElementById("switch-to-login");
    
    window.addEventListener("load", function () {
        const urlParams = new URLSearchParams(window.location.search);
        if (urlParams.has("showLoginPopup")) {
            // The query parameter is present, so open the login popup
            loginPopup.style.display = "block";
        }
    });
    window.addEventListener("load", function () {
        const urlParams = new URLSearchParams(window.location.search);
        if (urlParams.has("showCreateAccountForm")) {
            // The query parameter is present, so show the create account form
            document.getElementById("login-form").style.display = "none";
            document.getElementById("create-account-form").style.display = "block";
            loginPopup.style.display = "block";
        }
    });

    loginButton.addEventListener("click", () => {
        loginPopup.style.display = "block";
    });

    closePopup.addEventListener("click", () => {
        loginPopup.style.display = "none";
    });

    createAccountLink.addEventListener("click", () => {
        document.getElementById("login-form").style.display = "none";
        document.getElementById("create-account-form").style.display = "block";
    });

    switchToLogin.addEventListener("click", () => {
        document.getElementById("login-form").style.display = "block";
        document.getElementById("create-account-form").style.display = "none";
    });
</script>


<!-- HOME -->
<section class="home" id="home">

    <div class="container">
        <div class="box">
            <div class="content">
                <h1>Make your smile better today</h1>
                <h2>We always care for your health</h2>
                <p>Good dental health is crucial to being able to eat and speak, Without Healthy teeth chewing can be painful!</p>
                <h5>D.r Lucks Ngqele</h5>
                <a href="appointment.php" class="btn">Book Appointment</a>
            </div>
    
    <!-- <button id="chat-button">Chat with us</button> -->
    <button id="chat-button"><i style="font-size:24px" class="fa">&#xf0e6;</i>Lets Chat</button>

    <!-- The chat modal -->
    <div id="chat-modal" class="modal">
        <div class="modal-content">
            <span class="close" id="close-chat">&times;</span>
            <h2>Hello! How can I help you?</h2>
            <div id="chat-box">
                <!-- Chat messages will go here -->
            </div>
            <input type="text" id="user-message" placeholder="Type your message...">
            <button id="send-message">Send</button>
        </div>
    </div>

    <script>

document.getElementById('chat-button').onclick = function() {
    document.getElementById('chat-modal').style.display = 'block';
};

document.getElementById('close-chat').onclick = function() {
    document.getElementById('chat-modal').style.display = 'none';
};

document.getElementById('send-message').onclick = function() {
    var userMessage = document.getElementById('user-message').value;
    var chatBox = document.getElementById('chat-box');

    // Display user message in the chat box
    chatBox.innerHTML += 'You: ' + userMessage + '<br>';
    
    // Send the user's message to an API for processing
    fetch('https://api.example.com/your-processing-endpoint', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
        },
        body: JSON.stringify({ message: userMessage }),
    })
    .then(response => response.json())
    .then(data => {
        // Display the API's response in the chat box
        chatBox.innerHTML += 'API: ' + data.response + '<br>';
    })
    .catch(error => {
        console.error('Error:', error);
    });

    document.getElementById('user-message').value = ''; // Clear the input field
};


        // document.getElementById('chat-button').onclick = function() {
        // document.getElementById('chat-modal').style.display = 'block';
        // };

        // document.getElementById('close-chat').onclick = function() {
        // document.getElementById('chat-modal').style.display = 'none';
        // };

        // document.getElementById('send-message').onclick = function() {
        // var userMessage = document.getElementById('user-message').value;
        // var chatBox = document.getElementById('chat-box');
    
        // // Display user message in the chat box
        // chatBox.innerHTML += 'You: ' + userMessage + '<br>';
        
        // // You can also send the user's message to an API for further processing and get a response from there.
        // // For simplicity, this example just echoes the user's message.
        
        // document.getElementById('user-message').value = ''; // Clear the input field
        // };

    </script>

<script>
// Function to handle the chat button click event
// document.getElementById('chat-button').onclick = function() {
//     window.open('https://api.whatsapp.com/send?phone=0634477058', '_blank');
// };
</script>
</section>
<!-- ABOUT -->
<section class="about" id="about">
    <div class="heading">
        <h2>About US</h2>
    </div>
    <div class="container">
        <div class="image">
            <img src="images/more/12.webp" alt="about us">
        </div>
        <div class="content">
            <h1>Why Choose Us?</h1>
            <h2>We have Experts</h2>
            <p>We deliver Quality care by delivering quality services and  
                Quality care for our customers.
                sergical services to ensure a superior
                experience and clinical outcomes.!</p>

                <p class="p">Dentistry is the diagnosis, treatment,
                     and prevention of conditions, disorders, and diseases of the teeth,
                    gums, mouth, and jaw. Often considered necessary for complete oral health,
                     dentistry can have an impact on the health of your entire body.</p>

                     <a href="learn.html" class="btn">Learn More</a>
        </div>
    </div>
</section>

<!-- SERVICES -->
<section class="services" id="services">
    
    <div class="container">
        <div class="box">
            <div class="image">
                <img src="images/services/filling.webp" alt="">
            </div>
            <div class="content">
                <h1>Teeth Filling</h1>
                <h5>By Best Dentist</h5>
                <p>Dental fillings are single or combinations of metals, plastics,
                glass or other materials used to repair or restore teeth. One of the most popular uses of fillings
                 is to “fill” an area of tooth that your dentist has removed due to decay – “a cavity.” </p>

                <a href="appointment.php" class="btn">Fix Appointment</a>
            </div>
        </div>

        <div class="box">
            <div class="image">
                <img src="images/services/whitening.jpg" alt="">
            </div>
            <div class="content">
                <h1>Teeth Whitening</h1>
                <h5>By Best Dentist</h5>
                <p>Do you have a blue or grey coloured tooth? Non-vital whitening is a whitening procedure done
                on a tooth which died normally due to trauma or has had a root canal treatment.
                 Root canal treated teeth can discolour over time.
                </p>

                <a href="appointment.php" class="btn">Fix Appointment</a>
            </div>
        </div>

        <div class="box">
            <div class="image">
                <img src="images/services/implant.jpg" alt="">
            </div>
            <div class="content">
                <h1>Teeth Transplant</h1>
                <h5>By Best Dentist</h5>
                <p>Dental implant surgery is a procedure that replaces tooth roots with metal, screwlike posts and replaces
                damaged or missing teeth with artificial teeth that look and function much like real ones.</p>

                <a href="appointment.php" class="btn">Fix Appointment</a>
            </div>
        </div>
    </div>
</section>

<!-- DENTIST -->
<section class="specialist" id="specialist">
    <div class="heading">
        <h1>Our specialist</h1>
    </div>
    <div class="container">
        <div class="box">
            <div class="image">
                <img src="images/doctors/lucks.jpg" alt="">
            </div>
            <div class="content">
                <h1>Dr. Ngqele</h1>
                <h2>Specialist Teeth-Filling</h2>
                <p>Book your Appointment to meet our specialist Dr Ngqele on Time!</p>

                <a href="appointment.php" class="btn">Fix Appointment</a>
            </div>
        </div>

        <div class="box">
            <div class="image">
                <img src="images/doctors/t.jpg" alt="">
            </div>
            <div class="content">
                <h1>Dr. Dlamini</h1>
                <h2>Specialist whitening</h2>
                <p>Book your Appointment to meet our specialist Dr Dlamini on Time!</p>

                <a href="appointment.php" class="btn">Fix Appointment</a>
            </div>
        </div>

        <div class="box">
            <div class="image">
                <img src="images/doctors/vesta.jpg" alt="">
            </div>
            <div class="content">
                <h1>Dr. Sollz</h1>
                <h2>Specialist Transplant</h2>
                <p>Book your Appointment to meet our specialist Dr Sollz on Time!</p>

                <a href="appointment.php" class="btn">Fix Appointment</a>
            </div>
        </div>
    </div>
</section>

<!-- QUOTE -->
<section class="quote" id="quote">
    <div class="container">
        <div class="box">
            <div class="image">
                <img src="images/more/Dental.jpg" alt="">
            </div>
            <div class="content">
                <h1>Keep Your Teeth Clean</h1>
                <h2>Secrete of Healthy Teeth</h2>
                <p>Healthy teeth and gums make it easy for you to eat well and enjoy good food.
                     Several problems can affect the health of your mouth,
                     but good care should keep your teeth and gums strong as you age.</p>
                <p class="p">
                    Teeth are covered in a hard, outer coating called enamel.
                     Every day, a thin film of bacteria called dental plaque builds up on your teeth.
                      The bacteria in plaque produce acids that can harm enamel and cause cavities. 
                </p>
                    <a href="appointment.php" class="btn">Fix Appointment</a>
            </div>
        </div>
    </div>
</section>

<!-- CONTACT -->
<section class="contact" id="contact">
    <div class="heading">
        <h2>Contact US</h2>
    </div>
    <div class="container">
        <div class="image">
            <img src="images/more/contact.jpg" alt="">
        </div>

        <form id="fcf-form-id" method="post" action="contact_db.php" onsubmit="return validateForm();">
        <h1>Get in Touch With Us</h1>
        <input type="text" id="Name" name="name" placeholder="Enter Your Name">
        <input type="email" id="Email" name="email" placeholder="Enter Your Email">
        <textarea id="Message" name="message" placeholder="Your Message" cols="30" rows="10"></textarea>
        <input type="submit" name="go-submit" id="fcf-button" class="submit" value="Submit">
    </form>

    </div>
    </div>
</section>
<script src='main.js'></script>
<section class="map" id="map">
  <div class="content">
    <h1>FIND US</h1>
    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3579.7710646158284!2d28.030374374510302!3d-26.204124563969106!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x1e950ea6594c90a3%3A0x165896dec7234252!2sSci-Bono%20Discovery%20Centre!5e0!3m2!1sen!2sza!4v1697206213961!5m2!1sen!2sza" height="300" width="70%" style="0; margin:6px 5px; margin-left:15rem;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
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
            <a href="">Home</a>
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
            <h2>Subscribe</h2>
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
    <script>
        function validateForm() {
            // Get form elements
            var name = document.getElementById("Name").value;
            var email = document.getElementById("Email").value;
            var message = document.getElementById("Message").value;

            // Regular expression to validate email format
            var emailRegex = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/;

            // Check for errors
            var errors = [];
            if (name.trim() === "") {
                errors.push("Please enter your name.");
            }
            if (!email.match(emailRegex)) {
                errors.push("Please enter a valid email address.");
            }
            if (message.trim() === "") {
                errors.push("Please enter your message.");
            }

            // Display error messages in a pop-up
            if (errors.length > 0) {
                alert("Errors:\n" + errors.join("\n"));
                return false; // Prevent form submission
            }

            return true; // Form submission allowed if no errors
        }


        // COOKIESSSS LINK
        
// Function to set a cookie
function setCookie(name, value, days) {
    var expires = "";
    if (days) {
        var date = new Date();
        date.setTime(date.getTime() + (days * 24 * 60 * 60 * 1000));
        expires = "; expires=" + date.toUTCString();
    }
    document.cookie = name + "=" + value + expires + "; path=/";
}

// Function to get a cookie by name
document.getElementById("open-popup").addEventListener("click", function () {
    document.getElementById("popup-container").style.display = "block";
});

document.getElementById("close-popup").addEventListener("click", function () {
    document.getElementById("popup-container").style.display = "none";
});


// CONTINUE WITH GOOGLE

gapi.load('auth2', function () {
        gapi.auth2.init({
            client_id: 'YOUR_CLIENT_ID',
        });
    });

function signInWithGoogle() {
    gapi.auth2.getAuthInstance().signIn().then(function (user) {
        console.log("Signed in as: " + user.getBasicProfile().getName());
        // You can add additional logic here, such as sending user data to your server.
    }, function (error) {
        console.log("Google sign-in failed: " + error.error);
    });
}


// menu bar


    </script>
</html>