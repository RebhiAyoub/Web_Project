<?php
session_start();



include '../../../cycle7/controller/CycleC.php';




include '../../Controller/p/ProductsC.php';
include '../../Controller/p/commandeC.php';
include '../../Controller/p/CategorieC.php';
include '../../Controller/U/controller_user_admin.php';
include '../../Controller/Forum/questionC.php';
include '../../Controller/Forum/answerC.php';

$c1 = new  CycleC();
$tab1 = $c1->listcycles();

$poductCC = new ProductC();
$commandeC = new CommandeC();
$liste1 = $commandeC->listCommandes($_SESSION['id_user']);

$CategorieC = new CategorieC();

$list = $CategorieC->afficherCategorie();



$ProductC = new ProductC();
$listeProducts = $ProductC->AfficherProducts();



$ccc = new AnswerC();
$answerTab = $ccc->listAnswers();

$cc = new QuestionC();
$tabb = $cc->listQuestions();

// Handle filter form submission
if (isset($_POST['submitFilter'])) {
    $selectedCategory = $_POST['categoryFilter'];
    if ($selectedCategory == 'all') {
        // If "All Categories" is selected, show all questions
        $tabb = $cc->listQuestions();
    } elseif (!empty($selectedCategory)) {
        // If a specific category is selected, filter by that category
        $tabb = $cc->getQuestionsByCategory($selectedCategory);
    } else {
        // Default: show all questions
        $tabb = $cc->listQuestions();
    }
}




// Number of records per page
$recordsPerPage = 4;

// Get the current page number from the URL
$page = isset($_GET['page']) ? intval($_GET['page']) : 1;

// Calculate the offset for the SQL query
$offset = ($page - 1) * $recordsPerPage;

// Query to retrieve records for the current page
$sql = "SELECT * FROM question";

// Check if a category is selected for filtering
if (!empty($selectedCategory)) {
    $sql .= " WHERE category = :category";
}

$sql .= " ORDER BY id ASC LIMIT $recordsPerPage OFFSET $offset";

try {
    $connn = config::getConnexion();
    $stmt = $connn->prepare($sql);

    // Bind the category parameter if it's set
    if (!empty($selectedCategory)) {
        $stmt->bindParam(':category', $selectedCategory);
    }

    $stmt->execute();

    // Fetch the data into an array
    $tab = $stmt->fetchAll(PDO::FETCH_ASSOC);

    // Get the total number of rows
    $totalRows = count($tab);

} catch (PDOException $e) {
    die('Erreur: ' . $e->getMessage());
}


// Calculate the total number of pages
$totalPages = ceil($totalRows / $recordsPerPage);
// Instantiate the controller
$c = new controller_user_admin();

// Get the current page from the URL, default to 1 if not set
$currentPage = isset($_GET['page']) ? intval($_GET['page']) : 1;

// Get paginated user data
$perPage = 10; // Set the number of users per page
$paginationData = $c->getPaginatedUsers($currentPage, $perPage = 7);
$tab = $paginationData['data'];

?>


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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />



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
        table {
        width: 100%;
        border-collapse: collapse;
        margin-bottom: 20px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    }

    .table td, .table th {
        padding: 12px;
        text-align: left;
        border-bottom: 1px solid #e0e0e0;
    }

    .feedback-item {
        margin-bottom: 20px;
        position: relative;
    }

    .btn {
        padding: 8px 16px;
        margin-right: 8px;
        cursor: pointer;
        border: none;
        border-radius: 4px;
        transition: background-color 0.3s ease;
    }

    .btn:hover {
        background-color: #f2f2f2;
    }

    .btn i {
        margin-right: 4px;
    }

    .btn-delete {
        background-color: #ff6666;
        color: #fff;
    }

    .btn-primary {
        background-color: #3498db;
        color: #fff;
    }

    .btn-success {
        background-color: #4caf50;
        color: #fff;
    }

    .btn-danger {
        background-color: #e74c3c;
        color: #fff;
    }

    .btn-warning {
        background-color: #f39c12;
        color: #fff;
    }

    textarea {
        width: calc(100% - 16px);
        padding: 8px;
        margin-bottom: 8px;
        box-sizing: border-box;
    }

    .high-rating {
        background-color: #c8e6c9; 
    }

    .medium-rating {
        background-color: #ffe082; 
    }

    .low-rating {
        background-color: #ffcdd2; 
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
                <a class="navbar-brand gradient-text" href="ui.html">
                    <?php echo $_SESSION["first_name"] ?>
                    <?php echo $_SESSION["last_name"] ?>
                </a>
            </div>
            <div id="lastAccess" style="color: white; padding: 15px 50px 5px 50px; float: right; font-size: 16px;">
                Last access: <span id="realTimeLastAccess">Loading...</span>
                <a href="../../View/user/welcome.html" class="btn btn-danger square-btn-adjust">Logout</a>
            </div>



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
                    </li>
                    <li>
                        <a href="#products"><i class="fa fa-sitemap fa-3x"></i> Products<span
                                class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">
                            <li>
                                <a href="#products">Products</a>
                            </li>
                            <li>
                                <a href="#Category">Category</a>
                            </li>
                            <li>
                                <a href="#Order">Order</a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="#forum"><i class="fa fa-sitemap fa-3x"></i> Forum<span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">
                            <li>
                                <a href="#question">Question</a>
                            </li>
                            <li>
                                <a href="#answer">Answer</a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="#forum"><i class="fa fa-sitemap fa-3x"></i> Feedback<span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">
                            <li>
                                <a href="#reply">Reply</a>
                            </li>
                            <li>
                                <a href="#category">Category</a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="#forum"><i class="fa fa-sitemap fa-3x"></i> Sexual<span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">
                            <li>
                            <a href="/cycle7/view/ovulation/listOvulations.php">Ovulation Date</a>
                            </li>
                            <li>
                            <a href="/cycle7/view/cycle/listeCycle.php">Cycle Length</a>
                            </li>
                        </ul>
                    </li>

                </ul>
                <li>
                    <a href="#users"><i class="fa fa-dashboard fa-3x"></i> Users</a>
                </li>
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
                    <a class="btn btn-primary" href="/web/Controller/CrudDeliveryDate/ui1.php"
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
                        <a class='btn btn-primary btn-sm' href='/web/Controller/CrudDeliveryDate/ui2.php?idUser=$row[idUser]'>Edit</a>
                    </td>
                    <td>
                        <a class='btn btn-danger btn-sm' href='/web/Controller/CrudDeliveryDate/ui3.php?idUser=$row[idUser]'>Delete</a>
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
                    <a class="btn btn-primary" href="/web/Controller/CrudTrimester/ui1.php" role="button">New
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
                      <a class='btn btn-primary btn-sm' href='/web/Controller/CrudTrimester/ui2.php?idUser=$row[idUser]'>Edit</a>
                  </td>
                  <td>
                      <a class='btn btn-danger btn-sm' href='/web/Controller/CrudTrimester/ui3.php?idUser=$row[idUser]'>Delete</a>
                  </td>
                  <td>
                      <a class='btn btn-success btn-sm' href='/web/Controller/CrudTrimester/ui4.php?idUser=$row[idUser]'>Join Delivery Date</a>
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
                                        xhr.open("POST", "/web/Controller/CrudDeliveryDate/archive_user.php", true);

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

                <div class="container my-5" id="users">
                    <h2>Users List</h2>

                    <table class="table">
                        <tr>
                            <th style="text-align: center; background-color: #333; color: white; padding: 20px;">Id</th>
                            <th style="text-align: center; background-color: #333; color: white; padding: 10px;">First
                                Name</th>
                            <th style="text-align: center; background-color: #333; color: white; padding: 10px;">Last
                                Name</th>
                            <th style="text-align: center; background-color: #333; color: white; padding: 10px;">Date of
                                Birth</th>
                            <th style="text-align: center; background-color: #333; color: white; padding: 10px;">Email
                            </th>
                            <th style="text-align: center; background-color: #333; color: white; padding: 10px;">
                                Password</th>
                            <th style="text-align: center; background-color: #333; color: white; padding: 10px;">Role
                            </th>
                            <th style="text-align: center; background-color: #333; color: white; padding: 10px;">Status
                            </th>
                            <th style="text-align: center; background-color: #333; color: white; padding: 10px;">Delete
                            </th>
                        </tr>

                        <?php
                        foreach ($tab as $user) {
                            ?>
                            <tr style="background-color: <?php echo ($user['status'] == 1) ? '#e6ffe6' : '#ffe6e6'; ?>">
                                <td style="text-align: center;">
                                    <?php echo $user['id_user']; ?>
                                </td>
                                <td style="text-align: center;">
                                    <?php echo $user['first_name']; ?>
                                </td>
                                <td style="text-align: center;">
                                    <?php echo $user['last_name']; ?>
                                </td>
                                <td style="text-align: center;">
                                    <?php echo $user['date_of_birth']; ?>
                                </td>
                                <td style="text-align: center;">
                                    <?php echo $user['email']; ?>
                                </td>
                                <td style="text-align: center;">
                                    <?php echo $user['password']; ?>
                                </td>
                                <td style="text-align: center;">
                                    <?php echo $user['role']; ?>
                                </td>
                                <td style="text-align: center;">
                                    <?php echo $user['status']; ?>
                                </td>
                                <td align="center">
                                    <a class='btn btn-danger btn-sm'
                                        href="/web/Controller/U/delete.php?id_user=<?php echo $user['id_user']; ?>"
                                        style="text-align: center;">Delete</a>
                                </td>
                            </tr>
                            <?php
                        }
                        ?>
                    </table>
                </div>

                <div class="pagination" style="text-align: center; margin-top: 20px;">
                    <?php
                    for ($i = 1; $i <= $paginationData['totalPages']; $i++) {
                        echo "<a href='ui.php?page=$i' class='btn btn-info'>$i</a> ";
                    }
                    ?>
                </div>

                <div class="container my-5" id="products">
                    <h2>List of Products</h2>
                    <br>
                    <a class="btn btn-primary" href="/web/Controller/products/AjouterProduct.php"
                        role="button">New Product</a>
                    <br>
                    <br>
                    <table class="table">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Product Name</th>
                                <th>Description</th>
                                <th>Price</th>
                                <th>Availability</th>
                                <th>Image</th>
                                <th>Creation Date</th>
                                <th>Category</th>
                                <th>View</th>
                                <th>Update</th>
                                <th>Delete</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php

                            foreach ($listeProducts as $produits) {
                                ?>
                                <tr>
                                    <td>
                                        <?php echo $produits['idProduit']; ?>
                                    </td>
                                    <td>
                                        <?php echo $produits['Product_name']; ?>
                                    </td>
                                    <td>
                                        <?php echo $produits['Descriptionn']; ?>
                                    </td>
                                    <td>
                                        <?php echo $produits['Product_price']; ?>
                                    </td>
                                    <td>
                                        <?php echo $produits['Availabilityy']; ?>
                                    </td>
                                    <td><img src="../user/assets/images/<?php echo $produits['img']; ?>" width="200"
                                            height="150"></td>
                                    <td>
                                        <?php echo $produits['creationDate']; ?>
                                    </td>
                                    <td>
                                        <?php echo $produits['categ']; ?>
                                    </td>

                                    <td>
                                        <form method="GET" action="/web/Controller/p/ViewProduct.php">
                                            <input type="submit" class="btn btn-info " name="Voir" value="See">
                                            <input type="hidden" value=<?php echo $produits['idProduit']; ?>
                                                name="idProduit">
                                        </form>
                                    </td>
                                    <td>
                                        <form method="POST" action="/web/Controller/p/UpdateProduct.php">
                                            <input type="submit" class="btn btn-success " name="Update" value="Update">
                                            <input type="hidden" value=<?php echo $produits['idProduit']; ?>
                                                name="idProduit">
                                        </form>
                                    </td>
                                    <td>
                                        <a class="btn btn-danger "
                                            href="/web/Controller/p/SupprimerProduct.php?idProduit=<?php echo $produits['idProduit']; ?>">Delete</a>
                                    </td>
                                </tr>
                                <?php
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

                <div class="container my-5" id="categoryy">
                    <h2>List of Categories</h2>
                    <br>
                    <a class="btn btn-primary" href="/web/Controller/p/AjouterCategorie.php"
                        role="button">New Category</a>
                    <br>
                    <br>
                    <table class="table">
                        <thead>
                            <tr>
                                <th>id Categorie</th>
                                <th>Nom Categorie</th>
                                <th>View</th>
                                <th>Update</th>
                                <th>Delete</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php

                            foreach ($list as $categorie) {
                                ?>
                                <tr>
                                    <td>
                                        <?php echo $categorie['idCategorie']; ?>
                                    </td>
                                    <td>
                                        <?php echo $categorie['nomCategorie']; ?>
                                    </td>
                                    <td>
                                        <form method="POST" action="/web/Controller/p/ViewCategory.php">
                                            <input class="btn btn-info " type="submit" name="Voir" value="Voir">
                                            <input type="hidden" value=<?php echo $categorie['idCategorie']; ?>
                                                name="idCategorie">
                                        </form>
                                    </td>
                                    <td>
                                        <form method="POST"
                                            action="/web/Controller/p/ModifierCategorie.php">
                                            <input class="btn btn-success " type="submit" name="update" value="Update">
                                            <input type="hidden" value=<?PHP echo $categorie['idCategorie']; ?>
                                                name="idCategorie">
                                        </form>
                                    </td>
                                    <td>
                                        <a class="btn btn-danger "
                                            href="/web/Controller/p/SupprimerCategorie.php?idCategorie=<?php echo $categorie['idCategorie']; ?>">Delete</a>
                                    </td>
                                </tr>
                                <?php
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

                <div class="container my-5" id="commande">
                    <h2>List of Orders</h2>
                   
                    <br>
                    <table class="table">
                        <thead>
                            <tr>
                                <th>IdCommande</th>
                                <th>Quantite</th>
                                <th>DateOrder</th>
                                <th>Status</th>
                                <th>Amount</th>
                                <th>Product</th>
                                <th>View</th>
                                <th>Delete</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php

                            foreach ($liste1 as $commande) {
                                $produit = $poductCC->getProduitById($commande['idProduit']);
                                ?>
                                <tr>
                                    <td>
                                        <?php echo $commande['idCommande']; ?>
                                    </td>
                                    <td>
                                        <?php echo $commande['quantite']; ?>
                                    </td>
                                    <td>
                                        <?php echo $commande['dateCommande']; ?>
                                    </td>
                                    <td>
                                        <?php echo $commande['status']; ?>
                                    </td>
                                    <td>
                                        <?php echo $commande['amount']; ?>
                                    </td>
                                    <td>
                                        <?php echo $produit['Product_name']; ?>
                                    </td>
                                    <td>
                                        <form method="POST" action="/web/Controller/p/ViewOrder.php">
                                            <input type="submit" class="btn btn-info " name="Voir" value="Voir">
                                            <input type="hidden" value=<?php echo $commande['idCommande']; ?>
                                                name="idCommande">
                                        </form>
                                    <td>
                                        
                                    </td>
                                    <td>
                                        <a class="btn btn-danger "
                                            href="/web/Controller/p/SupprimerCommande.php?idCommande=<?php echo $commande['idCommande']; ?>">Delete</a>
                                    </td>
                                </tr>
                                <?php
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

                <div class="container my-5" id="answer">
                    <h2>List of Answers</h2>
                    <br>
                    <br>
                    <table class="table">
                        <thead>
                            <tr>
                                <th style="width: 5%;">ID Answer</th>
                                <th style="width: 5%;">ID Question</th>
                                <th style="width: 15%;">Title</th>
                                <th style="width: 30%;">Content</th>
                                <th style="width: 15%;">Category</th>
                                <th style="width: 5%;">Update</th>
                                <th style="width: 5%;">Delete</th>
                            </tr>
                        </thead>

                        <tbody>
                            <?php foreach ($answerTab as $answer): ?>
                                <tr>
                                    <td>
                                        <?= $answer['id_answer']; ?>
                                    </td>
                                    <td>
                                        <?= $answer['id_question']; ?>
                                    </td>
                                    <td>
                                        <?= $answer['title']; ?>
                                    </td>
                                    <td>
                                        <?= $answer['content']; ?>
                                    </td>
                                    <td>
                                        <?= $answer['category']; ?>
                                    </td>
                                    <td>
                                        <form method="POST" action="/web/Controller/Forum/updateanswer.php">
                                            <button type="submit" name="update"
                                                class="btn btn-primary btn-sm">Update</button>
                                            <input type="hidden" value="<?= $answer['id_answer']; ?>" name="idAnswer">
                                        </form>
                                    </td>
                                    <td>
                                        <a href="/web/Controller/Forum/deleteanswer.php?id=<?= $answer['id_answer']; ?>"
                                            class="btn btn-danger btn-sm">Delete</a>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
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
                <div class="container my-5" id="question">
                    <h2>List of Questions</h2>
                    <br>
                    <a class="btn btn-primary" href="/web/Controller/Forum/addquestion.php" role="button">New
                        Question</a>
                    <br>
                    <br>
                    <table class="table">
                        <thead>
                            <tr>
                                <th style="width: 5%;">ID</th>
                                <th style="width: 15%;">Title</th>
                                <th style="width: 40%;">Content</th>
                                <th style="width: 15%;">Category</th>
                                <th style="width: 5%;">Update</th>
                                <th style="width: 5%;">Delete</th>
                                <th style="width: 15%;">Add Answer</th> <!-- New Column for Add Answer button -->
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($tabb as $question): ?>
                                <tr>
                                    <td>
                                        <?= $question['id']; ?>
                                    </td>
                                    <td>
                                        <?= $question['title']; ?>
                                    </td>
                                    <td>
                                        <?= $question['content']; ?>
                                    </td>
                                    <td>
                                        <?= $question['category']; ?>
                                    </td>
                                    <td>
                                        <form method="POST" action="/web/Controller/Forum/updatequestion.php">
                                            <button type="submit" name="update"
                                                class="btn btn-primary btn-sm">Update</button>
                                            <input type="hidden" value="<?= $question['id']; ?>" name="idQuestion">
                                        </form>
                                    </td>
                                    <td>
                                        <a href="/web/Controller/Forum/deletequestion.php?id=<?= $question['id']; ?>"
                                            class="btn btn-danger btn-sm">Delete</a>
                                    </td>
                                    <td>
                                        <a href="/web/Controller/Forum/addanswer.php?id=<?= $question['id']; ?>"
                                            class="btn btn-success btn-sm">Add Answer</a>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
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


                <div class="container my-5" id="reply">
                    <!-- Feedback display section -->
                    <section id="feedback-area">
                        <h3>Feedback Area</h3>
                        <div id="insert-feedback-area">
                            <?php
                            // Include the FeedbackC.php controller
                            include '../../Controller/FeedbackC.php';
                            include '../../Controller/ReplyC.php';

                            // Create an instance of FeedbackC
                            $feedbackController = new FeedbackC();

                            // Call the showFeedback method to get feedback data
                            $feedbackData = $feedbackController->showFeedback();

                            $repliesController = new ReplyC();

                            // Number of feedback items to display per page
                            $itemsPerPage = 4;

                            // Get the current page from the URL parameter
                            $currentPage = isset($_GET['page']) ? (int) $_GET['page'] : 1;

                            // Calculate the starting index for the displayed feedback items
                            $startIndex = ($currentPage - 1) * $itemsPerPage;

                            // Get a subset of feedback items based on the current page
                            $pagedFeedbackData = array_slice($feedbackData, $startIndex, $itemsPerPage);


                            // Display the feedback
                            foreach ($pagedFeedbackData as $feedback): ?>
                                <?php
                                // Add a class based on the rating
                                $ratingClass = '';
                                if ($feedback['Rating'] >= 4) {
                                    $ratingClass = 'high-rating';
                                } elseif ($feedback['Rating'] >= 2) {
                                    $ratingClass = 'medium-rating';
                                } else {
                                    $ratingClass = 'low-rating';
                                }
                                ?>
                                <div class="feedback-item <?php echo $ratingClass; ?>">
                                    <table class="table">
                                        <tbody>
                                            <tr>
                                                <td><strong>User ID:</strong>
                                                    <?php echo $feedback['idUser']; ?>
                                                </td>
                                                <td><strong>Rating:</strong>
                                                    <?php echo $feedback['Rating']; ?>
                                                </td>
                                                <td><strong>Comment:</strong>
                                                    <?php echo $feedback['Comment']; ?>
                                                </td>
                                                <td><strong>Category:</strong>
                                                    <?php echo $feedback['nameCategory']; ?>
                                                </td>
                                                <td><strong>Timestamp:</strong>
                                                    <?php echo $feedback['timestamp_column']; ?>
                                                </td>
                                                <td>
                                                    <form action="/web/Controller/deleteFeedbackAD.php"
                                                        method="get">
                                                        <!-- Pass the current page information to deleteFeedbackAD.php -->
                                                        <input type="hidden" name="feedbackId"
                                                            value="<?php echo $feedback['idFeedback']; ?>">
                                                        <input type="hidden" name="page"
                                                            value="<?php echo $currentPage; ?>">
                                                        <button type="submit" class="btn btn-delete"
                                                            title="Delete Feedback"><i class="fa-solid fa-eraser"
                                                                style="color: #ffffff;"></i></button>
                                                    </form>
                                                    <button type="button" class="btn btn-primary" title="Reply"
                                                        onclick="toggleReplyForm(<?php echo $feedback['idFeedback']; ?>)"><i
                                                            class="fas fa-reply"></i></button>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>

                                    <!-- Reply form -->
                                    <div id="reply-form-<?php echo $feedback['idFeedback']; ?>" style="display: none;">
                                        <form action="/web/Controller/replyFeedback.php" method="post"
                                            id="reply-form">
                                            <input type="hidden" name="idFeedback"
                                                value="<?php echo $feedback['idFeedback']; ?>">
                                            <label for="adminReply">Admin Reply:</label>
                                            <textarea name="adminReply" rows="4" required></textarea>
                                            <button type="submit" class="btn btn-success"
                                                onclick="setFormAction(<?php echo $feedback['idFeedback']; ?>)"
                                                title="Submit Reply"><i class="fas fa-check"></i></button>
                                            <button type="button" class="btn btn-danger"
                                                onclick="toggleReplyForm(<?php echo $feedback['idFeedback']; ?>)"
                                                title="Cancel"><i class="fas fa-times"></i></button>
                                        </form>
                                    </div>
                                    <!-- Display replies -->
                                    <?php
                                    $feedbackId = $feedback['idFeedback'];
                                    $replies = $repliesController->showReplies($feedbackId);

                                    foreach ($replies as $reply): ?>
                                        <div class="reply-item">
                                            <p><strong>Admin Reply:</strong>
                                                <?php echo $reply['adminReply']; ?>
                                            </p>
                                            <!-- Add other reply information as needed -->
                                            <form action="/web/Controller/deleteReply.php" method="get">
                                                <input type="hidden" name="idReply" value="<?php echo $reply['idReply']; ?>">
                                                <input type="hidden" name="page"
                                                    value="<?php echo isset($_GET['page']) ? $_GET['page'] : 1; ?>">
                                                <button type="submit" class="btn btn-delete">Delete Reply</button>
                                            </form>

                                            <!-- Edit button to toggle the edit form -->
                                            <button type="button" class="btn btn-warning"
                                                onclick="toggleEditForm(<?php echo $reply['idReply']; ?>)">Edit Reply</button>

                                            <!-- Edit form (initially hidden) -->
                                            <form action="/web/Controller/editReply.php" method="post"
                                                id="edit-form-<?php echo $reply['idReply']; ?>" style="display: none;">
                                                <input type="hidden" name="idReply" value="<?php echo $reply['idReply']; ?>">
                                                <input type="hidden" name="page"
                                                    value="<?php echo isset($_GET['page']) ? $_GET['page'] : 1; ?>">
                                                <label for="editedReply">Edit Reply:</label>
                                                <textarea name="editedReply" rows="4"
                                                    required><?php echo $reply['adminReply']; ?></textarea>
                                                <button type="submit" class="btn btn-success">Confirm</button>
                                                <button type="button" class="btn btn-danger"
                                                    onclick="toggleEditForm(<?php echo $reply['idReply']; ?>)">Cancel</button>
                                            </form>
                                        </div>
                                    <?php endforeach; ?>
                                </div>
                            <?php endforeach; ?>

                        </div>
                        <!-- Pagination navigation -->
                        <div class="pagination">
                            <?php

                            // Calculate the total number of pages
                            $totalPages = ceil(count($feedbackData) / $itemsPerPage);

                            // Display previous page arrow
                            if ($currentPage > 1) {
                                echo '<a href="?page=' . ($currentPage - 1) . '">&laquo;</a>';
                            }

                            // Display page numbers with '/' separator
                            for ($i = 1; $i <= $totalPages; $i++) {
                                // Display only the arrows as links
                                if ($i == $currentPage) {
                                    echo '<span class="active">' . $i . '</span>';
                                } else {
                                    echo '<a href="?page=' . $i . '">' . $i . '</a>';
                                }
                            }

                            // Display next page arrow
                            if ($currentPage < $totalPages) {
                                echo '<a href="?page=' . ($currentPage + 1) . '">&raquo;</a>';
                            }
                            ?>
                        </div>
                    </section>
                    <!-- JavaScript to toggle reply form visibility -->
                    <script>
                        function toggleReplyForm(feedbackId) {
                            var replyForm = document.getElementById('reply-form-' + feedbackId);
                            replyForm.style.display = (replyForm.style.display === 'none' || replyForm.style.display === '') ? 'table-row' : 'none';
                        }
                        function toggleEditForm(replyId) {
                            var editForm = document.getElementById('edit-form-' + replyId);

                            // Check if the form is currently visible
                            var isVisible = window.getComputedStyle(editForm).display !== 'none';

                            // Toggle the display property based on its current state
                            editForm.style.display = isVisible ? 'none' : 'block';
                        }
                    </script>
                </div>
                <div class="container my-5" id="category">
                    <!-- category display section -->
                    <div id="add-category-form" style="margin-top: 20px;">
                        <h4>Add New Category</h4>
                        <form action="/web/Controller/addCategory.php" method="post">
                            <label for="categoryName">Category Name:</label>
                            <input type="text" name="categoryName" required>
                            <button type="submit" class="btn btn-success">Add Category</button>
                        </form>
                    </div>

                    <!-- Dropdown bar for sorting -->
                    <div id="category-sort-dropdown">
                        <label for="sort-category">Sort by:</label>
                        <select id="sort-category" class="btn btn-default" onchange="sortCategories()">
                            <option value="name">Alphabetical Order</option>
                            <option value="id">ID</option>
                        </select>
                    </div>

                    <!-- Show Categories section -->
                    <section id="show-categories">
                        <h3>Categories</h3>
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Name</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                // Include the CategoryC.php controller
                                include '../../Controller/CategoryC.php';


                                // Create an instance of CategoryC
                                $categoryController = new CategoryC();

                                // Call the showCategories method to get category data
                                $categoriesData = $categoryController->showCategories();

                                // Display the categories
                                foreach ($categoriesData as $category) {
                                    echo "<tr>";
                                    echo "<td>{$category['CategoryID']}</td>";
                                    echo "<td>{$category['nameCategory']}</td>";
                                    echo "<td><button class='btn-delete' onclick='deleteCategory({$category['CategoryID']})'>Delete</button></td>";
                                    echo "</tr>";
                                }
                                ?>
                            </tbody>
                        </table>
                    </section>

                    <!-- JavaScript to handle category deletion -->
                    <script>
                        function deleteCategory(categoryId) {
                            if (confirm('Are you sure you want to delete this category?')) {
                                // You can redirect to deleteCategory.php with categoryId as a parameter
                                window.location.href = '/web/Controller/deleteCategory.php?categoryId=' + categoryId;
                            }
                        }
                        function sortCategories() {
                            var sortBy = document.getElementById('sort-category').value;
                            var categoriesTable = document.querySelector('#show-categories table tbody');
                            var rows = Array.from(categoriesTable.rows);

                            rows.sort(function (a, b) {
                                var aValue, bValue;

                                if (sortBy === 'name') {
                                    aValue = a.cells[1].textContent.toLowerCase();
                                    bValue = b.cells[1].textContent.toLowerCase();
                                } else if (sortBy === 'id') {
                                    aValue = parseInt(a.cells[0].textContent, 10);
                                    bValue = parseInt(b.cells[0].textContent, 10);
                                }

                                if (aValue < bValue) {
                                    return -1;
                                } else if (aValue > bValue) {
                                    return 1;
                                } else {
                                    return 0;
                                }
                            });

                            // Clear the existing rows
                            rows.forEach(function (row) {
                                categoriesTable.removeChild(row);
                            });

                            // Append the sorted rows
                            rows.forEach(function (row) {
                                categoriesTable.appendChild(row);
                            });
                        }
                        function setFormAction(feedbackId) {
                            var form = document.getElementById('reply-form');
                            if (form) {
                                form.action = 'replyFeedback.php?page=<?php echo $currentPage; ?>&feedbackId=' + feedbackId;
                            }

                        }


                    </script>



                </div>



                

                <div class="container my-5" id="cycle">
                <div class="panel panel-default">
                        <div class="panel-heading">
                            Table of woman cycle
                        </div>
                        <div class="col-md-12">
                        <h2><a href="/web/Controller/Fatma/createCycle.php">Add Cycle</a></h2>
                        <button type="button" class="btn btn-primary">Download as CSV</button>
                    </div>
                        <div class="panel-body">
                            <div class="table-responsive">
                            <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
                               
                                <?php
                                // Pagination
                            // Connection to the database
                            $servername = "localhost";
                            $username = "root";
                            $password = "";
                            $dbname = "WWC";

                            $conn = new mysqli($servername, $username, $password, $dbname);

                            // Check connection
                            if ($conn->connect_error) {
                                die("Connection failed: " . $conn->connect_error);
                            }

                            // Pagination variables
                            $records_per_page = 5;
                            $page = isset($_GET['page']) ? $_GET['page'] : 1;
                            $offset = ($page - 1) * $records_per_page;

                            // Fetch data from the database
                            $sql = "SELECT * FROM user1 LIMIT $offset, $records_per_page";
                            $result = $conn->query($sql);

                            // Display the table
                            echo '<table class="table table-striped table-bordered table-hover" id="dataTables-example">';
                            echo '<tr><th>Age </th><th>Current Period Date</th><th>Previous Period Date</th><th>Cycle Length</th><th>Update</th><th>Delete</th></tr>';

                            while ($row = $result->fetch_assoc()) {
                                echo '<tr class="odd gradeX">';
                                echo '<td>' . $row['idUser'] . '</td>';
                                echo '<td>' . $row['currentPeriodDate'] . '</td>';
                                echo '<td>' . $row['previousPeriodDate'] . '</td>';
                                echo '<td>' . $row['menstrualCycleLength'] . '</td>';
                                echo '<td><form method="POST" action=href="/web/Controller/Fatma/editCycle.php"><span class="glyphicon glyphicon-pencil"></span><input type="submit" name="update" class="btn btn-default btn-sm" value="Update"><input type="hidden" value="' . $row["idUser"] . '" name="idUser"> </form></td>';
                                echo '<td><a class="btn btn-info btn-lg" href="/web/Controller/Fatma/deleteCycle.php?idUser=' . $row["idUser"] . '"><span class="glyphicon glyphicon-remove"></span>Delete</a> </td>';
                                echo '</tr>';
                            }

                            echo '</table>';

                            // Pagination links
                            $sql = "SELECT COUNT(idUser) AS total FROM user1";
                            $result = $conn->query($sql);
                            $row = $result->fetch_assoc();
                            $total_records = $row['total'];
                            $total_pages = ceil($total_records / $records_per_page);

                           
                       

               



                            echo '<div class="pagination">';
                            for ($i = 1; $i <= $total_pages; $i++) {
                                echo '<li class="page-item"><a href="?page=' . $i . '">' . $i . '</a></li>';
                            }
                            echo '</div>';

                            // Close the database connection
                            $conn->close();
                            ?>

                               
                               
                            </div>
                           
                        </div>
                    </div>
                    <!--End Advanced Tables -->
                </div>

                <div class="container my-5" id="ovulation">
                <div class="panel panel-default">
                        <div class="panel-heading">
                            Table of Ovulation
                        </div>
                        <div class="col-md-12">
                        <h2><a href="/web/Controller/Fatma/createOvulation.php">Add Ovulation</a></h2>
                        <button type="button" class="btn btn-primary">Download as CSV</button>
                    </div>
                        <div class="panel-body">
                            <div class="table-responsive">
                            <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
                               
                                <?php
                                // Pagination
                            // Connection to the database
                            $servername = "localhost";
                            $username = "root";
                            $password = "";
                            $dbname = "WWC";

                            $conn = new mysqli($servername, $username, $password, $dbname);

                            // Check connection
                            if ($conn->connect_error) {
                                die("Connection failed: " . $conn->connect_error);
                            }

                            // Pagination variables
                            $records_per_page = 5;
                            $page = isset($_GET['page']) ? $_GET['page'] : 1;
                            $offset = ($page - 1) * $records_per_page;

                            // Fetch data from the database
                            $sql = "SELECT * FROM user2 LIMIT $offset, $records_per_page";
                            $result = $conn->query($sql);

                            // Display the table
                            echo '<table class="table table-striped table-bordered table-hover" id="dataTables-example">';
                            echo '<tr><th>Age</th><th>First Day Of Last Menstrual Period</th><th>Average Cycle Length</th><th>Ovulation Date</th><th>Update</th><th>Delete</th></tr>';

                            while ($row = $result->fetch_assoc()) {
                                echo '<tr class="odd gradeX">';
                                echo '<td>' . $row['idUser'] . '</td>';
                                echo '<td>' . $row['firstDayOfLMP'] . '</td>';
                                echo '<td>' . $row['averageCycleLength'] . '</td>';
                                echo '<td>' . $row['ovulationDate'] . '</td>';
                                echo '<td><form method="POST" action="/web/Controller/Fatma/editOvulation.php"><span class="glyphicon glyphicon-pencil"></span><input type="submit" name="update" class="btn btn-default btn-sm" value="Update"><input type="hidden" value="' . $row["idUser"] . '" name="idUser"> </form></td>';
                                echo '<td><a class="btn btn-info btn-lg" href="/web/Controller/Fatma/deleteOvulation.php?idUser=' . $row["idUser"] . '"><span class="glyphicon glyphicon-remove"></span>Delete</a> </td>';
                                echo '</tr>';
                            }

                            echo '</table>';

                            // Pagination links
                            $sql = "SELECT COUNT(idUser) AS total FROM user1";
                            $result = $conn->query($sql);
                            $row = $result->fetch_assoc();
                            $total_records = $row['total'];
                            $total_pages = ceil($total_records / $records_per_page);

                           
                       

               



                            echo '<div class="pagination">';
                            for ($i = 1; $i <= $total_pages; $i++) {
                                echo '<li class="page-item"><a href="?page=' . $i . '">' . $i . '</a></li>';
                            }
                            echo '</div>';

                            // Close the database connection
                            $conn->close();
                            ?>

                               
                               
                            </div>
                           
                        </div>
                    </div>
                    <!--End Advanced Tables -->
                </div>

               

             





            </div>

            <!-- /. PAGE INNER  -->
        </div>
    </div>

    <!-- /. PAGE INNER  -->
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
    <script>
                                        $(function() {
                                        $("button").on('click', function() {
                                            var data = "";
                                            var tableData = [];
                                            var rows = $("table tr");
                                            rows.each(function(index, row) {
                                            var rowData = [];
                                            $(row).find("th, td").each(function(index, column) {
                                                rowData.push(column.innerText);
                                            });
                                            tableData.push(rowData.join(","));
                                            });
                                            data += tableData.join("\n");
                                            $(document.body).append('<a id="download-link" download="data.csv" href=' + URL.createObjectURL(new Blob([data], {
                                            type: "text/csv"
                                            })) + '/>');


                                            $('#download-link')[0].click();
                                            $('#download-link').remove();
                                        });
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