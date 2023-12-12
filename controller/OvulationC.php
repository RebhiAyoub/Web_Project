<?php

include_once '__DIR__/../../Controller/CycleC.php';

class OvulationC
{

function listovulations()
    {
        $sql = "SELECT * FROM user2";
        $db = config::getConnexion();
        try {
            $liste = $db->query($sql);
            return $liste;
        } catch (Exception $e) {
            die('Error:' . $e->getMessage());
        }
    }

   

function create($ovulation)
{
        $sql = "INSERT INTO user2 VALUES (NULL, :firstDayOfLMP,:averageCycleLength,:ovulationDate)";
        
        $db = config::getConnexion();
        try {
            $query = $db->prepare($sql);
            $query->execute([
                'firstDayOfLMP' => $ovulation->getfirstDayOfLMP(),
                'averageCycleLength' => $ovulation->getaverageCycleLength(),
                'ovulationDate' => $ovulation->getovulationDate(),
            ]);
        
        } catch (Exception $e) {
            echo 'Error: ' . $e->getMessage();
        }
        

}

function showovulations($idUser)
    {
        $sql = "SELECT * from user2 where idUser = $idUser";
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