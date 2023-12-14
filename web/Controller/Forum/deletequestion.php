<?php
include 'questionC.php';
$questionC = new QuestionC(); // Update the class name to QuestionC
$questionC->deletequestion($_GET["id"]); // Update the method to deleteQuestion
header('Location:/web/View/admin/ui.php#question'); // Update the redirect path
?>