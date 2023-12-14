<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
// Include the FeedbackC.php controller
include '../../Controller/FeedbackC.php';

// Check if feedbackId is provided in the query string
$feedbackController = new FeedbackC();
$feedbackData = $feedbackController->showFeedback();

usort($feedbackData, function($a, $b) {
    return strtotime($b['timestamp_column']) - strtotime($a['timestamp_column']);
});

$lastFeedback = reset($feedbackData); // Get the first element after sorting

$feedbackId=$lastFeedback['idFeedback'];
if ($feedbackId !== null) {
    // Create an instance of FeedbackC
    $feedbackController = new FeedbackC();

    // Call the deleteFeedback method
    $result = $feedbackController->deleteFeedback($feedbackId);
    header("Location: /web/View/user/index.php");
    exit(); // Ensure that no further code is executed after the redirect

    // Display the result to the user
    echo $result;
} else {
    // If feedbackId is not provided in the query string, redirect or display an error message
    //header("Location: /web/View/user/index.php");
    echo ("tttt");
    exit(); // Ensure that no further code is executed after the redirect
}
?>

