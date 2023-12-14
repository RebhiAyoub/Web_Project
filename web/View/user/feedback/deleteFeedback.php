<?php
// Include the FeedbackC.php controller
include '../../../Controller/feedback/FeedbackC.php';

// Check if feedbackId is provided in the query string
$feedbackId = isset($_GET['feedbackId']) ? $_GET['feedbackId'] : null;

if ($feedbackId !== null) {
    // Create an instance of FeedbackC
    $feedbackController = new FeedbackC();

    // Call the deleteFeedback method
    $result = $feedbackController->deleteFeedback($feedbackId);
    header("Location: /PROJECT_F/carvilla-v1.0/View/user/index.php");
    exit(); // Ensure that no further code is executed after the redirect

    // Display the result to the user
    echo $result;
} else {
    // If feedbackId is not provided in the query string, redirect or display an error message
    header("Location: /PROJECT_F/carvilla-v1.0/View/user/index.php");
    exit(); // Ensure that no further code is executed after the redirect
}
?>

