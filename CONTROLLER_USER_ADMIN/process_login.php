<?php
// Include the file with your log_in function and database connection
require_once 'controller_user_admin.php';

// Check if the form is submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Get the user input from the form
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Create an instance of the controller_user_admin class
    $controller = new controller_user_admin();

    // Call the log_in function
    $controller->log_in($email, $password);
} else {
    // Redirect back to the login form if someone tries to access this file directly
    echo "error";
}
?>
