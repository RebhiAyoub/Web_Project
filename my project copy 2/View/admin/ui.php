<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>WWC Admin</title>
    <!-- BOOTSTRAP STYLES-->
    <link href="assets/css/bootstrap.css" rel="stylesheet" />
    <!-- FONTAWESOME STYLES-->
    <link href="assets/css/font-awesome.css" rel="stylesheet" />
    <!-- CUSTOM STYLES-->
    <link href="assets/css/custom.css" rel="stylesheet" />
    <!-- GOOGLE FONTS-->
    <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />

    <!-- For favicon png -->
    <link rel="shortcut icon" type="image/icon" href="favicon.png" />
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>

    <!-- Notification Library  -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">



    <style>
        .notify-link {
            color: #3498db;
            /* Blue color for Notify User link */
            font-weight: bold;
            margin-right: 10px;
            /* Adjust the spacing as needed */
        }

        .archive-link {
            color: #e74c3c;
            /* Red color for Archive User link */
            font-weight: bold;
            margin-right: 10px;
            /* Adjust the spacing as needed */
        }
        
    </style>



</head>


<body>
    <div id="wrapper">
        <nav class="navbar navbar-default navbar-cls-top " role="navigation" style="margin-bottom: 0">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".sidebar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="fa fa-bar"></span>
                    <span class="fa fa-bar"></span>
                    <span class="fa fa-bar"></span>
                </button>
                <a class="navbar-brand gradient-text" href="ui.html">Admin Access</a>
            </div>
            <div id="lastAccess" style="color: white; padding: 15px 50px 5px 50px; float: right; font-size: 16px;">
    Last access: <span id="realTimeLastAccess">Loading...</span>
    <a href="../../View/user/welcome.html"
                    class="btn btn-danger square-btn-adjust">Logout</a> </div>


        
        </nav>
        <!-- /. NAV TOP  -->
        <nav class="navbar-default navbar-side" role="navigation">
            <div class="sidebar-collapse">
                <ul class="nav" id="main-menu">
                    <li class="text-center">
                        <img src="favicon.png" class="user-image img-responsive" />
                    </li>

                    <li>
                        <a href="index.html"><i class="fa fa-dashboard fa-3x"></i> Dashboard</a>
                    </li>
                    <li>
                        <a href="#"><i class="fa fa-sitemap fa-3x"></i> Pregnancy Tracker<span
                                class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">
                            <li>
                                <a href="#deliveryDate">Delivery Dates</a>
                            </li>
                            <li>
                                <a href="#trimester">Trimesters</a>
                            </li>
                        </ul>
                </ul>
            </div>
        </nav>
        <!-- /. NAV SIDE  -->
        <div id="page-wrapper">
            <div id="page-inner">
                <div class="row">
                    <div class="col-md-12">
                        <h2>Pregnancy Tracker</h2>
                        <h5>Welcome Admin , Love to see you back. </h5>
                        <!-- Add a trigger for translation -->
                        <div id="google_translate_element"></div>
                    </div>
                    
                </div>
                <!-- /. ROW  -->
                <hr />
                <!-- List Delivery Date -->
                <?php
                include_once '../../config.php';

                // Number of records per page
                $recordsPerPage = 6;

                // Get the current page number from the URL
                $page = isset($_GET['page']) ? intval($_GET['page']) : 1;

                // Calculate the offset for the SQL query
                $offset = ($page - 1) * $recordsPerPage;

                // Query to retrieve records for the current page
                $sql = "SELECT * FROM user ORDER BY idUser ASC LIMIT $recordsPerPage OFFSET $offset";
                $result = $conn->query($sql);

                if (!$result) {
                    die("Invalid query: " . $conn->connect_error);
                }
                ?>

                <!-- List Delivery Date -->
                <div class="container my-5" id="deliveryDate">
                    <h2>List of Delivery Dates</h2>
                    <br>
                    <a class="btn btn-primary" href="/carvilla-v1.0/Controller/CrudDeliveryDate/ui1.php"
                        role="button">New Delivery Date</a>
                    <br>
                    <br>
                    <table class="table">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>First Day Last Period</th>
                                <th>Cycle Length</th>
                                <th>Delivery Date</th>
                                <th>Trimester</th>
                                <th>View</th>
                                <th>Delete</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            // Loop through the records for the current page
                            while ($row = $result->fetch_assoc()) {
                                echo "
                <tr>
                    <td>$row[idUser]</td>
                    <td>$row[period]</td>
                    <td>$row[length]</td>
                    <td>$row[deliveryDate]</td>
                    <td>$row[trimesterr]</td>
                    <td>
                        <a class='btn btn-primary btn-sm' href='/carvilla-v1.0/Controller/CrudDeliveryDate/ui2.php?idUser=$row[idUser]'>Edit</a>
                    </td>
                    <td>
                        <a class='btn btn-danger btn-sm' href='/carvilla-v1.0/Controller/CrudDeliveryDate/ui3.php?idUser=$row[idUser]'>Delete</a>
                    </td>
                </tr>
                ";
                            }
                            ?>
                        </tbody>
                    </table>

                    <!-- Pagination links -->
                    <ul class="pagination">
                        <?php
                        // Calculate the total number of pages
                        $totalPages = ceil($result->num_rows / $recordsPerPage);

                        // Display pagination links
                        echo "<li class='page-item " . ($page == 1 ? 'active' : '') . "'><a class='page-link' href='?page=1'>1</a></li>";
                        echo "<li class='page-item " . ($page == 2 ? 'active' : '') . "'><a class='page-link' href='?page=2'>2</a></li>";

                        ?>
                    </ul>
                </div>

                <!-- List Trimesters -->
                <div class="container my-5" id="trimester">
                    <h2>List of Trimesters</h2>
                    <br>
                    <a class="btn btn-primary" href="/carvilla-v1.0/Controller/CrudTrimester/ui1.php" role="button">New
                        Trimester</a>
                    <br>
                    <br>
                    <table class="table">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>First Day Last Period</th>
                                <th>Cycle Length</th>
                                <th>Trimester</th>
                                <th>View</th>
                                <th>Delete</th>
                                <th>Join Delivery Date</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            error_reporting(E_ALL);
                            ini_set('display_errors', 1);

                            include_once '../../config.php';

                            // Number of records per page
                            $recordsPerPage = 6;

                            // Get the current page number from the URL
                            $page = isset($_GET['page']) ? intval($_GET['page']) : 1;

                            // Calculate the offset for the SQL query
                            $offset = ($page - 1) * $recordsPerPage;

                            // Query to retrieve records for the current page
                            $sql = "SELECT * FROM userTr ORDER BY idUser ASC LIMIT $recordsPerPage OFFSET $offset";
                            $result = $conn->query($sql);

                            if (!$result) {
                                die("Invalid query: " . $conn->connect_error);
                            }

                            // read data of each row
                            while ($row = $result->fetch_assoc()) {
                                echo "
              <tr>
                  <td>$row[idUser]</td>
                  <td>$row[period]</td>
                  <td>$row[length]</td>
                  <td>$row[Trimester]</td>
                  <td>
                      <a class='btn btn-primary btn-sm' href='/carvilla-v1.0/Controller/CrudTrimester/ui2.php?idUser=$row[idUser]'>Edit</a>
                  </td>
                  <td>
                      <a class='btn btn-danger btn-sm' href='/carvilla-v1.0/Controller/CrudTrimester/ui3.php?idUser=$row[idUser]'>Delete</a>
                  </td>
                  <td>
                      <a class='btn btn-success btn-sm' href='/carvilla-v1.0/Controller/CrudTrimester/ui4.php?idUser=$row[idUser]'>Join Delivery Date</a>
                  </td>
              </tr>
              ";
                            }
                            ?>
                        </tbody>
                    </table>

                    <!-- Pagination links -->
                    <ul class="pagination">
                        <?php
                        // Calculate the total number of pages
                        $totalPages = ceil($result->num_rows / $recordsPerPage);

                        // Display pagination links
                        echo '<li class="page-item ' . ($page == 1 ? 'active' : '') . '"><a class="page-link" href="?page=' . 1 . '">' . 1 . '</a></li>';
                        echo '<li class="page-item ' . ($page == 2 ? 'active' : '') . '"><a class="page-link" href="?page=' . 2 . '">' . 2 . '</a></li>';

                        ?>
                    </ul>
                </div>

                <!-- Special Insights -->
                <div class="container my-5">
                    <h2 class="mb-4">Insights</h2>
                    <div class="row">
                        <div class="col-md-6">
                            <?php
                            error_reporting(E_ALL);
                            ini_set('display_errors', 1);

                            include_once '../../config.php';

                            // Check connection
                            if ($conn->connect_error) {
                                die("Connection failed: " . $conn->connect_error);
                            }

                            // Read all rows from the trimester table
                            $sqlTrimester = "SELECT * FROM userTr ORDER BY idUser ASC";
                            $resultTrimester = $conn->query($sqlTrimester);

                            if (!$resultTrimester) {
                                die("Invalid query: " . $conn->error);
                            }

                            // Array to store the count of users in each trimester
                            $usersByTrimester = array('First' => 0, 'Second' => 0, 'Third' => 0);

                            // Read data of each row from the trimester table
                            while ($row = $resultTrimester->fetch_assoc()) {
                                // Assuming you have a column named 'Trimester' in the 'userTr' table
                                $trimester = $row['Trimester'];

                                // Increment the count for the corresponding trimester
                                if (array_key_exists($trimester, $usersByTrimester)) {
                                    $usersByTrimester[$trimester]++;
                                }
                            }

                            // Display the number of users in each trimester
                            echo "<h4>Number of Users in Each Trimester:</h4>";
                            echo "<ul class='list-group'>";
                            foreach ($usersByTrimester as $trimester => $count) {
                                echo "<li class='list-group-item'>$trimester Trimester: $count users</li>";
                            }
                            echo "</ul>";
                            ?>
                        </div>

                        <div class="col-md-6">
                            <?php
                            // Fetch and display a timeline of delivery dates with deliveryDateId
                            $sqlDeliveryDates = "SELECT idUser, deliveryDate FROM user
                            ORDER BY deliveryDate ASC";

                            $resultDeliveryDates = $conn->query($sqlDeliveryDates);

                            if ($resultDeliveryDates->num_rows > 0) {
                                echo "<h4 class='mb-4'>Timeline of Delivery Dates (Next Month):</h4>";
                                echo "<ul class='list-group'>";

                                while ($deliveryRow = $resultDeliveryDates->fetch_assoc()) {
                                    $idUser = $deliveryRow['idUser'];
                                    $deliveryDate = $deliveryRow['deliveryDate'];

                                    // Calculate time left
                                    $now = new DateTime();
                                    $deliveryDateTime = new DateTime($deliveryDate);
                                    $interval = $now->diff($deliveryDateTime);
                                    $timeLeft = $interval->format('%a days');

                                    // Check if time left is 0 (delivery day) and add a comment and notification link
                                    if ($interval->days < 30) {
                                        if ($interval->days === 0) {
                                            echo "<li class='list-group-item'>
                                        ID User: $idUser, Delivery Date: $deliveryDate, Time Left: $timeLeft
                                        <br>
                                        <span class='text-success'>The baby has been born!
                                        <a class='notify-link' href='javascript:void(0)' id='notifyLink_$idUser' onclick='sendNotificationToUser($idUser)'>Notify User</a>
                                        </span>
                                        <span class='text-info'>
                                        <a class='archive-link' href='javascript:void(0)' id='archiveLink_$idUser' onclick='archiveUser($idUser)'>Archive User</a>
                                        </span>
                                        </li>";
                                        } elseif ($interval->days < 7) {
                                            echo "<li class='list-group-item'>
                                        ID User: $idUser, Delivery Date: $deliveryDate, Time Left: $timeLeft
                                        <br>
                                        <span class='text-danger'>Delivery soon!
                                        <a class='notify-link' href='javascript:void(0)' id='notifyLink_$idUser' onclick='sendNotificationToUser($idUser)'>Notify User</a>
                                        </span>
                                        </li>";
                                        } else {
                                            echo "<li class='list-group-item'>
                                        ID User: $idUser, Delivery Date: $deliveryDate, Time Left: $timeLeft
                                        </li>";
                                        }
                                    }
                                }

                                echo "</ul>";
                            } else {
                                echo "<p>No delivery dates found.</p>";
                            }
                            ?>
                            <script>
                                function sendNotificationToUser(userId) {
                                    // Check if the link has already been clicked
                                    var linkElement = document.getElementById('notifyLink_' + userId);
                                    if (linkElement.innerText === 'User Notified') {
                                        // The user has already been notified, do nothing
                                        return;
                                    }

                                    // Display a toastr notification
                                    toastr.success('Notification sent to user with ID: ' + userId);

                                    // Change the link text to 'User Notified'
                                    linkElement.innerText = 'User Notified';

                                    // Disable the link
                                    linkElement.style.pointerEvents = 'none';
                                    linkElement.style.color = 'gray';
                                }
                                function archiveUser(userId) {
                                    // Confirm with the user before archiving
                                    if (confirm("Are you sure you want to archive this user?")) {
                                        // Create a new XMLHttpRequest object
                                        var xhr = new XMLHttpRequest();

                                        // Set up a callback function to handle the AJAX response
                                        xhr.onreadystatechange = function () {
                                            if (xhr.readyState == 4 && xhr.status == 200) {
                                                // Display the server's response using toastr
                                                toastr.success(xhr.responseText);

                                                // Optionally, you can update the UI or take other actions
                                                // ...

                                            } else if (xhr.readyState == 4 && xhr.status != 200) {
                                                // Display an error message if the request fails
                                                toastr.error('Failed to archive user.');
                                            }
                                        };

                                        // Open a POST request to the server-side script that handles archiving
                                        xhr.open("POST", "/carvilla-v1.0/Controller/CrudDeliveryDate/archive_user.php", true);

                                        // Set the Content-Type header for POST requests
                                        xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");

                                        // Send the user ID as data
                                        xhr.send("userId=" + userId);
                                    }
                                }


                            </script>

                        </div>

                    </div>
                </div>




            </div>
        </div>
    </div>
    <!-- Add the Google Translate API script -->
    <script src="https://translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>
    <script>
        function googleTranslateElementInit() {
            new google.translate.TranslateElement(
                { pageLanguage: 'en', autoDisplay: false },
                'google_translate_element'
            );
        }
    </script>
    <!-- Add this script inside the <head> tag, after including jQuery -->
<script>
    $(document).ready(function () {
        // Function to format the date in the "dd Month yyyy" format
        function formatDate(date) {
            const options = { day: 'numeric', month: 'long', year: 'numeric' };
            return new Date(date).toLocaleDateString('en-US', options);
        }

        // Function to update real-time last access
        function updateLastAccess() {
            // Get the current date and time
            const currentDate = new Date();

            // Format the date
            const formattedDate = formatDate(currentDate);

            // Update the content of the real-time last access span
            $("#realTimeLastAccess").text(formattedDate);
        }

        // Update last access on page load
        updateLastAccess();

        // Update last access every minute (adjust the interval as needed)
        setInterval(updateLastAccess, 60000);
    });
</script>

    <!-- SCRIPTS -AT THE BOTOM TO REDUCE THE LOAD TIME-->
    <!-- JQUERY SCRIPTS -->
    <script src="assets/js/jquery-1.10.2.js"></script>
    <!-- BOOTSTRAP SCRIPTS -->
    <script src="assets/js/bootstrap.min.js"></script>
    <!-- METISMENU SCRIPTS -->
    <script src="assets/js/jquery.metisMenu.js"></script>
    <!-- CUSTOM SCRIPTS -->
    <script src="assets/js/custom.js"></script>

</body>

</html>