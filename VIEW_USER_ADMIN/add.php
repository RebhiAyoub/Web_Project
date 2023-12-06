<?php
include '../CONTROLLER_USER_ADMIN/controller_user_admin.php';
include '../MODEL_USER_ADMIN/user_admin.php';
$error = "";
$user = null;

// create an instance of the controller
$user = new controller_user_admin();
if (
    isset($_POST["first_name"]) &&
    isset($_POST["last_name"]) &&
    isset($_POST["email"]) &&
    isset($_POST["date_of_birth"])&&
    isset($_POST["password"]) &&
    isset($_POST["role"]))
{
    if (
        !empty($_POST["first_name"]) &&
        !empty($_POST["last_name"]) &&
        !empty($_POST["email"]) &&
        !empty($_POST["date_of_birth"])&&
        !empty($_POST["password"])&&
        !empty($_POST["role"]))
    {
        $user = new user(
            $_POST['id'],
            $_POST['first_name'],
            $_POST['last_name'],
            $_POST['email'],
            $_POST['date_of_birth'],
            $_POST["password"],
            $_POST["role"]);
        $user->add_user($user);
        header('Location: table.php');
    } else
        $error = "Missing information";
} 
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Add Player</title>
</head>
    <body>
        <form method="POST" action="">
            <table>
                <tr>
                    <td><label for="first_name">Firstame</label></td>  
                    <td><input type="text" name="first_name" id="first_name"></td>
                </tr>
                <tr>
                    <td><label for="last_name">Lastname</label></td>   
                    <td><input type="text" name="last_name" id="last_name"></td>
                </tr>
                <tr>
                    <td><label for="email">Email</label></td>         
                    <td><input type="email" name="email" id="email"></td>
                </tr>
                <tr>
                    <td><label for="date_of_birth">date_of_birth</label></td>              
                    <td><input type="date" name="date_of_birth" id="date_of_birth"></td>
                </tr>
                
                <tr>
                    <td><label for="password">password</label></td>   <td><input type="pwd" name="password" id="password"></td>
                </tr>
                <tr>
                    <td><label for="role">role</label></td>  
                    <td> 
                        <select class="form-control" id="role" required >
                        <option value="">Role</option>
                        <option value="Admin">Admin</option>
                        <option value="User">User</option>
                        <option value="Specialist">Specialist</option>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td colspan="4"><input type="submit" value="Validate"></td>
                </tr>
            </table>
        </form>
        <p align="center"><?php echo $error; ?></p>
    </body>
</html>