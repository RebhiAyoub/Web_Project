<?php
// Include the FeedbackC.php controller
include 'C:\xampp\htdocs\FEEDBACK\controller\FeedbackC.php';


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Get user inputs
    $idUser = isset($_POST['idUser']) ? $_POST['idUser'] : null;
    $rating = isset($_POST['rating']) ? $_POST['rating'] : null;
    $comment = isset($_POST['comment']) ? $_POST['comment'] : null;
    $categoryName = isset($_POST['category']) ? $_POST['category'] : null; // Use nameCategory

    // Create an instance of FeedbackC
    $feedbackController = new FeedbackC();

    // Call the addFeedback method to add feedback
    $result = $feedbackController->addFeedback($idUser, $rating, $comment, $categoryName); // Pass category name
    header("Location: index.php?page=" . $currentPage . '#feedback-area');
    exit();

    // Display the result to the user
    echo $result;
} else {
    // If the form is not submitted via POST, redirect or display an error message
    echo "Invalid request!";
}

?>
