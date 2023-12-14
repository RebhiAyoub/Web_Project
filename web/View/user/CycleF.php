<!doctype html>
<html class="no-js" lang="en">

<head>
    <link rel="stylesheet" href="assets/css/sexual.css">

    <!-- meta data -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->

    <!--font-family-->
    <link
        href="https://fonts.googleapis.com/css?family=Poppins:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <link href="https://fonts.googleapis.com/css?family=Rufina:400,700" rel="stylesheet">

    <!-- title of site -->
    <title>Women's Health Compass</title>

    <!-- For favicon png -->
    <link rel="shortcut icon" type="image/icon" href="assets/logo/favicon.png" />

    <!--font-awesome.min.css-->
    <link rel="stylesheet" href="assets/css/font-awesome.min.css">

    <!--linear icon css-->
    <link rel="stylesheet" href="assets/css/linearicons.css">

    <!--flaticon.css-->
    <link rel="stylesheet" href="assets/css/flaticon.css">

    <!--animate.css-->
    <link rel="stylesheet" href="assets/css/animate.css">

    <!--owl.carousel.css-->
    <link rel="stylesheet" href="assets/css/owl.carousel.min.css">
    <link rel="stylesheet" href="assets/css/owl.theme.default.min.css">

    <!--bootstrap.min.css-->
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">

    <!-- bootsnav -->
    <link rel="stylesheet" href="assets/css/bootsnav.css">

    <!--style.css-->
    <link rel="stylesheet" href="assets/css/style.css">

    <!--responsive.css-->
    <link rel="stylesheet" href="assets/css/responsive.css">

    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>


    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->

    <!--[if lt IE 9]>
            <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
            <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->
    <style>
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
    </style>
    <style>
        .featured-cars {
            background-color: #f5f5f53e;


            padding: 40px 0;
        }

        .container {
        

            margin: 0 auto;
        }

        .menstrual-cycle-form {
            background-color: #ffffff9a;


            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            margin-top: 20px;
        }

        .form-group {
            margin-bottom: 15px;
        }

        label {
            display: block;
            margin-bottom: 5px;
        }

        input {
            width: 100%;
            padding: 8px;
            box-sizing: border-box;
            border: 1px solid #ccc;
            border-radius: 4px;
        }

        button {
            background-color: #4caf50;
            color: #fff;
            padding: 10px 15px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        button:hover {
            background-color: #45a049;
        }

        .result-container {
            margin-top: 20px;
            font-size: 16px;
        }
    </style>

</head>

<body>










    <!--featured-cars start -->
    <section id="featured-cars" class="featured-cars">
        <div class="container">
            <div class="section-header">
                <!-- Your existing code for the "featured-cars" section -->
            </div>

            <!-- Menstrual Cycle Length Calculator Form -->
            <div class="menstrual-cycle-form">
                <h2 style="color: fuchsia;"><b>Woman's Cycle Length Calculator</b></h2>
                <form id="cycle-form" method="post" action="#featured-cars">
                    <!--  the form data will be submitted to a PHP script named "cyclefinder.php" for processing. -->
                    <div class="form-group">
                        <label for="idUser">User ID:</label>
                        <input type="text" name="idUser" required>
                    </div>

                    <div class="form-group">
                        <label for="currentPeriodDate">Current Period Date:</label>
                        <input type="date" name="currentPeriodDate" id="currentPeriodDate"
                            oninput="compareDates()" required>
                    </div>

                    <div class="form-group">
                        <label for="previousPeriodDate">Previous Period Date:</label>
                        <input type="date" name="previousPeriodDate" id="previousPeriodDate"
                            oninput="compareDates()" required>
                    </div>



                    <button type="submit" id="calculatePeriod" name="calculate"
                        onclick="compareDates();calculateCycleLength();"
                        style="background-color: fuchsia; color: white;" disabled>Calculate</button>

                </form>

                <hr>

                <!-- Result Display -->
                <div id="result-display" class="result-display">
                    <?php


                    include '/Applications/XAMPP/xamppfiles/htdocs/carvilla-v1.0/Controller/ovulation/CycleC.php';


                    $cycleController = new CycleC(); //same name as controller file 
                    $cycleList = $cycleController->listcycles(); //o as u like
                    

                    if (isset($_POST['calculate'])) {
                        // Retrieve the form data
                        $cycleStart = new DateTime($_POST['previousPeriodDate']);
                        $cycleEnd = new DateTime($_POST['currentPeriodDate']);
                        $currentPeriodDate = $_POST['currentPeriodDate'];
                        $previousPeriodDate = $_POST['previousPeriodDate'];
                        $idUser = $_POST['idUser'];

                        // Perform any database interactions here
                        $servername = "localhost";
                        $username = "root";
                        $password = "";
                        $dbname = "WWC";

                        try {
                            $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
                            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

                            // Calculate the menstrual cycle length
                            $cycleLength = $cycleStart->diff($cycleEnd)->days;

                            // Use prepared statement to prevent SQL injection
                            $query = "INSERT INTO user1 (currentPeriodDate, previousPeriodDate, menstrualCycleLength) VALUES (:currentPeriodDate, :previousPeriodDate, :cycleLength)";
                            $stmt = $conn->prepare($query);

                            $stmt->bindParam(':currentPeriodDate', $currentPeriodDate);
                            $stmt->bindParam(':previousPeriodDate', $previousPeriodDate);
                            $stmt->bindParam(':cycleLength', $cycleLength);
                            $stmt->execute();

                            // Prepare the response
                            $response = '<b> Your average cycle length is: ' . $cycleLength . ' days.</b>';

                            // Send the response back to the client
                            echo $response;

                        } catch (PDOException $e) {
                            echo "Error: " . $e->getMessage();
                        } finally {
                            // Close the connection
                            $conn = null;
                        }

                    }
                    ?>
                </div>
            </div>
        </div>

        <script>
            function calculateCycleLength() {
                var resultContainer = document.getElementById('result-display');
                // Get form data
                //FORMDATA it took values from the form variables
                var formData = $('#cycle-form').serialize();

                // Perform AJAX:no reload needed post and sends data to the html page created request
                $.post('./cyclefinder.php', formData, function (response) {

                    // Update result-container with the response
                    $('result-display').html(index);
                });
            }
            function compareDates() {
                // Get the input values from HTML form elements
                var date1 = new Date(document.getElementById('currentPeriodDate').value);
                var date2 = new Date(document.getElementById('previousPeriodDate').value);
                var submitButton = document.getElementById('calculatePeriod');


                // Compare the dates
                if (date1 > date2) {
                    date1.disabled = false;
                    date2.disabled = false;
                    submitButton.disabled = false;
                } else if (date1 < date2) {
                    alert('currentPeriodDate must be later than previousPeriodDate !');
                    submitButton.disabled = true;
                    date1.disabled = true;
                    date2.disabled = true;
                } else {
                    submitButton.disabled = true;
                }

                return (date1 > date2)
            }

        </script>
    </section>
    <!--featured-cars end -->


    <!--featured-cars start -->
    <section id="new-cars" class="featured-cars">
        <div class="container">
            <div class="section-header">
                <!-- Your existing code for the "featured-cars" section -->
            </div>

            <!-- Menstrual Cycle Length Calculator Form -->
            <div class="menstrual-cycle-form">
                <h2 style="color: fuchsia;"><b>Woman's ovulation day calculator</b></h2>
                <form id="ovulation-form" method="post" action="#new-cars" onsubmit="calculateOvulationDay(event)">
                    <!--  the form data will be submitted to a PHP script named "cyclefinder.php" for processing. -->
                    <div class="form-group">
                        <label for="idUser">User ID:</label>
                        <input class="form-control" type="number" name="idUser" required>
                    </div>

                    <div class="form-group">
                        <label for="firstDayOfLMP">First Day of the previous period:</label>
                        <input class="form-control" type="date" name="firstDayOfLMP" id="firstDayOfLMP"
                            required>
                    </div>

                    <div class="form-group">
                        <label for="averageCycleLength">Average Cycle Length</label>
                        <select class="form-control" name="averageCycleLength" class="col-sm-6">
                            <?php
                            foreach ($cycleList as $cycl) {
                                ?>
                                <option class="col-sm-6" value="<?php echo $cycl['menstrualCycleLength'] ?>">
                                    <?php echo $cycl['menstrualCycleLength'] ?> -- UserID:
                                    <?php echo $cycl['idUser'] ?>
                                </option>
                            <?php } ?>
                        </select>

                    </div>



                    <button type="submit" id="calculateovulation"
                        style="background-color: fuchsia; color: white;"> Calculate</button>
                </form>

                <!-- Result Display -->
                <div id="result-container-ov" class="result-container">
                    <?php
                    include '/Applications/XAMPP/xamppfiles/htdocs/carvilla-v1.0/Controller/ovulation/OvulationC.php';
                    include '/Applications/XAMPP/xamppfiles/htdocs/carvilla-v1.0/Model/ovulation.php';



                    // create an instance of the controller
                    $ovulationC = new OvulationC();
                    if (
                        isset($_POST["firstDayOfLMP"]) &&
                        isset($_POST["averageCycleLength"])

                    ) {
                        if (
                            !empty($_POST['firstDayOfLMP']) &&
                            !empty($_POST["averageCycleLength"])

                        ) {
                            $firstDayOfLMP = $_POST['firstDayOfLMP'];
                            $averageCycleLength = $_POST['averageCycleLength'];

                            // Convert the LMP to a DateTime object
                            $lmpDate = new DateTime($firstDayOfLMP);

                            // Calculate the estimated ovulation date
                            $ovulationDate = clone $lmpDate;
                            $ovulationDate->modify("+" . ($averageCycleLength - 14) . " days");

                            // Format and return the result
                            $response = "<p><b>Your ovulation date is: " . $ovulationDate->format('Y-m-d') . "</b></p>";

                            // Send the response back to the client
                            echo $response;


                            $ovulation = null;
                            $ovulation = new Ovulation(
                                null,
                                $_POST['firstDayOfLMP'],
                                $_POST['averageCycleLength'],
                                $ovulationDate->format('Y-m-d')

                            );
                            $ovulationC->create($ovulation);

                        } else {
                            $error = "Missing information";
                        }
                    }




                    ?>

                </div>
            </div>
        </div>

        <script>
            function checkCycleLength() {
                // Get the input element and submit button
                var averageCycleLengthInput = document.getElementById('averageCycleLength');
                var submitButton = document.getElementById('calculateovulation');


                // Get the entered cycle length value
                var cycleLength = parseInt(averageCycleLengthInput.value);

                // Check if the cycle length is within the desired range (23 to 35)
                if (cycleLength >= 23 && cycleLength <= 35) {
                    // Enable the button
                    submitButton.disabled = false;
                } else {
                    // Show an alert and disable the button
                    alert('Please enter a cycle length between 23 and 35.');
                    averageCycleLengthInput.value = ''; // Reset the input field
                    submitButton.disabled = true;
                }
            }



            function calculateOvulationDay(event) {
        // Prevent the default form submission
        event.preventDefault();

        // Check cycle length before proceeding
        if (!checkCycleLength()) {
            return;
        }

        // Get form data
        var formData = $('#ovulation-form').serialize();

        // Perform AJAX: no reload needed, post, and send data to the HTML page created request
        $.post('./ovulationTracker.php', formData, function (response) {
            // Update result-container with the response
            $('#result-container-ov').html(response);
        });
    }
        </script>
        <div class="container">
            <div class="section-header">
                <!-- Your existing code for the "featured-cars" section -->
            </div>

            <!-- Menstrual Cycle Length Calculator Form -->
            <div class="menstrual-cycle-form">
                <h2 style="color: fuchsia;"><b>Did You Like Our Content ?</b></h2>


                <form method="POST" id="likeDislikeForm" action="#contact">
                    <div class="form-group">

                        <div class="like-dislike-container">
                            <label class="like-dislike-option">
                                <input type="radio" name="likeDislike" value="like">
                                <i class="fa fa-thumbs-o-up" aria-hidden="true"></i> Like
                            </label>
                            <label class="like-dislike-option">
                                <input type="radio" name="likeDislike" value="dislike">
                                <i class="fa fa-thumbs-o-down" aria-hidden="true"></i> Dislike
                            </label>
                        </div>
                    </div>
                    <button type="submit" id="submitLikeDislike"
                        style="background-color: fuchsia; color: white;">Submit</button>

                </form>

            </div>

            <div id="result-container-feed" class="result-container">
                <?php
                // Include necessary files and configurations
                if (
                    isset($_POST["likeDislike"])

                ) {
                    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['likeDislike'])) {
                        $feed = $_POST['likeDislike'];

                        // Database connection details
                        $servername = "localhost";
                        $username = "root";
                        $password = "";
                        $dbname = "WWC";

                        try {
                            $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
                            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

                            // Assuming you have a table named 'user_feedback'
                            $query = "INSERT INTO feedbackk (idUser, feed) VALUES (NULL,:feed)";
                            $stmt = $conn->prepare($query);
                            $stmt->bindParam(':feed', $feed);
                            $stmt->execute();

                            // You can customize the response as needed
                            echo "<b>Review saved successfully! Thank you.</b>";
                        } catch (PDOException $e) {
                            echo "Error: " . $e->getMessage();
                        } finally {
                            $conn = null;
                        }
                    } else {
                        // Handle invalid requests
                        echo "Invalid request";
                    }

                }

                ?>
            </div>
        </div>
            </div>



    </section>


    <section id="contact" class="featured-cars">
        


    </section>






















    

    </footer><!--/.contact-->
    <!--contact end-->



    <!-- Include all js compiled plugins (below), or include individual files as needed -->

    <script src="assets/js/jquery.js"></script>

    <!--modernizr.min.js-->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/modernizr/2.8.3/modernizr.min.js"></script>

    <!--bootstrap.min.js-->
    <script src="assets/js/bootstrap.min.js"></script>

    <!-- bootsnav js -->
    <script src="assets/js/bootsnav.js"></script>

    <!--owl.carousel.js-->
    <script src="assets/js/owl.carousel.min.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.4.1/jquery.easing.min.js"></script>

    <!--Custom JS-->
    <script src="assets/js/custom.js"></script>

</body>


</html>