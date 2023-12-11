<?php
require_once 'C:\xampp\htdocs\FEEDBACK\controller\FeedbackC.php';
// Check if the form is submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Check if the operation is an update
    $operation = isset($_POST['operation']) ? $_POST['operation'] : '';

    if ($operation === 'update') {
        // Get the feedback data from the form
        $feedbackId = isset($_POST['feedbackId']) ? $_POST['feedbackId'] : '';
        $newRating = isset($_POST['rating']) ? $_POST['rating'] : '';
        $newCategory = isset($_POST['category']) ? $_POST['category'] : '';
        $newComment = isset($_POST['comment']) ? $_POST['comment'] : '';

        // Create an instance of FeedbackC
        $feedbackController = new FeedbackC();

        // Update the feedback data
        $feedbackController->updateFeedback($feedbackId, $newRating, $newCategory, $newComment);

        // Redirect to index.php after updating
        header('Location: index.php#clients-say');
        exit();
    }
}

// If not a valid POST request, redirect to index.php
header('Location: index.php');
exit();
?>