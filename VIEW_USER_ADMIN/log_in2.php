<?php
include "../CONTROLLER_USER_ADMIN/controller_user_admin.php";
$c=new controller_user_admin();
if (
    isset($_POST["email"]) &&
    isset($_POST["password"]) )
{
    if (
        !empty($_POST["email"]) &&
        !empty($_POST["password"])){
            if($c->log_in($_POST["email"],$_POST["password"])!=null)
            {
                session_start();
                $user=$c->get_user($_POST["email"]);
                $_SESSION['email']=$_POST["email"];
                $_SESSION['password']=$_POST["password"];
                $_SESSION['id_user']=$user["id_user"];
                $_SESSION['first_name']=$user["first_name"];
                $_SESSION['last_name']=$user["last_name"];
                $_SESSION['date_of_birth']=$user["date_of_birth"];
                $_SESSION['role']=$user["role"];
                $_SESSION['status']=$user["status"];
                $_session['role']=$user["role"];
                if($_SESSION['status']==1)
                {
                    if($_session['role']=="User")
                        header("Location: index2.php");
                    else if($_session['role']=="Admin")
                        header('Location: table.php');   
                }
                else 
                {
                    echo "to log in you've to verify your account ";
                }


            }
            else{ 
                echo "user doe not exist ";
            }    


        }
        else {
            echo "messing info";
        }

    }
   
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LOG IN form</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        .signup-form {
            width: 400px;
            margin: 0 auto;
            padding: 5px;
            border: 0px solid rgb(255, 0, 183);
            border-radius: 20px;
        }

        .form-control {
            margin-bottom: 5px;
        }

        body {
            background: rgb(255, 0, 200);
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
    <h1 style="text-align: center; font-size: 48px; color: rgb(255, 255, 255);"><b><ins>LOG IN</ins></b></h1>
    <div class="signup-form">
        <form action="" method="POST">
            <!-- Add action and method attributes to the form -->

            <div class="form-group">
                <label for="username"></label>
                <input type="text" class="form-control" name="email" id="username" placeholder="Username" required>
            </div>
            <div class="form-group">
                <label for="password"></label>
                <input type="password" class="form-control" name="password" id="password" placeholder="Password" required>
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-primary btn-block" id="btn1"onclick="window.location.href='index2.php'">Log In</button>
            </div>
            <div class="form-group">
                <a style="text-align: center;" href="sign_up.php">You don't have an Account? SIGN UP NOW !</a>
            </div>
        </form>
    </div>
    <div>
        <pre style="text-align: center;"><ins>© 2023 LOG IN form. All rights reserved | Design by Code Crafters</ins></pre>
    </div>
</body>
</html>
