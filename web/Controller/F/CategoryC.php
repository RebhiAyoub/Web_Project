<?php

include '../Model/Category.php';
include '../configg.php';

class CategoryC {

    private $pdo;

    public function __construct() {
        $this->pdo = config::GetConnexion();
    }

    
    
    // Function to add a new category
    public function addCategory($nameCategory) {
        try {
           
            $config = new config();

           
            $conn = $config->GetConnexion();

            
            $stmt = $conn->prepare("INSERT INTO category (nameCategory) VALUES (:nameCategory)");

            
            $stmt->bindParam(':nameCategory', $nameCategory);

        
            $stmt->execute();

            
            return true;
        } catch (PDOException $e) {
           
            return false;
        }
    }
    public function showCategories()
    {
        try {
            // Get the database connection from the config file
            $pdo = Config::getConnexion(); // Adjust this according to your configuration

            $query = "SELECT * FROM category";
            $stmt = $pdo->query($query);
            $categories = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $categories;
        } catch (PDOException $e) {
            // Handle the exception (you might want to log it or show an error message)
            echo "Error: " . $e->getMessage();
            return [];
        }
    }
    public function deleteCategory($categoryId)
    {
        try {
            $stmt = $this->pdo->prepare("DELETE FROM category WHERE CategoryID = ?");
            $stmt->execute([$categoryId]);

            // Check if any row was affected
            if ($stmt->rowCount() > 0) {
                return true; // Category deleted successfully
            } else {
                return false; // Category not found or not deleted
            }
        } catch (PDOException $e) {
            die('Error: ' . $e->getMessage());
        }
    }

}

?>
