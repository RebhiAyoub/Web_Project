<?php
include '../../Controller/Forum/questionC.php';
$questionC = new QuestionC(); // Update the class name to QuestionC
$questionC->deletequestion($_GET["id"]); // Update the method to deleteQuestion
header('Location:/web/View/user/Forum.php'); // Update the redirect path
?>