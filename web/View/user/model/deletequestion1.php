<?php
include '/Applications/XAMPP/xamppfiles/htdocs/carvilla-v1.0/Controller/Forum/questionC.php';
$questionC = new QuestionC(); // Update the class name to QuestionC
$questionC->deletequestion($_GET["id"]); // Update the method to deleteQuestion
header('Location:/carvilla-v1.0/View/user/model/Forum.php'); // Update the redirect path
?>