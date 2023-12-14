<?php
// Include the necessary files and classes
include 'F/ReplyC.php';





// Create an instance of ReplyC
$replyController = new ReplyC();

// Check if the form is submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Get the admin's reply from the form
    $idFeedback = isset($_POST['idFeedback']) ? $_POST['idFeedback'] : null;

    $adminReply = isset($_POST['adminReply']) ? $_POST['adminReply'] : '';

    // Call the replyFeedback method
    try {
        $result = $replyController->replyFeedback($idFeedback, $adminReply);

        // Redirect back to the admin page with the current page parameter
        header('Location: /web/View/admin/ui.php#reply?page=' . $_GET['page'] . '#reply-form-' . $idFeedback);

        // Handle the result as needed
        echo $result;
    } catch (Exception $e) {
        // Handle the error, e.g., log it or display a user-friendly message
        echo 'Error replying to feedback: ' . $e->getMessage();
    }
}

?>

