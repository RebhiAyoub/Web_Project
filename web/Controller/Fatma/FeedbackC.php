<?php

include_once 'CycleC.php';

class FeedbackC
{

function listFeedbacks()
    {
        $sql = "SELECT * FROM feedbackk";
        $db = config::getConnexion();
        try {
            $liste = $db->query($sql);
            return $liste;
        } catch (Exception $e) {
            die('Error:' . $e->getMessage());
        }
    }

   

function create($feedback)
{
        $sql = "INSERT INTO feedbackk VALUES (NULL, :feed)";
        
        $db = config::getConnexion();
        try {
            $query = $db->prepare($sql);
            $query->execute([
                'feed' => $ovulation->getFeed(),
            ]);
        
        } catch (Exception $e) {
            echo 'Error: ' . $e->getMessage();
        }
        

}

function showFeedbacks($idUser)
    {
        $sql = "SELECT * from feedbackk where idUser = $idUser";
        $db = config::getConnexion();
        try {
            $query = $db->prepare($sql);
            $query->execute();
            $ovulation = $query->fetch();
            return $ovulation;
        } catch (Exception $e) {
            die('Error: ' . $e->getMessage());
        }
    }

    function deleteOvulations($id)
    {
        $sql = "DELETE FROM user2 WHERE idUser = :id";
        $db = config::getConnexion();
        $req = $db->prepare($sql);
        $req->bindValue(':id', $id);

        try {
            $req->execute();
        } catch (Exception $e) {
            die('Error:' . $e->getMessage());
        }
    }

    
    function editOvulation($ovulation, $idUser)
    {   
        $db = config::getConnexion();
        $sql='UPDATE user2 
        SET firstDayOfLMP= :firstDayOfLMP, averageCycleLength = :averageCycleLength, ovulationDate = :ovulationDate
        WHERE idUser= :idUser';
            
        try {
            
            $query = $db->prepare($sql);
            $query->execute([
                'idUser' => $idUser,
                'firstDayOfLMP' => $ovulation->getfirstDayOfLMP(),
                'averageCycleLength' => $ovulation->getaverageCycleLength(),
                'ovulationDate' => $ovulation->getovulationDate()
            ]);
            
            echo $query->rowCount() . " records UPDATED successfully <br>";
        } catch (PDOException $e) {
            $e->getMessage();
        }
    }
}