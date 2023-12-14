<?php

include_once '../Model/Reply.php';
include_once '../configg.php';


class ReplyC
{
    public function replyFeedback($idFeedback, $adminReply)
    {
        try {
            $db = config::getConnexion();

            // Assuming you have a table named 'reply' in your database
            $sql = "INSERT INTO reply (idFeedback, adminReply) VALUES (:idFeedback, :adminReply)";
            $query = $db->prepare($sql);
            $query->execute([
                'idFeedback' => $idFeedback,
                'adminReply' => $adminReply,
            ]);

            return "Reply added successfully!";
        } catch (Exception $e) {
            return 'Error adding reply: ' . $e->getMessage();
        }
    }
    public function showReplies($idFeedback)
    {
        try {
            $db = config::getConnexion();

            // Assuming you have a table named 'reply' in your database
            $sql = "SELECT * FROM reply WHERE idFeedback = :idFeedback";
            $query = $db->prepare($sql);
            $query->bindParam(':idFeedback', $idFeedback);
            $query->execute();

            // Fetch all replies
            $replies = $query->fetchAll(PDO::FETCH_ASSOC);

            return $replies;
        } catch (Exception $e) {
            // Handle the error, e.g., log it or display a user-friendly message
            return [];
        }
    }
    public function deleteReply($idReply)
    {
        try {
            $pdo = Config::getConnexion();

            // Assuming you have a table named 'reply' in your database
            $sql = "DELETE FROM reply WHERE idReply = ?";
            $query = $pdo->prepare($sql);
            $query->bindParam(1, $idReply);
            $query->execute();

            return "Reply deleted successfully!";
        } catch (Exception $e) {
            return 'Error deleting reply: ' . $e->getMessage();
        }
    }
    public function editReply($idReply, $editedReply)
    {
        try {
            $db = config::getConnexion();

            // Assuming you have a table named 'reply' in your database
            $sql = "UPDATE reply SET adminReply = :editedReply WHERE idReply = :idReply";
            $query = $db->prepare($sql);
            $query->execute([
                'idReply' => $idReply,
                'editedReply' => $editedReply,
            ]);

            return "Reply edited successfully!";
        } catch (Exception $e) {
            return 'Error editing reply: ' . $e->getMessage();
        }
    }
}


    


?>
