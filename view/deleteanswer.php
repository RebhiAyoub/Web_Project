

<?php
include '../Controller/answerC.php'; // Update the path to QuestionC
$questionC = new AnswerC(); // Update the class name to QuestionC
$questionC->deleteAnswer($_GET["id"]); // Update the method to deleteQuestion
header('Location:listanswer.php'); // Update the redirect path
?>