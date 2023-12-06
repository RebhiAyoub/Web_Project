<?php
session_start();

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
        <span ><?php echo $_SESSION['last_name'] ?> </span>

        <label for="email">Email:</label>
        <span ><?php echo $_SESSION['email'] ?> </span>

        
        <label for="password">Password:</label>
        <span><?php echo $_SESSION['password']; ?></span>

        <label for="dob">Date of Birth:</label>
        <span ><?php echo $_SESSION['date_of_birth'] ?> </span>

        <label for="role">Role:</label>
        <span ><?php echo $_SESSION['role'] ?> </span>
    </div>
    <div align ="center">
        <a onclick="window.location.href='editprofile.php'" class="bn5">EDIT</a>
    </div>
    <pre>

    </pre>
    <div align ="center">
        <a onclick="window.location.href='log_out.php'" class="bn5">LOG_OUT</a>
    </div>
    
</body>
</html>