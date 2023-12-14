<?php

include '../../Model/Feedback.php';
include '../../configg.php';

class FeedbackC
{
    public function getFeedbackById($idFeedback) {
        $db = config::getConnexion();
    
        $sql = "SELECT feedback.*, category.nameCategory 
                FROM feedback 
                JOIN category ON feedback.CategoryID = category.CategoryID 
                WHERE feedback.idFeedback = :idFeedback";
    
        $query = $db->prepare($sql);
        $query->execute(['idFeedback' => $idFeedback]);
    
        return $query->fetch(PDO::FETCH_ASSOC);
    }
    

    public function addFeedback($idUser, $rating, $comment, $categoryName)
    {
        $pdo = Config::getConnexion();

        // Check if the specified categoryName exists in the category table
        $categoryCheckStmt = $pdo->prepare("SELECT CategoryID FROM category WHERE nameCategory = ?");
        $categoryCheckStmt->bindParam(1, $categoryName);
        $categoryCheckStmt->execute();

        $categoryID = $categoryCheckStmt->fetchColumn();

        if ($categoryID !== false) {
            // The category exists, proceed with the insert
            $sql = "INSERT INTO feedback (idUser, Rating, Comment, CategoryID, timestamp_column) 
                    VALUES (:idUser, :rating, :comment, :categoryID, NOW())";

            try {
                $query = $pdo->prepare($sql);
                $query->bindParam(':idUser', $idUser);
                $query->bindParam(':rating', $rating);
                $query->bindParam(':comment', $comment);
                $query->bindParam(':categoryID', $categoryID);
                $query->execute();

                //return "Feedback added successfully";
            } catch (Exception $e) {
                return 'Error: ' . $e->getMessage();
            }
        } else {
            return "Error: Invalid CategoryName";
        }
    }
    public function showFeedback()
    {
        $db = config::getConnexion();
        $sql = "SELECT feedback.*, category.nameCategory
                FROM feedback
                JOIN category ON feedback.CategoryID = category.CategoryID";
        $query = $db->prepare($sql);
        $query->execute();
        return $query->fetchAll(PDO::FETCH_ASSOC);
    }
    
    public function deleteFeedback($feedbackId)
    {
        $db = config::getConnexion();
        try {
            $sql = "DELETE FROM feedback WHERE idFeedback = :idFeedback";
            $query = $db->prepare($sql);
            $query->execute(['idFeedback' => $feedbackId]);
            //return "Feedback deleted successfully!";
        } catch (Exception $e) {
            return 'Error: ' . $e->getMessage();
        }
    }
    public function updateFeedback($feedbackId, $idUser, $rating, $comment, $categoryName)
    {
        $pdo = Config::getConnexion();
    
        // Check if the specified categoryName exists in the category table
        $categoryCheckStmt = $pdo->prepare("SELECT CategoryID FROM category WHERE nameCategory = ?");
        $categoryCheckStmt->bindParam(1, $categoryName);
        $categoryCheckStmt->execute();
    
        $categoryID = $categoryCheckStmt->fetchColumn();
    
        if ($categoryID !== false) {
            // The category exists, proceed with the update
            $sql = "UPDATE feedback 
                    SET idUser = :idUser, Rating = :rating, Comment = :comment, CategoryID = :categoryID, timestamp_column = NOW() 
                    WHERE idFeedback = :feedbackId";
    
            try {
                $query = $pdo->prepare($sql);
                $query->bindParam(':feedbackId', $feedbackId);
                $query->bindParam(':idUser', $idUser);
                $query->bindParam(':rating', $rating);
                $query->bindParam(':comment', $comment);
                $query->bindParam(':categoryID', $categoryID);
                $query->execute();
    
                return "Feedback updated successfully";
            } catch (Exception $e) {
                return 'Error: ' . $e->getMessage();
            }
        } else {
            return "Error: Invalid CategoryName";
        }
    }
    public function getLastFeedback() {
            try {

                $db = Config::getConnexion();
                // Query to retrieve the last feedback based on timestamp_column
                $sql = "SELECT * FROM feedback ORDER BY timestamp_column DESC LIMIT 1";
                $stmt = $db->query($sql);

                // Fetch the result as an associative array
                $lastFeedback = $stmt->fetch(PDO::FETCH_ASSOC);

                return $lastFeedback;
            } catch (PDOException $e) {
                // Handle database connection or query errors
                echo "Error: " . $e->getMessage();
                return null;
            }
        }
    
    
}
?>
