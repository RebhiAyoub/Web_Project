<?php

// Include the ReplyC.php controller
include 'F/ReplyC.php';

// Check if idReply is provided in the query string
$idReply = isset($_GET['idReply']) ? $_GET['idReply'] : null;
$page = isset($_GET['page']) ? $_GET['page'] : 1; // Change this line to get the page information from your query string

if ($idReply !== null) {
    // Create an instance of ReplyC
    $replyController = new ReplyC();

    // Call the deleteReply method
    $result = $replyController->deleteReply($idReply);

    // Redirect to admin.php with the page information
    header('Location: /web/View/admin/ui.php#reply?page=' . $page);
    exit; // Ensure that no further code is executed after the redirect
} else {
    // If idReply is not provided in the query string, redirect or display an error message
    echo 'Error: idReply not provided.';
}
?>
