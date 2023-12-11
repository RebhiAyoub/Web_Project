<?php

require '../config.php';

class AnswerC
{
   
    
   
    public function listAnswers()
    {
        $sql = "SELECT * FROM answer";
        $db = config::getConnexion();
        try {
            $liste = $db->query($sql);
            return $liste;
        } catch (Exception $e) {
            die('Error:' . $e->getMessage());
        }
    }

    public function deleteAnswer($id)
    {
        $sql = "DELETE FROM answer WHERE id_answer = :id";
        $db = config::getConnexion();
        $req = $db->prepare($sql);
        $req->bindValue(':id', $id, PDO::PARAM_INT);

        try {
            $req->execute();
        } catch (Exception $e) {
            die('Error:' . $e->getMessage());
        }
    }

    public function addAnswer($answer)
    {
        $sql = "INSERT INTO answer (title, content, category, id_question)  
                VALUES (:title, :content, :category, :id_question)";
        $db = config::getConnexion();
        try {
            $query = $db->prepare($sql);
            $query->execute([
                'title' => $answer->getTitle(),
                'content' => $answer->getContent(),
                'category' => $answer->getCategory(),
                'id_question' => $answer->getIdQuestion(),
            ]);
        } catch (Exception $e) {
            echo 'Error: ' . $e->getMessage();
        }
    }

    public function showAnswer($id)
    {
        $sql = "SELECT * FROM answer WHERE id_answer = :id";
        $db = config::getConnexion();
        try {
            $query = $db->prepare($sql);
            $query->bindValue(':id', $id, PDO::PARAM_INT);
            $query->execute();
            $answer = $query->fetch();
            return $answer;
        } catch (Exception $e) {
            die('Error: ' . $e->getMessage());
        }
    }

    public function updateAnswer($answer, $id)
    {
        try {
            $db = config::getConnexion();
            $query = $db->prepare(
                'UPDATE answer SET 
                    title = :title, 
                    content = :content, 
                    category = :category,
                    id_question = :id_question
                WHERE id_answer = :idAnswer'
            );

            $query->execute([
                'idAnswer' => $id,
                'title' => $answer->getTitle(),
                'content' => $answer->getContent(),
                'category' => $answer->getCategory(),
                'id_question' => $answer->getIdQuestion(),
            ]);

            echo $query->rowCount() . " records UPDATED successfully <br>";
        } catch (PDOException $e) {
            echo 'Error: ' . $e->getMessage();
        }
 
    }

    
        

}