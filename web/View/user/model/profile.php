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
    <style>
        body {
    font-family: Arial, sans-serif;
    background-color: #f4f4f4;
}

.profile-container {
    max-width: 600px;
    margin: 50px auto;
    padding: 30px;
    background-color: #ffffff;
    box-shadow: 0px 0px 5px 0px rgba(0,0,0,0.1);
}

h2 {
    text-align: center;
    margin-bottom: 20px;
}

label {
    display: block;
    margin-bottom: 5px;
}

span {
    display: block;
    margin-bottom: 20px;
}


.bn5 {
    padding: 0.6em 2em;
    border: none;
    outline: none;
    color: rgb(255, 255, 255);
    background: #111;
    cursor: pointer;
    position: relative;
    z-index: 0;
    border-radius: 10px;
}
  
.bn5:before {
    content: "";
    background: linear-gradient(
      45deg,
      #ff0000,
      #ff7300,
      #fffb00,
      #48ff00,
      #00ffd5,
      #002bff,
      #7a00ff,
      #ff00c8,
      #ff0000
    );
    position: absolute;
    top: -2px;
    left: -2px;
    background-size: 400%;
    z-index: -1;
    filter: blur(5px);
    width: calc(100% + 4px);
    height: calc(100% + 4px);
    animation: glowingbn5 20s linear infinite;
    opacity: 0;
    transition: opacity 0.3s ease-in-out;
    border-radius: 10px;
}
  
@keyframes glowingbn5 {
    0% {
      background-position: 0 0;
    }
    50% {
      background-position: 400% 0;
    }
    100% {
      background-position: 0 0;
    }
}
  
.bn5:active {
    color: #000;
}
  
.bn5:active:after {
    background: transparent;
}
  
.bn5:hover:before {
    opacity: 1;
}
  
.bn5:after {
    z-index: -1;
    content: "";
    position: absolute;
    width: 100%;
    height: 100%;
    background: #191919;
    left: 0;
    top: 0;
    border-radius: 10px;
}
    </style>
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