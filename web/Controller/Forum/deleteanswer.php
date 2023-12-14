

<?php
include 'answerC.php';
$questionC = new AnswerC(); // Update the class name to QuestionC
$questionC->deleteAnswer($_GET["id"]); // Update the method to deleteQuestion
header('Location:/web/View/admin/ui.php#answer'); // Update the redirect path
?>