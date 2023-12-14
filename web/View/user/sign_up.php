<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

include '../../Controller/U/controller_user_admin.php';
include '../../Model/user_admin.php';
$error = "";
$user = null;
$to = null;
$subject = "Thank You.";

// create an instance of the controller
$userC = new controller_user_admin();
if (
    isset($_POST["FirstName"]) &&
    isset($_POST["LastName"]) &&
    isset($_POST["email"]) &&
    isset($_POST["dob"])&&
    isset($_POST["password"]) &&
    isset($_POST["role"]) &&
    isset($_POST["g-recaptcha-response"]))
{
    $recaptchaSecretKey = "6Ld7YCQpAAAAAHMCeVbT5M3u-badByIUCNujeKpt";
    $recaptchaResponse = $_POST["g-recaptcha-response"];
    $recaptchaUrl = "https://www.google.com/recaptcha/api/siteverify?secret={$recaptchaSecretKey}&response={$recaptchaResponse}";
    $recaptchaData = json_decode(file_get_contents($recaptchaUrl));

    if ($recaptchaData->success) {
        if (
            !empty($_POST["FirstName"]) &&
            !empty($_POST["LastName"]) &&
            !empty($_POST["email"]) &&
            !empty($_POST["dob"])&&
            !empty($_POST["password"])&&
            !empty($_POST["role"]))
        {
            $userN = new User(
                $_POST['FirstName'],
                $_POST['LastName'],
                $_POST['email'],
                $_POST['dob'],
                $_POST["password"],
                $_POST["role"],
                0,null);
            $userC->add_user($userN);
            session_start();
            $user=$userC->get_user($_POST['email']);
            $_SESSION['id_user']=$user["id_user"];

            $_SESSION['email']=$_POST['email'];
            $_SESSION['password']=$_POST['password'];
            $_SESSION['first_name']=$_POST['FirstName'];
            $_SESSION['last_name']=$_POST['LastName'];
            $_SESSION['date_of_birth']=$_POST['dob'];
            $_SESSION['role']=$_POST['role'];
            $_SESSION['status']=$user['user'];
            $to = $_POST["email"];
            $headers = "From: rebhiayoub03@gmail.com" . "\r\n" .
            "Reply-To: " . $to . "\r\n";
            $message = "Thank You ".$_POST["FirstName"].", for putting your trust in us and joining WWC.\n
            We will try our best to provide you with the best service possible.\n
            Please click on this link to Verify your account: http://localhost/web/View/user/ValidateUser.php?id_user=".$_SESSION["id_user"]."\n
            We hope you have a great day.\n
            -WWC Team";
            $mailSuccess = mail($to, $subject, $message, $headers);
            if ($mailSuccess) {
            echo "Email sent successfully";
            } else {
            echo "Email sending failed";
            }
            
            $role=$_POST["role"];
            header('Location: /web/View/user/welcome.html');
            exit;
            
            /*if ($role === 'Admin') {
                header('Location: table.php');
            } 
            else if ($role === 'User') {
                header('Location: index2.php');
            }*/
            
        } else
            $error = "Missing information";
    }
    else{
        echo " you are a robot ";
    }
} 
    
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>WWC Sign Up</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"><!--This line links an external CSS file (Bootstrap) to the HTML document, providing styles and layout for the webpage-->
    <!-- For favicon png -->
	<link rel="shortcut icon" type="image/icon" href="assets/logo/favicon.png"/>
	<script src="https://www.google.com/recaptcha/api.js" async defer></script>
    

    
    <style>
        @import url('https://fonts.googleapis.com/css?family=Raleway:400,700');

* {
	box-sizing: border-box;
	margin: 0;
	padding: 0;	
	font-family: Raleway, sans-serif;
}

body {
	background: linear-gradient(90deg, #C7C5F4, #776BCC);		
}

.container {
    padding-top: 20px;
    padding-bottom: 10px;
	display: flex;
	align-items: center;
	justify-content: center;
	min-height: 80vh;
}

.screen {	
	background: linear-gradient(90deg, #5D54A4, #7C78B8);		
	position: relative;	
	height: 750px;
	width: 360px;	
	box-shadow: 0px 0px 24px #5C5696;
}

.screen__content {
	z-index: 1;
	position: relative;	
	height: 100%;
}

.screen__background {		
	position: absolute;
	top: 0;
	left: 0;
	right: 0;
	bottom: 0;
	z-index: 0;
	-webkit-clip-path: inset(0 0 0 0);
	clip-path: inset(0 0 0 0);	
}

.screen__background__shape {
	transform: rotate(45deg);
	position: absolute;
}

.screen__background__shape1 {
	height: 520px;
	width: 520px;
	background: #FFF;	
	top: -50px;
	right: 120px;	
	border-radius: 0 72px 0 0;
}

.screen__background__shape2 {
	height: 220px;
	width: 220px;
	background: #6C63AC;	
	top: -172px;
	right: 0;	
	border-radius: 32px;
}

.screen__background__shape3 {
	height: 540px;
	width: 190px;
	background: linear-gradient(270deg, #5D54A4, #6A679E);
	top: -24px;
	right: 0;	
	border-radius: 32px;
}

.screen__background__shape4 {
	height: 400px;
	width: 200px;
	background: #7E7BB9;	
	top: 420px;
	right: 50px;	
	border-radius: 60px;
}

.login {
	width: 320px;
	padding-left: 20px;
	
}

.login__field {
	padding: 12px 0px;	
	position: relative;	
}

.login__icon {
	position: absolute;
	top: 30px;
	color: #7875B5;
}

.login__input {
	border: none;
	border-bottom: 2px solid #D1D1D4;
	background: none;
	padding: 10px;
	padding-left: 24px;
	font-weight: 700;
	width: 75%;
	transition: .2s;
}

.login__input:active,
.login__input:focus,
.login__input:hover {
	outline: none;
	border-bottom-color: #6A679E;
}

.login__submit {
	background: #fff;
	font-size: 14px;
	margin-top: 30px;
	padding: 16px 20px;
	border-radius: 26px;
	border: 1px solid #D4D3E8;
	text-transform: uppercase;
	font-weight: 700;
	display: flex;
	align-items: center;
	width: 100%;
	color: #4C489D;
	box-shadow: 0px 2px 2px #5C5696;
	cursor: pointer;
	transition: .2s;
}

.login__submit:active,
.login__submit:focus,
.login__submit:hover {
	border-color: #6A679E;
	outline: none;
}

.button__icon {
	font-size: 24px;
	margin-left: auto;
	color: #7875B5;
}

.social-login {	
	position: relative;
	height: 140px;
	width: 160px;
	text-align: center;
	bottom: 0px;
    top: 9px;
	right: 0px;
    left: 100px;
	color: #fff;
}

.social-icons {
	display: flex;
	align-items: center;
	justify-content: center;
}

.social-login__icon {
    
    width: 40px; /* Set the desired width */
    height: 40px; /* Set the desired height */
    margin-right: 10px;
}


.social-login__icon:hover {
	transform: scale(1.1);	
}
    </style>
</head>
<body>
    <div class="container">
        <div class="screen">
            <div class="screen__content">
                <form class="login" method="POST" action="" id="form">
                    <div class="login__field">
                        <i class="login__icon fas fa-user"></i>
                        <input type="text" class="login__input" name="FirstName" id="FirstName" placeholder="First Name">
                        <div class="error-message" id="errorFirstName"></div>
                    </div>
                    <div class="login__field">
                        <i class="login__icon fas fa-user"></i>
                        <input type="text" class="login__input" name="LastName" id="LastName" placeholder="Last Name">
                        <div class="error-message" id="errorLastName"></div>

                    </div>
                    <div class="login__field">
                        <i class="login__icon fas fa-user"></i>
                        <input type="text" class="login__input" name="email" id="email" placeholder="Email">
                        <div class="error-message" id="errorEmail"></div>

                    </div>
                    <div class="login__field">
                        <i class="login__icon fas fa-user"></i>
                        <input type="password" class="login__input" name="password" id="password" placeholder="Password">

                    </div>
					<div class="login__field">
                        <i class="login__icon fas fa-user"></i>
                        <input type="password" class="login__input"  placeholder="Confirm Password" id="password_confirm">
                        <div class="error-message" id="errorPassword"></div>

                    </div>
                    <div class="login__field">
                        <i class="login__icon fas fa-user"></i>
                        <input type="date" class="login__input" name="dob" id="dob"placeholder="Date Of Birth">
                    </div>
                    <div class="login__field">
                        <i class="login__icon fas fa-lock"></i>
                        <select class="login__input" name="role" aria-placeholder="Role">
                            <option value="User">User</option>
                            <option value="Admin">Admin</option>
                            <option value="specialist">Specialist</option>
                        </select>
                    </div>

					<div class="g-recaptcha" data-sitekey=6Ld7YCQpAAAAAFRIbpC2CBnqNzMj5_bSqKNTmcyX></div>
                    
                    <button type="submit" class="button login__submit">
                        <span class="button__text">Sign Up Now</span>
                        <i class="button__icon fas fa-chevron-right"></i>
                    </button>       
                   
                    
                            
                </form>
                <div class="social-login">
                    <h3>Sign Up via</h3>
                    <div class="social-icons">
                        <img src="../model/assets/images/insta.png" alt="Instagram" class="social-login__icon">
                        <img src="../model/assets/images/fb.png" alt="Facebook" class="social-login__icon">
                        <img src="../model/assets/images/twitter.png" alt="Twitter" class="social-login__icon">
                    </div>
                    
                </div>
            </div>
            <div class="screen__background">
                <span class="screen__background__shape screen__background__shape4"></span>
                <span class="screen__background__shape screen__background__shape3"></span>		
                <span class="screen__background__shape screen__background__shape2"></span>
                <span class="screen__background__shape screen__background__shape1"></span>
            </div>		
        </div>
    </div>
    <pre style="text-align: center;"><ins>© 2023 LOG IN form. All rights reserved | Design by Code Crafters</ins></pre>

    <script>
        document.addEventListener("DOMContentLoaded", function () {
    function showError(elementId, message) {
    var errorElement = document.getElementById(elementId);
    errorElement.innerHTML = message;
    errorElement.style.color = 'red';
}

function clearError(elementId) {
    var errorElement = document.getElementById(elementId);
    errorElement.innerHTML = '';
}

    // Function to validate first name
    function validateFirstName() {
        var firstName = document.getElementById("FirstName").value;
        var firstNameRegex = /^[a-zA-Z]{2,20}$/;

        if (!firstNameRegex.test(firstName)) {
            showError('errorFirstName', 'Invalid first name. It should contain only letters and be between 2 and 20 characters.');
            return false;
        }
        clearError('errorFirstName');
        return true;
    }

    // Function to validate last name
    function validateLastName() {
        var lastName = document.getElementById("LastName").value;
        var lastNameRegex = /^[a-zA-Z]{2,20}$/;

        if (!lastNameRegex.test(lastName)) {
            showError('errorLastName', 'Invalid last name. It should contain only letters and be between 2 and 20 characters.');
            return false;
        }
        clearError('errorLastName');
        return true;
    }

    // Function to validate email
    function validateEmail() {
        var email = document.getElementById("email").value;
        var emailRegex = /^[\w-]+(\.[\w-]+)*@gmail\.com$/;

        if (!emailRegex.test(email)) {
            showError('errorEmail','Invalid email. It should be a valid Gmail address.');
            return false;
        }
        clearError('errorEmail');
        return true;
    }

    // Function to validate password and confirmation
    function validatePassword() {
        var password = document.getElementById("password").value;
        var confirmPassword = document.getElementById("password_confirm").value;

        if (password !== confirmPassword) {
            showError('errorPassword','Passwords do not match.');
            return false;
        }
        clearError('errorPassword');
        return true;
    }

    // Function to handle form submission
    function handleSubmit(event) {
        if (
            !validateFirstName() ||
            !validateLastName() ||
            !validateEmail() ||
            !validatePassword()
        ) {
            event.preventDefault();
        }
    }

    // Attach the validation functions to the form submission
    document.getElementById("form").addEventListener("submit", handleSubmit);
});
    </script>
</body>
</html>