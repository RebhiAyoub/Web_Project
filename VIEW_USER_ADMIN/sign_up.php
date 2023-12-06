<?php
include '../CONTROLLER_USER_ADMIN/controller_user_admin.php';
include '../MODEL_USER_ADMIN/user_admin.php';
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
                null,
                $_POST['FirstName'],
                $_POST['LastName'],
                $_POST['email'],
                $_POST['dob'],
                $_POST["password"],
                $_POST["role"],
                0);
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
            Please click on this link to Verify your account: http://localhost/UserAdmin/VIEW_USER_ADMIN/ValidateUser.php?id_user=".$_SESSION["id_user"]."\n
            We hope you have a great day.\n
            -WWC Team";
            $mailSuccess = mail($to, $subject, $message, $headers);
            if ($mailSuccess) {
            echo "Email sent successfully";
            } else {
            echo "Email sending failed";
            }
            $role=$_POST["role"];
            header('Location: welcome.php');
            
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
    <title>SIGN UP form</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"><!--This line links an external CSS file (Bootstrap) to the HTML document, providing styles and layout for the webpage-->
    
    <style>
        .signup-form {
            width: 400px;
            margin: 0 auto;
            padding: 5px;
            border: 0px solid  rgb(255, 0, 183);
            border-radius: 20px;
        }
        .form-control {
            margin-bottom: 5px;
        }
        body {
            background: rgb(255, 0, 200);
            /* fallback for old browsers */
            background: -webkit-linear-gradient(to top, rgb(255, 0, 200), rgb(227, 129, 212));
            background: -moz-linear-gradient(to top, rgb(255, 0, 200), rgb(227, 129, 212));
            background: -o-linear-gradient(to top, rgb(255, 0, 200), rgb(227, 129, 212));
            background: linear-gradient(to top, rgb(255, 0, 200), rgb(227, 129, 212));
            background-size: cover;
            background-attachment: fixed;
            font-family: 'Roboto', sans-serif;
        }
    </style>
</head>
<body>
    <h1 style="text-align: center; font-size: 48px; color: rgb(255, 255, 255);"><b><ins>SIGN UP</ins></b></h1>
    <div class="signup-form">
        <form method="POST" action="" id="form">
            <div class="form-group">
                <label for="FirstName"></label>
                <input type="text" class="form-control" name="FirstName" id="FirstName" placeholder="FirstName" required>
            </div>
            <div class="error-message" id="errorFirstName"></div>
            <div class="form-group">
                <label for="LastName"></label>
                <input type="text" class="form-control" name="LastName" id="LastName" placeholder="LastName" required>
            </div>
            <div class="error-message" id="errorLastName"></div>
            
            <div class="form-group">
                <label for="email"></label>
                <input type="email" class="form-control" name="email" id="email" placeholder="Email" required>
            </div>
            <div class="error-message" id="errorEmail"></div>
            
            <div class="form-group">
                <label for="password"></label>
                <input type="password" class="form-control" name="password" id="password" placeholder="Password" required>
            </div>
            <div class="form-group">
                <label for="password_confirm"></label>
                <input type="password" class="form-control" id="password_confirm" placeholder="Password Confirmation" required>
            </div>
            <div class="error-message" id="errorPassword"></div>
            <div class="form-group">
                <label for="dob"></label>
                <input type="date" class="form-control" name="dob" id="dob" required>
            </div>
            <div class="form-group">
                <label for="role"></label>
                <select class="form-control" name="role" id="role" required >
                    <option value="">Role</option>
                    <option value="Admin">Admin</option>
                    <option value="User">User</option>
                    <option value="Specialist">Specialist</option>
                </select>
            </div>
            <div class="g-recaptcha" data-sitekey=6Ld7YCQpAAAAAFRIbpC2CBnqNzMj5_bSqKNTmcyX></div>
            <div class="form-group">
                <button class="btn btn-primary btn-block" type="submit" >SIGN UP</button>
            </div>
            
        </form>
    </div>
    <div>
        <pre style="text-align: center;"><ins>© 2023 SIGN UP form. All rights reserved | Design by Code Crafters</ins></pre>
    </div>
    <script src="sign_up.js"></script>
    <script src="https://www.google.com/recaptcha/api.js" async defer></script>

</body>

</html>
