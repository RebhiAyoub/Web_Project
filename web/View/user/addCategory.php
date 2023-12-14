<?php
// Include the CategoryC.php controller
include '../../../Controller/feedback/CategoryC.php';

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Create an instance of CategoryC
    $categoryController = new CategoryC();

    // Get category name from the form
    $categoryName = $_POST['categoryName'];

    // Call the addCategory method to add a new category
    $categoryController->addCategory($categoryName);

    // Redirect to admin.php after adding the category
    header("Location: /carvilla-v1.0/View/admin/ui.php#category");
    exit();
}
?>
