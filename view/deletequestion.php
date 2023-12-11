<?php
include '../Controller/questionC.php'; // Update the path to QuestionC
$questionC = new QuestionC(); // Update the class name to QuestionC
$questionC->deletequestion($_GET["id"]); // Update the method to deleteQuestion
header('Location:listquestion.php'); // Update the redirect path
?>