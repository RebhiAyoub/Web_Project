<?php
$errors = [
    'title' => '',
    'content' => '',
    'category' => '',
];

include 'questionC.php';
include '../../Model/question.php';

$question = null;
$questionC = new QuestionC();

$categories = [
    'Contraception and Family Planning',
    'Menstrual Health',
    'Pregnancy and Childbirth',
    'Sexual Wellness',
    'Reproductive Health Conditions'
];

if (
    isset($_POST["title"]) &&
    isset($_POST["content"]) &&
    isset($_POST["category"])
) {
    $title = $_POST['title'];
    $content = $_POST['content'];
    $category = $_POST['category'];

    // Validate title
    if (empty($title) || preg_match('/[!@#$%^&*(),.?":{}|<>]/', $title)) {
        $errors['title'] = "Title should not be empty and should not contain special symbols.";
    }

    // Validate content
    if (empty($content)) {
        $errors['content'] = "Content should not be empty.";
    } elseif (substr($content, -1) !== '?') {
        $errors['content'] = "Content must end with a question mark (?).";
    }

     // Validate category
     if (empty($category)) {
        $errors['category'] = "Category should not be empty.";
    } elseif (!in_array($category, $categories)) {
        $errors['category'] = "Invalid category selected.";
    }

    if (empty($errors['title']) && empty($errors['content']) && empty($errors['category'])) {
        $question = new Question(null, $title, $content, $category);
        $questionC->addQuestion($question);
        header('Location:listquestion.php');
    }
}



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
        <!-- Navigation and other HTML code remain unchanged -->
        
        <!-- Modified Code Goes Here -->
        <div id="page-wrapper">
            <div id="page-inner">
                <!-- ... Other HTML code remains unchanged ... -->

                <!-- Modified Form Code -->
                <h1 style="color: #FF69B4; text-align: center;">Ask Your Question</h1>
                <p style="font-size: 14px; color: #666; margin-top: 10px; text-align: center;">Your question will be anonymous.</p>

                <form action="" method="POST" id="form">
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
                        <a href="listquestion.php" class="btn btn-info">Back to list</a>
                    </div>
                </form>
                <!-- End of Modified Form Code -->
                
                <!-- ... Other HTML code remains unchanged ... -->
            </div>
        </div>
        <!-- /. PAGE WRAPPER  -->
    </div>
    <!-- /. WRAPPER  -->
    
    <!-- SCRIPTS -AT THE BOTOM TO REDUCE THE LOAD TIME-->
    <!-- ... Other script tags remain unchanged ... -->
</body>
</html>