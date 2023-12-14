<?php
// Check if categoryId is set in the URL
include 'F/CategoryC.php';
if (isset($_GET['categoryId'])) {
    $categoryId = $_GET['categoryId'];

    
    // Create an instance of CategoryC
    $categoryController = new CategoryC();

    // Call the deleteCategory method to delete the category
    if ($categoryController->deleteCategory($categoryId)) {
        header("Location: /web/View/admin/ui.php#reply");
    } else {
        echo "Error deleting category.";
    }
} else {
    echo "Invalid request. Category ID not provided.";
}
?>
