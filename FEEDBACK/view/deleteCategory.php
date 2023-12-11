<?php
// Check if categoryId is set in the URL
require_once 'C:\xampp\htdocs\FEEDBACK\controller\CategoryC.php';
if (isset($_GET['categoryId'])) {
    $categoryId = $_GET['categoryId'];

    // Include the CategoryC.php controller
    require_once 'C:\xampp\htdocs\FEEDBACK\controller\CategoryC.php';

    // Create an instance of CategoryC
    $categoryController = new CategoryC();

    // Call the deleteCategory method to delete the category
    if ($categoryController->deleteCategory($categoryId)) {
        header("Location: admin.php");
    } else {
        echo "Error deleting category.";
    }
} else {
    echo "Invalid request. Category ID not provided.";
}
?>
