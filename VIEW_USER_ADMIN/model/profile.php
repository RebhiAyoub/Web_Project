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
                $_session['email']=$_POST["email"];
                $_session['first_name']=$user["first_name"];
                $_session['last_name']=$user["last_name"];
                $_session['date_of_birth']=$user["date_of_birth"];
                //echo $user["role"];
                $_session['role']=$user["role"];
                //echo $_session["role"];
                if($_session['role']=="User")
                    header("Location: index2.php");
                else if($_session['role']=="Admin")
                header('Location: table.php');


            }
            else{ 
                echo "user doe not exist ";
            }    


        }
        else {
            echo "messing info";
        }

    }
    else 
    {
        echo "not set ";
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile Page</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <div class="profile-container">
        <h2>Profile Information</h2>
        <label for="firstName">First Name:</label>
        <span ><?php echo $_SESSION['first_name'] ?> </span>

        <label for="lastName">Last Name:</label>
        <span id="lastName"></span>

        <label for="email">Email:</label>
        <span id="email"></span>

        <label for="password">Password:</label>
        <span id="password"></span>

        <label for="dob">Date of Birth:</label>
        <span id="dob"></span>

        <label for="role">Role:</label>
        <span id="role"></span>
    </div>
    <div align ="center">
        <a onclick="window.location.href='editprofile.htmL'" class="bn5">EDIT</a>
    </div>
    
</body>
</html>