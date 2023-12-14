<?php
// Include the necessary files and classes
include 'F/ReplyC.php';

// Check if idReply and editedReply are provided in the form
$idReply = isset($_POST['idReply']) ? $_POST['idReply'] : null;
$editedReply = isset($_POST['editedReply']) ? $_POST['editedReply'] : '';

// Create an instance of ReplyC
$replyController = new ReplyC();

// Check if the form is submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Call the editReply method
    try {
        $result = $replyController->editReply($idReply, $editedReply);
        // Get the page information from the form data or use a default value
        $page = isset($_POST['page']) ? $_POST['page'] : 1;
        // Redirect to admin.php with the page information
        header('Location: /web/View/admin/ui.php#reply?page=' . $page);
        // Ensure that no further code is executed after the redirect
        exit();
    } catch (Exception $e) {
        // Handle the error, e.g., log it or display a user-friendly message
        echo 'Error editing reply: ' . $e->getMessage();
    }
}
?>
