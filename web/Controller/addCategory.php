<?php
// Include the CategoryC.php controller
include_once 'F/CategoryC.php';

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Create an instance of CategoryC
    $categoryController = new CategoryC();

    // Get category name from the form
    $categoryName = $_POST['categoryName'];

    // Call the addCategory method to add a new category
    $categoryController->addCategory($categoryName);

    // Redirect to admin.php after adding the category
    header("Location: /web/View/admin/ui.php#category");
    exit();
}
?>
