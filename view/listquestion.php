<?php
include "../controller/questionC.php";

$cc = new QuestionC();
$tab = $cc->listQuestions();

// Handle filter form submission
if (isset($_POST['submitFilter'])) {
    $selectedCategory = $_POST['categoryFilter'];
    if ($selectedCategory == 'all') {
        // If "All Categories" is selected, show all questions
        $tab = $cc->listQuestions();
    } elseif (!empty($selectedCategory)) {
        // If a specific category is selected, filter by that category
        $tab = $cc->getQuestionsByCategory($selectedCategory);
    } else {
        // Default: show all questions
        $tab = $cc->listQuestions();
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
    $conn = config::getConnexion();
    $stmt = $conn->prepare($sql);

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
?>

<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Free Bootstrap Admin Template: Binary Admin</title>
    <!-- BOOTSTRAP STYLES-->
    <link href="assets/css/bootstrap.css" rel="stylesheet" />
    <!-- FONTAWESOME STYLES-->
    <link href="assets/css/font-awesome.css" rel="stylesheet" />
    <!-- CUSTOM STYLES-->
    <link href="assets/css/custom.css" rel="stylesheet" />
    <!-- GOOGLE FONTS-->
    <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />
</head>
<body>
    <div id="wrapper">
        <nav class="navbar navbar-default navbar-cls-top " role="navigation" style="margin-bottom: 0">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".sidebar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="php">Binary admin</a> 
            </div>
            <div style="color: white; padding: 15px 50px 5px 50px; float: right; font-size: 16px;">
                Last access : 27 November 2023 &nbsp; <a href="#" class="btn btn-danger square-btn-adjust">Logout</a>
            </div>
        </nav>   
        <!-- /. NAV TOP  -->
        <nav class="navbar-default navbar-side" role="navigation">
            <div class="sidebar-collapse">
                <ul class="nav" id="main-menu">
                    <li class="text-center">
                        <img src="assets/img/find_user.png" class="user-image img-responsive"/>
                    </li>
                    <li>
                        <a class="active-menu"  href="listquestion.php"><i class="fa fa-dashboard fa-3x"></i> Questions</a>
                    </li>
                    <li>
                        <a class="active-menu"  href="listanswer.php"><i class="fa fa-edit fa-3x"></i> Answers </a>
                    </li>				
                </ul>
            </div>
        </nav>  
        <!-- /. NAV SIDE  -->
        <div id="page-wrapper">
            <div id="page-inner">
                <div class="row">
                    <div class="col-md-12">
                        <h2>Forum Page</h2>
                        <title>Forum</title>
                    </div>
                    <!-- /. ROW  -->
                    <hr />
                    <div class="row">
                        <div class="col-md-12">
                            <!-- Form Elements -->
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    Form Elements 
                                </div>
                                <!-- Category Filter Dropdown -->
                                <form method="POST" action="listquestion.php">
                                    <label for="categoryFilter">Filter by Category:</label>
                                    <select id="categoryFilter" name="categoryFilter" onchange="filterByCategory()">
                                        <option value="">All Categories</option>
                                        <option value="Contraception and Family Planning">Contraception and Family Planning</option>
                                        <option value="Menstrual Health">Menstrual Health</option>
                                        <option value="Pregnancy and Childbirth">Pregnancy and Childbirth</option>
                                        <option value="Sexual Wellness">Sexual Wellness</option>
                                        <option value="Reproductive Health Conditions">Reproductive Health Conditions</option>
                                    </select>
                                    <button type="submit" name="submitFilter" class="btn btn-info btn-sm">Filter</button>
                                </form>
                                <!-- First Table: List of Questions -->
                                <body>
                                    <h1>Forum: Question</h1>
                                    <a href="addquestion.php" class="add-button">Add Question</a>
                                    <table class="table table-bordered table-striped">
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
                                            <?php foreach ($tab as $question) : ?>
                                                <tr>
                                                    <td><?= $question['id']; ?></td>
                                                    <td><?= $question['title']; ?></td>
                                                    <td><?= $question['content']; ?></td>
                                                    <td><?= $question['category']; ?></td>
                                                    <td>
                                                        <form method="POST" action="updatequestion.php">
                                                            <button type="submit" name="update" class="btn btn-primary btn-sm">Update</button>
                                                            <input type="hidden" value="<?= $question['id']; ?>" name="idQuestion">
                                                        </form>
                                                    </td>
                                                    <td>
                                                        <a href="deletequestion.php?id=<?= $question['id']; ?>" class="btn btn-danger btn-sm">Delete</a>
                                                    </td>
                                                    <td>
                                                        <a href="addanswer.php?id=<?= $question['id']; ?>" class="btn btn-success btn-sm">Add Answer</a>
                                                    </td>
                                                </tr>
                                            <?php endforeach; ?>
                                        </tbody>
                                    </table>
                                </body>
                            </div>
                        </div>
                    </div>
                    <!-- Pagination links -->
                <!-- Pagination links -->
<!-- Pagination links -->
<ul class="pagination">
    <?php
    // Display the "Previous" button if not on the first page
    if ($page > 1) {
        echo "<li class='page-item'><a class='page-link' href='?page=" . ($page - 1) . "'>&laquo; Previous</a></li>";
    }

    // Display button for page 1
    echo "<li class='page-item " . ($page == 1 ? 'active' : '') . "'><a class='page-link' href='?page=1'>1</a></li>";
    
    // Display button for page 2
    echo "<li class='page-item " . ($page == 2 ? 'active' : '') . "'><a class='page-link' href='?page=2'>2</a></li>";


    // Display button for page 3
    echo "<li class='page-item " . ($page == 3 ? 'active' : '') . "'><a class='page-link' href='?page=3'>3</a></li>";


    // Display button for page 2
    echo "<li class='page-item " . ($page == 4 ? 'active' : '') . "'><a class='page-link' href='?page=4'>4</a></li>";
    

    // Display the "Next" button if not on the last page
    if ($page < $totalPages) {
        echo "<li class='page-item'><a class='page-link' href='?page=" . ($page + 1) . "'>Next &raquo;</a></li>";
    }
    ?>
</ul>


                </div>
            </div>
        </div>
    </div>
    <!-- /. WRAPPER  -->
    <!-- SCRIPTS -AT THE BOTTOM TO REDUCE THE LOAD TIME-->
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
