<?php
//error_reporting(E_ALL);
//ini_set('display_errors', 1);

include_once '../../Controller/U/controller_user_admin.php';

$c = new controller_user_admin();

if (isset($_POST["forgot"]) && !empty($_POST["forgot"])) {
    header("location: forget.php");
}

if (isset($_POST["email"]) && isset($_POST["password"])) {
    if (!empty($_POST["email"]) && !empty($_POST["password"])) {
        if ($c->log_in($_POST["email"], $_POST["password"]) != null) {
            session_start();
            $user = $c->get_user($_POST["email"]);
            $_SESSION['email'] = $_POST["email"];
            $_SESSION['password'] = $_POST["password"];
            $_SESSION['id_user'] = $user["id_user"];
            $_SESSION['first_name'] = $user["first_name"];
            $_SESSION['last_name'] = $user["last_name"];
            $_SESSION['date_of_birth'] = $user["date_of_birth"];
            $_SESSION['role'] = $user["role"];
            $_SESSION['status'] = $user["status"];
            $_SESSION['role'] = $user["role"];

            if ($_SESSION['status'] == 1) {
                if ($_SESSION['role'] == "User") {
                    header("Location: /web/View/user/index.php");
                } else if ($_SESSION['role'] == "Admin") {
                    header("Location: /web/View/admin/ui.php");
                }
            } else {
                echo '<script>
                        Swal.fire({
                            icon: "warning",
                            title: "Account Verification Required",
                            text: "To log in, you need to verify your account.",
                        }).then(function() {
                            window.location.href = "/carvilla-v1.0/View/user/index.php";
                        });
                    </script>';
            }
            exit(); // Stop further execution after displaying the notification.
        } else {
            echo '<script>
                    Swal.fire({
                        icon: "error",
                        title: "User Does Not Exist",
                        text: "The entered credentials are incorrect.",
                    });
                </script>';
        }
    } else {
        echo '<script>
                Swal.fire({
                    icon: "error",
                    title: "Missing Information",
                    text: "Please provide both email and password.",
                });
            </script>';
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>WWC Log In</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"><!--This line links an external CSS file (Bootstrap) to the HTML document, providing styles and layout for the webpage-->
    <!-- For favicon png -->
	<link rel="shortcut icon" type="image/icon" href="assets/logo/favicon.png"/>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
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
	padding: 30px;
	padding-top: 156px;
}

.login__field {
	padding: 20px 0px;	
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
	position: absolute;
	height: 140px;
	width: 160px;
	text-align: center;
	bottom: 0px;
	right: 0px;
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
                <form class="login" method="POST" action="" id="loginForm">
                    <div class="login__field">
                        <i class="login__icon fas fa-user"></i>
                        <input type="text" name="email" class="login__input" placeholder="Email">
                    </div>
                    <div class="login__field">
                        <i class="login__icon fas fa-lock"></i>
                        <input type="password" name="password" class="login__input" placeholder="Password">
                    </div>
                    <button class="button login__submit" type="submit">
                        <span class="button__text">Log In Now</span>
                        <i class="button__icon fas fa-chevron-right"></i>
                    </button>
                </form>
                <div class="social-login">
                    <h3>log in via</h3>
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

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        // Check if the PHP script has set a session variable for successful login
        <?php
		if ($_SERVER['REQUEST_METHOD'] === 'POST') {
			if (isset($_SESSION['status']) && $_SESSION['status'] == 1) {
				echo '
				// Redirect to the index page
				window.location.href = "/carvilla-v1.0/View/user/index.php";
				';
			}
			else{
				echo '
				Swal.fire({
					icon: "error",
					title: "Login Failed",
					text: "The entered credentials are incorrect.",
				});
				';
				// Reset the session variable
				$_SESSION['login_error'] = false;
			}
		}
        ?>
    </script>
</body>

</html>