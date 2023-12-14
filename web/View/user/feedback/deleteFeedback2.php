<?php
// Include the FeedbackC.php controller

include '../../../Controller/feedback/FeedbackC.php';

$feedbackController = new FeedbackC();
$feedbackData = $feedbackController->showFeedback();

usort($feedbackData, function($a, $b) {
    return strtotime($b['timestamp_column']) - strtotime($a['timestamp_column']);
});

$lastFeedback = reset($feedbackData); // Get the first element after sorting

$feedbackId=$lastFeedback['idFeedback'];

if ($feedbackId !== null) {
    $result = $feedbackController->deleteFeedback($feedbackId);
    header("Location: /carvilla-v1.0/View/user/index.php");
    exit(); // Ensure that no further code is executed after the redirect


} else {
    // If feedbackId is not provided in the query string, redirect or display an error message
    header("Location: /carvilla-v1.0/View/user/index.php");
    exit(); // Ensure that no further code is executed after the redirect
}
?>

