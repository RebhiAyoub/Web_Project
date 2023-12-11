<?php
$errors = [
    'title' => '',
    'content' => '',
    'category' => '',
];

include '../Controller/answerC.php';
include '../model/answer.php';

$answer = null;
$answerC = new AnswerC();


// Check if the form is submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $questionId = isset($_POST['id']) ? $_POST['id'] : null;
    var_dump($questionId);
    // Handle the form submission (add answer logic)
    $questionId = $_POST['id']; // Retrieve the question ID from the form
    $title = $_POST['title'];
    $content = $_POST['content'];
    $category = $_POST['category'];

    // Validate title
    if (empty($title)) {
        $errors['title'] = "Title should not be empty and should not contain special symbols.";
    }

    // Validate content
    if (empty($content)) {
        $errors['content'] = "Content should not be empty.";
    }

    // Validate category
    if (empty($category)) {
        $errors['category'] = "Category should not be empty.";
    }

    if (empty($errors['title']) && empty($errors['content']) && empty($errors['category'])) {
        $answer = new Answer(null, $title, $content, $category, $questionId);
        $answerC->addAnswer($answer);
        header("Location: listanswer.php?id=$questionId"); // Redirect back to the question page
        exit();
    }
}

// Display the form
$questionId = isset($_GET['id']) ? $_GET['id'] : null;
$categories = [
    'Contraception and Family Planning',
    'Menstrual Health',
    'Pregnancy and Childbirth',
    'Sexual Wellness',
    'Reproductive Health Conditions'
];
?>

<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
      <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Free Bootstrap Admin Template : Binary Admin</title>
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
                    <img src="assets/img/find_user.png" class="user-image img-responsive"/>
					</li>
				
				
                      
                    <li  >
                        <a class="active-menu"  href="view/addquestion.php"><i class="fa fa-edit fa-3x"></i> Forms </a>
                    </li>				
					
					                   	
                </ul>
               
            </div>
            
        </nav>  
        <!-- /. NAV SIDE  -->
        <!-- Modified Code Goes Here -->
        <div id="page-wrapper">
            <div id="page-inner">
                <!-- ... Other HTML code remains unchanged ... -->
            
                    <div class="col-md-12">
                     <h2>answer Page</h2>   
                       
                
                 <!-- /. ROW  -->
                 <hr />
               
                <div class="col-md-12">
                    <!-- Form Elements -->
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Form Element Examples
                        </div>
                <!-- Modified Form Code -->
                <h1 style="color: #FF69B4; text-align: center;">Give your Answer</h1>
                <p style="font-size: 14px; color: #666; margin-top: 10px; text-align: center;">Your answer gonna be helpful</p>

                <form action="" method="POST" id="form">

                <input type="hidden" name="id" value="<?= $questionId ?>">
                
                    <div class="form-group">
                        <label for="title">Title:</label>
                        <input type="text" id="title" name="title" required class="form-control" />
                        <p style='color: red;' id="titleError"><?php echo $errors['title']; ?></p>
                    </div>

                    <div class="form-group">
                        <label for="content">Content:</label>
                        <input type="text" id="content" name="content" required class="form-control" />
                        <p style='color: red;' id="contentError"><?php echo $errors['content']; ?></p>
                    </div>

                    <div class="form-group">
                        <label for="category">Category:</label>
                        <select id="category" name="category" required class="form-control">
                            <option value="" selected disabled>Select a category</option>
                            <?php foreach ($categories as $cat) : ?>
                                <option value="<?php echo $cat; ?>"><?php echo $cat; ?></option>
                            <?php endforeach; ?>
                        </select>
                        <p style='color: red;' id="categoryError"><?php echo $errors['category']; ?></p>
                    </div>

                    <div class="form-group">
                        <input type="submit" value="Save" class="btn btn-primary" />
                        <input type="reset" value="Reset" class="btn btn-default" />
                        <a href="listanswer.php" class="btn btn-info">Back to list</a>
                    </div>
                </form>
                <!-- End of Modified Form Code -->
                
            </div>
        </div>
        <!-- /. PAGE WRAPPER  -->
    </div>
    
    
   <!-- /. WRAPPER  -->
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