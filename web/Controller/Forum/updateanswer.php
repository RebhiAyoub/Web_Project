<?php
$errors = [
    'title' => '',
    'content' => '',
    'category' => '',
];

$error = '';

include 'answerC.php';
include '../../Model/answer.php';

$answer = null;
$answerC = new AnswerC();

$categories = [
    'Contraception and Family Planning',
    'Menstrual Health',
    'Pregnancy and Childbirth',
    'Sexual Wellness',
    'Reproductive Health Conditions'
];

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (
        isset($_POST["title"]) &&
        isset($_POST["content"]) &&
        isset($_POST["category"]) &&
        isset($_POST["idAnswer"])
    ) {
        $title = $_POST['title'];
        $content = $_POST['content'];
        $category = $_POST['category'];

        // Validate title
        if (empty($title) ) {
            $errors['title'] = "Title should not be empty and should not contain special symbols.";
        }

        // Validate content
        if (empty($content)) {
            $errors['content'] = "Content should not be empty.";
        } 

        // Validate category
        if (empty($category)) {
            $errors['category'] = "Category should not be empty.";
        } elseif (!in_array($category, $categories)) {
            $errors['category'] = "Invalid category selected.";
        }

        if (empty($errors['title']) && empty($errors['content']) && empty($errors['category'])) {
            $idquestion = $answerC->showAnswer($_POST['idAnswer']);
            $answer = new Answer($_POST["idAnswer"],$title, $content, $category, $_POST['idquestion']);
            $answerC->updateAnswer($answer, $_POST['idAnswer']);
            header('Location: /web/View/admin/ui.php#answer');
            exit();
        }
    } else {
        $error = "Missing information";
    }
}

// If you're editing an existing answer, retrieve its data
if (isset($_POST['idAnswer'])) {
    $answer = $answerC->showAnswer($_POST['idAnswer']);
}
?>

<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Free Bootstrap Admin Template : Binary Admin</title>
    <link href="/web/View/admin/assets/css/bootstrap.css" rel="stylesheet" />
      <!-- FONTAWESOME STYLES-->
      <link href="/web/View/admin/assets/css/font-awesome.css" rel="stylesheet" />
      <!-- CUSTOM STYLES-->
      <link href="/web/View/admin/assets/css/custom.css" rel="stylesheet" />
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
            <div style="color: white;
padding: 15px 50px 5px 50px;
float: right;
font-size: 16px;"> Last access : 27 November 2023 &nbsp; <a href="#" class="btn btn-danger square-btn-adjust">Logout</a> </div>
        </nav>
        <!-- /. NAV TOP  -->
        <nav class="navbar-default navbar-side" role="navigation">
            <div class="sidebar-collapse">
                <ul class="nav" id="main-menu">
                    <li class="text-center">
                        <img src="assets/img/find_user.png" class="user-image img-responsive" />
                    </li>
                    <li>
                        <a class="active-menu" href="addanswer.php"><i class="fa fa-edit fa-3x"></i> Forms </a>
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
                        <title>Answer Display</title>
                    </div>
                    <!-- /. ROW  -->
                    <hr />
                    <div class="row">
                        <div class="col-md-12">
                            <!-- Form Elements -->
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    Form Element Examples
                                </div>
                                <div class="panel-body">
                                    <div id="error">
                                        <?php echo $error; ?>
                                    </div>
                                    <?php if (isset($_POST['idAnswer'])) : ?>
                                        <form action="" method="POST" id="form">
                                            <!-- Your form fields go here -->
                                            <div class="form-group">
                                                <label for="idAnswer" style="display: none;">Id Answer:</label>
                                                <input type="text" id="idAnswer" name="idAnswer" value="<?php echo $_POST['idAnswer'] ?>" readonly style="display: none;" />
                                                <span id="erreurIdAnswer" style="color: red"></span>
                                            </div>
                                            <div class="form-group">
                                                <label for="title">Title:</label>
                                                <input type="text" id="title" name="title" value="<?php echo $answer['title'] ?>" />
                                                <span id="erreurTitle" style="color: red"><?php echo $errors['title']; ?></span>
                                            </div>
                                            <div class="form-group">
                                                <label for="content">Content:</label>
                                                <input type="text" id="content" name="content" value="<?php echo $answer['content'] ?>" />
                                                <span id="erreurContent" style="color: red"><?php echo $errors['content']; ?></span>
                                            </div>
                                            <div class="form-group">
                                                <label for="category">Category:</label>
                                                <select id="category" name="category" required>
                                                    <option value="" selected disabled>Select a category</option>
                                                    <?php foreach ($categories as $cat) : ?>
                                                        <option value="<?php echo $cat; ?>" <?php echo ($cat == $answer['category']) ? 'selected' : ''; ?>><?php echo $cat; ?></option>
                                                    <?php endforeach; ?>
                                                </select>
                                                <span id="erreurCategory" style="color: red"><?php echo $errors['category']; ?></span>
                                            </div>
                                            <div class="form-group">
                                                <input type="submit" value="Save" class="btn btn-primary" />
                                                <a href="/web/View/admin/ui.php" class="btn btn-info">Back to list</a>
                                            </div>
                                        </form>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>
                    </div>
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
