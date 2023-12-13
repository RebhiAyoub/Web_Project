<?php
// Include the FeedbackC.php controller
include 'C:\xampp\htdocs\FEEDBACK\controller\FeedbackC.php';

// Check if feedbackId is provided in the query string
$feedbackId = isset($_GET['feedbackId']) ? $_GET['feedbackId'] : null;

if ($feedbackId !== null) {
    // Create an instance of FeedbackC
    $feedbackController = new FeedbackC();

    // Call the deleteFeedback method
    $result = $feedbackController->deleteFeedback($feedbackId);
    header("Location: index.php?page=" . $_GET['page'] . '#feedback-area');
    exit(); // Ensure that no further code is executed after the redirect

    // Display the result to the user
    echo $result;
} else {
    // If feedbackId is not provided in the query string, redirect or display an error message
    header("Location: index.php?page=" . $_GET['page'] . '#feedback-area');
    exit(); // Ensure that no further code is executed after the redirect
}
?>

