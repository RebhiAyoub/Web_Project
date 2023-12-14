<?php

session_start();
include '/Applications/XAMPP/xamppfiles/htdocs/carvilla-v1.0/Controller/user/controller_user_admin.php';
include '/Applications/XAMPP/xamppfiles/htdocs/carvilla-v1.0/Model/user_admin.php';
$error = "";


$user = null;
// create an instance of the controller
$userC = new controller_user_admin();
if (
    //isset($_POST["id_user"]) &&
    isset($_POST["FirstName"]) && 
    isset($_POST["LastName"]) && 
    isset($_POST["email"]) &&
    isset($_POST["password"]) && 
    isset($_POST["dob"])
    //isset($_POST["role"])

    )
{
    if (
        //!empty($_POST['id_user']) &&
        !empty($_POST['FirstName']) && 
        !empty($_POST["LastName"]) && 
        !empty($_POST["email"]) &&
        !empty($_POST["password"]) && 
        !empty($_POST["dob"])
        //!empty($_POST["role"])
        )
    {
        $user = new user(
            $_POST['FirstName'],
            $_POST['LastName'],
            $_POST['email'],
            $_POST['dob'],
            $_POST['password'],
            $_SESSION['role'],//$_POST['role']
            $_SESSION['status'],
			$_SESSION['id_user']
        );
        $userC->update_user($user);
        $_SESSION['email']=$_POST['email'];
        $_SESSION['password']=$_POST['password'];
        $_SESSION['first_name']=$_POST['FirstName'];
        $_SESSION['last_name']=$_POST['LastName'];
        $_SESSION['date_of_birth']=$_POST['dob'];
        header('Location:/carvilla-v1.0/View/user/index.php');
    } 
    else
    {
        echo "Missing information";
    }
        
}
else 
{
    //echo "";
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
	display: flex;
	align-items: center;
	justify-content: center;
	min-height: 90vh;
}

.screen {	
	background: linear-gradient(90deg, #5D54A4, #7C78B8);		
	position: relative;	
	height: 600px;
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
                        <input type="text" class="login__input" name="FirstName" id="FirstName" placeholder="<?php echo $_SESSION["first_name"] ?>">
                        <div class="error-message" id="errorFirstName"></div>
                    </div>
                    <div class="login__field">
                        <i class="login__icon fas fa-user"></i>
                        <input type="text" class="login__input" name="LastName" id="LastName" placeholder="<?php echo $_SESSION["last_name"] ?>">
                        <div class="error-message" id="errorLastName"></div>

                    </div>
                    <div class="login__field">
                        <i class="login__icon fas fa-user"></i>
                        <input type="text" class="login__input" name="email" id="email" placeholder="<?php echo $_SESSION["email"] ?>">
                        <div class="error-message" id="errorEmail"></div>

                    </div>
                    <div class="login__field">
                        <i class="login__icon fas fa-user"></i>
                        <input type="password" class="login__input" name="password" id="password" placeholder="<?php echo $_SESSION["password"] ?>">

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
                    
                    
                    <button type="submit" class="button login__submit" href="../index.php">
                        <span style="padding-left: 80px;"class="button__text">Edit Now</span>
                        <i class="button__icon fas fa-chevron-right"></i>
					</button>
                   
                    
                            
                </form>
                
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