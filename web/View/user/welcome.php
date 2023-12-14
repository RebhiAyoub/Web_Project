<!doctype html>
<html class="no-js" lang="en">

<head>
    <!-- meta data -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags must come first in the head; any other head content must come after these tags -->

    <!--font-family-->
    <link
        href="https://fonts.googleapis.com/css?family=Poppins:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <link href="https://fonts.googleapis.com/css?family=Rufina:400,700" rel="stylesheet">

    <!-- title of site -->
    <title>Women's Health Compass</title>

    <!-- For favicon png -->
    <link rel="shortcut icon" type="image/icon" href="../user/favicon.png" />

    <!--font-awesome.min.css-->
    <link rel="stylesheet" href="../user/assets/css/font-awesome.min.css">

    <!--linear icon css-->
    <link rel="stylesheet" href="../user/assets/css/linearicons.css">

    <!--flaticon.css-->
    <link rel="stylesheet" href="../user/assets/css/flaticon.css">

    <!--animate.css-->
    <link rel="stylesheet" href="../user/assets/css/animate.css">

    <!--owl.carousel.css-->
    <link rel="stylesheet" href="../user/assets/css/owl.carousel.min.css">
    <link rel="stylesheet" href="../user/assets/css/owl.theme.default.min.css">

    <!--bootstrap.min.css-->
    <link rel="stylesheet" href="../user/assets/css/bootstrap.min.css">

    <!-- bootsnav -->
    <link rel="stylesheet" href="../user/assets/css/bootsnav.css">

    <!--style.css-->
    <link rel="stylesheet" href="assets/css/style.css">

    <!--responsive.css-->
    <link rel="stylesheet" href="../user/assets/css/responsive.css">
    

    
    <style>
        .abdou {
    background: url(bgg_2.jpeg) !important;
    background-size: cover !important; /* This will cover the entire container */
    background-position: center !important; /* This will center the background image */
    background-repeat: no-repeat !important;
}

        .button:hover,
        .button:focus {
            color: whitesmoke !important;
            text-shadow: none;
        }

        .button {
            font-size: 2em;

            display: inline-block;
            cursor: pointer;
            text-decoration: none;
            color: var(--clr-neon);
            border: var(--clr-neon) 4px solid;
            padding: 0.25em 1em;
            border-radius: 0.25em;

            text-shadow: 0 0 0.125em rgba(255, 255, 255, 0.55), 0 0 0.5em currentColor;

            box-shadow: inset 0 0 0.5em 0 var(--clr-neon), 0 0 0.5em 0 var(--clr-neon);

            position: relative;
        }

        .button::before {
            pointer-events: none;
            content: "";
            position: absolute;
            background: var(--clr-neon);
            top: 120%;
            left: 0;
            width: 100%;
            height: 100%;

            transform: perspective(1.2em) rotateX(40deg) scale(1.5, 0.5);
            filter: blur(1.15em);
            opacity: 0.7;

            transition: transform 0.5s linear;
        }

        .button::after {
            content: "";
            position: absolute;
            top: 0;
            bottom: 0;
            left: 0;
            right: 0;
            box-shadow: 0 0 4em 0.6em var(--clr-neon), 0 0 1em 0.2em var(--clr-white);
            opacity: 0;
            background: var(--clr-neon);
            z-index: -1;
            transition: opacity 0.5s linear;
        }

        .button:hover,
        .button:focus {
            color: var(--clr-bg);
            text-shadow: none;
        }

        .button:hover::before,
        .button:focus::before {
            opacity: 1;
            transform: perspective(1em) rotateX(40deg) scale(1.5, 0.6);
            transition: transform 0.5s linear;
        }

        .button:hover::after,
        .button:focus::after {
            opacity: 1;
        }

        .logo {
            display: inline-block;
            vertical-align: middle;
        }

        .logo img {
            width: 200px;
            /* Set the width of your logo image */
            height: auto;
            /* Maintain aspect ratio */
        }

        .site-title {
            display: inline-block;
            vertical-align: middle;
            font-size: 100px;
            /* Adjust the text size of the site title */
            margin-left: 20px;
            /* Adjust the distance between the logo and text */
        }
        .box{
            margin-left:20px !important;
            padding-top:40px !important;
            width:500px !important;
			font-family: url('blinkwomen/Blinkwomen.ttf');
			font-size: 80px !important;
			letter-spacing: 2px;
			background: linear-gradient(90deg, #800080, #DDA0DD, white);
			background-repeat: no-repeat;
			background-size: 80%;
			animation: animate 6s;
			-webkit-background-clip: text;
			-webkit-text-fill-color: rgba(255, 255, 255, 0);

            

        }
        .box2{
            width:500px !important;
			font-family: url('blinkwomen/Blinkwomen.ttf');
			font-size: 80px !important;
			letter-spacing: 2px;
			background: linear-gradient(90deg, #800080, #DDA0DD, white);
			background-repeat: no-repeat;
			background-size: 80%;
			animation: animate 6s;
			-webkit-background-clip: text;
			-webkit-text-fill-color: rgba(255, 255, 255, 0);

            

        }
       
    </style>

</head>

<body>



    
    <!--welcome-hero start -->
    <section id="home" class="abdou">
        <div class="logo">
            <img src="../user/assets/logo/favicon.png" alt="Logo">
        </div>
        <div class="box">
                <?php
                $servername = "localhost";
                $username = "root";
                $password = "";
                $dbname = "WWC";
                
                //create connection
                $conn = new mysqli($servername, $username, $password, $dbname);
    
                // Check connection
                if ($conn->connect_error) {
                    die("Connection failed: " . $conn->connect_error);
                }
    
                // Query to get the total number of users
                $sql = "SELECT COUNT(*) AS totalUsers FROM user_admin";
                $result = $conn->query($sql);
    
                if ($result->num_rows > 0) {
                    $row = $result->fetch_assoc();
                    echo "<div style='text-align: center;'>";
                    echo "<img src='prof.png' alt='Prof Image' style='width: 50px; height: 50px; margin-right: 10px;'>";
                    echo "<p style='font-size: 50px !important; display: inline;'>" . $row["totalUsers"] . " User </p>";
                    echo "</div>";
                } else {
                    echo "No users found.";
                }
    
                // Close connection
                $conn->close();
                ?>            
            </div>
        <div class="box2">
                <?php
                $servername = "localhost";
                $username = "root";
                $password = "";
                $dbname = "WWC";
                
                //create connection
                $conn = new mysqli($servername, $username, $password, $dbname);
    
                // Check connection
                if ($conn->connect_error) {
                    die("Connection failed: " . $conn->connect_error);
                }
    
                // Query to get the total number of users
                $sql = "SELECT COUNT(*) AS totalLikes FROM feedbackk";
                $result = $conn->query($sql);
                $sql1 = "SELECT COUNT(*) AS totalFeedbacks FROM feedback";
                $result1 = $conn->query($sql1);
    
                if ($result->num_rows > 0) {
                    $row = $result->fetch_assoc();
                    $row1 = $result1->fetch_assoc();
                    echo "<div style='text-align: center;'>";
                    echo "<img src='like.png' alt='Prof Image' style='width: 70px; height: 70px; '>";
                    echo "<p style='font-size: 50px !important; display: inline;'>" . $row["totalLikes"] . " Like </p><br>";
                    echo "<img src='feed.png' alt='Prof Image' style='width: 50px; height: 50px;margin-left:45px !important;margin-right:10px; '>";
                    echo "<p style='font-size: 50px !important; display: inline;'>" . $row1["totalFeedbacks"] . " Feed </p>";
                    echo "</div>";                } else {
                    echo "No users found.";
                }
    
                // Close connection
                $conn->close();
                ?>            
            </div>
        <div class="box2">
                <?php
                $servername = "localhost";
                $username = "root";
                $password = "";
                $dbname = "WWC";
                
                //create connection
                $conn = new mysqli($servername, $username, $password, $dbname);
    
                // Check connection
                if ($conn->connect_error) {
                    die("Connection failed: " . $conn->connect_error);
                }
    
                // Query to get the total number of users
                
    
                // Close connection
                $conn->close();
                ?>            
            </div>

        <div style="padding-bottom: 20px !important; padding-top:70px !important;" class="welcome-hero-txt">
            <button class="button" onclick="window.location.href='log_in2.php'">
                <div class="inner"></div>
                <span>Log In</span>
            </button>
            
            <a style="padding-left: 30px; padding-right: 30px;"> </a>
            
            <button class="button" onclick="window.location.href='sign_up.php'">
                <div class="inner"></div>
                <span>Sign Up</span>
            </button>
        </div>
    </section>
    



    </section><!--/.welcome-hero-->
    <!--welcome-hero end -->



    <!-- Include all js compiled plugins (below), or include individual files as needed -->

    <script src="../user/assets/js/jquery.js"></script>

    <!--modernizr.min.js-->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/modernizr/2.8.3/modernizr.min.js"></script>

    <!--bootstrap.min.js-->
    <script src="../user/assets/js/bootstrap.min.js"></script>

    <!-- bootsnav js -->
    <script src="../user/assets/js/bootsnav.js"></script>

    <!--owl.carousel.js-->
    <script src="../user/assets/js/owl.carousel.min.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.4.1/jquery.easing.min.js"></script>

    <!--Custom JS-->
    <script src="../user/assets/js/custom.js"></script>

</body>

</html>