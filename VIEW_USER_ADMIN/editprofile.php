<?php

session_start();
include '../CONTROLLER_USER_ADMIN/controller_user_admin.php';
include '../MODEL_USER_ADMIN/user_admin.php';
$error = "";

//echo "ID: " . $_SESSION['id_user'] . "<br>";
//echo "First Name: " . $_SESSION['first_name'] . "<br>";
$user = null;
// create an instance of the controller
$userC = new controller_user_admin();
if (
    //isset($_POST["id_user"]) &&
    isset($_POST["first_name"]) && 
    isset($_POST["last_name"]) && 
    isset($_POST["email"]) &&
    isset($_POST["password"]) && 
    isset($_POST["date_of_birth"])
    //isset($_POST["role"])

    )
{
    if (
        //!empty($_POST['id_user']) &&
        !empty($_POST['first_name']) && 
        !empty($_POST["last_name"]) && 
        !empty($_POST["email"]) &&
        !empty($_POST["password"]) && 
        !empty($_POST["date_of_birth"])
        //!empty($_POST["role"])
        )
    {
        $user = new user(
            $_SESSION['id_user'],
            $_POST['first_name'],
            $_POST['last_name'],
            $_POST['email'],
            $_POST['date_of_birth'],
            $_POST['password'],
            $_SESSION['role'],//$_POST['role']
            $_SESSION['status']
        );
        $userC->update_user($user);
        $_SESSION['email']=$_POST['email'];
        $_SESSION['password']=$_POST['password'];
        $_SESSION['first_name']=$_POST['first_name'];
        $_SESSION['last_name']=$_POST['last_name'];
        $_SESSION['date_of_birth']=$_POST['date_of_birth'];
        header('Location:index2.php');
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
    <title>EDIT PROFILE</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"><!--This line links an external CSS file (Bootstrap) to the HTML document, providing styles and layout for the webpage-->
    <link rel="stylesheet" href="styles.css">
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
    <pre>


    </pre>
    <h1 style="text-align: center; font-size: 48px; color: rgb(255, 255, 255);"><b><ins>EDIT PROFILE</ins></b></h1>
    
    <div class="signup-form">
        <form method="post" action="" id="form">
            
            <div class="form-group">
                <label for="FirstName">First Name</label>
                <input type="text" class="form-control" name="first_name" id="FirstName" value="<?php echo $_SESSION['first_name'] ?>" required>
            </div>
            <div class="error-message" id="errorFirstName"></div>

            <div class="form-group">
                <label for="LastName">Last Name</label>
                <input type="text" class="form-control" name="last_name" id="LastName" value="<?php echo $_SESSION['last_name'] ?>" required>
            </div>
            <div class="error-message" id="errorLastName"></div>

            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" class="form-control" name="email" id="email" value="<?php echo $_SESSION['email'] ?>" required>
            </div>
            <div class="error-message" id="errorEmail"></div>

            <div class="form-group">
                <label for="password"> Password</label>
                <input type="text" class="form-control" name="password" id="password" value="<?php echo $_SESSION['password'] ?>" required>
            </div>
            <div class="form-group">
                <label for="password_confirm">Password Confirm</label>
                <input type="text" class="form-control" id="password_confirm" placeholder=<?php echo $_SESSION['password'] ?> required>
            </div>
            <div class="error-message" id="errorPassword"></div>

            <div class="form-group">
                <label for="dob">Date of birth</label>
                <input type="date" class="form-control" name="date_of_birth" id="dob" value="<?php echo $_SESSION['date_of_birth'] ?>" required>
            </div>
            <div class="form-group" align="center">
                <button type="submit" class="bn5" id="btn2" >SAVE</button>
            </div>
            
        </form>
    </div>
    <div>
        <pre style="text-align: center;"><ins>© 2023 SIGN UP form. All rights reserved | Design by Code Crafters</ins></pre>
    </div>
    <script src="sign_up.js"></script>
</body>
</html>