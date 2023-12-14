<?php

require 'config.php';

class CycleC
{

    public function listcycles()
    {
        $sql = "SELECT * FROM user1";
        $db = config::getConnexion();
        try {
            $liste = $db->query($sql);
            return $liste;
        } catch (Exception $e) {
            die('Error:' . $e->getMessage());
        }
    }

    function delete($idUser)
    {
        $sql = "DELETE FROM user1 WHERE idUser = :idUser";
        $db = config::getConnexion();
        $req = $db->prepare($sql);
        $req->bindValue(':idUser', $idUser);

        try {
            $req->execute();
        } catch (Exception $e) {
            die('Error:' . $e->getMessage());
        }
    }

    function create($cycle)
    {
        $sql = "INSERT INTO user1  
        VALUES (NULL, :currentPeriodDate,:previousPeriodDate, :menstrualCycleLength)";
        $db = config::getConnexion();
        try {
            $query = $db->prepare($sql);
            $query->execute([
                'currentPeriodDate' => $cycle->getcurrentPeriodDate(),
                'previousPeriodDate' => $cycle->getpreviousPeriodDate(),
                'menstrualCycleLength' => $cycle->getmenstrualCycleLength(),
                
            ]);
        } catch (Exception $e) {
            echo 'Error: ' . $e->getMessage();
        }
    }

    function showcycles($idUser)
    {
        $sql = "SELECT * from user1 where idUser = $idUser";
        $db = config::getConnexion();
        try {
            $query = $db->prepare($sql);
            $query->execute();
            $cycle = $query->fetch();
            return $cycle;
        } catch (Exception $e) {
            die('Error: ' . $e->getMessage());
        }
    }
    function edit($cycle, $idUser)
    {   
        
        $db = config::getConnexion();
        $sql='UPDATE user1 
            SET currentPeriodDate = :currentPeriodDate, previousPeriodDate = :previousPeriodDate, menstrualCycleLength = :menstrualCycleLength
            WHERE idUser= :idUser ';
        try {
            $query = $db->prepare($sql);
            
            
            $query->execute([
                'idUser' => $idUser,
                'currentPeriodDate' => $cycle->getcurrentPeriodDate(),
                'previousPeriodDate' => $cycle->getpreviousPeriodDate(),
                'menstrualCycleLength' => $cycle->getmenstrualCycleLength(),
                
            ]);
            
            echo $query->rowCount() . " records UPDATED successfully <br>";
        } catch (PDOException $e) {
            $e->getMessage();
        }
    }
}

