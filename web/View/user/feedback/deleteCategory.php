<?php
// Check if categoryId is set in the URL
include '../../../Controller/feedback/CategoryC.php';
if (isset($_GET['categoryId'])) {
    $categoryId = $_GET['categoryId'];

    
    // Create an instance of CategoryC
    $categoryController = new CategoryC();

    // Call the deleteCategory method to delete the category
    if ($categoryController->deleteCategory($categoryId)) {
        header("Location: /carvilla-v1.0/View/admin/ui.php#reply");
    } else {
        echo "Error deleting category.";
    }
} else {
    echo "Invalid request. Category ID not provided.";
}
?>
