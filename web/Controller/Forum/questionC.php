<?php

include '../../configg.php';

class QuestionC
{


    public function listAnswersForQuestion($questionId)
    {
        $sql = "SELECT * FROM answer WHERE id_question = :questionId";
        $db = config::getConnexion();
        $query = $db->prepare($sql);
        $query->bindValue(':questionId', $questionId, PDO::PARAM_INT);

        try {
            $query->execute();
            return $query->fetchAll(PDO::FETCH_ASSOC);
        } catch (Exception $e) {
            die('Error:' . $e->getMessage());
        }
    }

    
        public function afficheanswers($id_answer) {
            try {
                $pdo = config::getConnexion();
                $query = $pdo->prepare("SELECT * FROM answer WHERE question = :id");
                $query->execute(['id' => $id_answer]);
                return $query->fetchAll();
            } catch (PDOException $e) {
                echo $e->getMessage();
            }
        }
    
        public function affichequestions() {
            try {
                $pdo = config::getConnexion();
                $query = $pdo->prepare("SELECT * FROM question");
                $query->execute();
                return $query->fetchAll();
            } catch (PDOException $e) {
                echo $e->getMessage();
            }
        }
      




    public function listQuestions()
    {
        $sql = "SELECT * FROM question";
        $db = config::getConnexion();
        try {
            $liste = $db->query($sql);
            return $liste;
        } catch (Exception $e) {
            die('Error:' . $e->getMessage());
        }
    }

    function deleteQuestion($id)
    {
        $sql = "DELETE FROM question WHERE id = :id";
        $db = config::getConnexion();
        $req = $db->prepare($sql);
        $req->bindValue(':id', $id);

        try {
            $req->execute();
        } catch (Exception $e) {
            die('Error:' . $e->getMessage());
        }
    }

    function addQuestion($question)
{
    $sql = "INSERT INTO question (title, content, category) VALUES (:title, :content, :category)";
    $db = config::getConnexion();

    try {
        $query = $db->prepare($sql);
        $query->execute([
            'title' => $question->getTitle(),
            'content' => $question->getContent(),
            'category' => $question->getCategory(),
        ]);

        // Get the last inserted ID
        $lastInsertedId = $db->lastInsertId();

        echo "Question added successfully with ID: $lastInsertedId <br>";
    } catch (PDOException $e) {
        // Log the error to a file or output for debugging
        error_log('Error adding question: ' . $e->getMessage(), 0);

        // Echo a user-friendly error message
        echo 'An error occurred while adding the question. Please try again.';
    }
}

    

    function showQuestion($id)
    {
        $sql = "SELECT * from question where id = $id";
        $db = config::getConnexion();
        try {
            $query = $db->prepare($sql);
            $query->execute();
            $question = $query->fetch();
            return $question;
        } catch (Exception $e) {
            die('Error: ' . $e->getMessage());
        }
    }

    function updateQuestion($question, $id)
    {
        try {
            $db = config::getConnexion();
            $query = $db->prepare(
                'UPDATE question SET 
                    title = :title, 
                    content = :content, 
                    category = :category
                WHERE id= :idQuestion'
            );

            $query->execute([
                'idQuestion' => $id,
                'title' => $question->getTitle(),
                'content' => $question->getContent(),
                'category' => $question->getCategory(),
            ]);

            echo $query->rowCount() . " records UPDATED successfully <br>";
        } catch (PDOException $e) {
            $e->getMessage();
        }
    }



    public function trierCategory($order = 'ASC')
{
    $allowedOrders = ['ASC', 'DESC'];
    $order = strtoupper($order);

    if (!in_array($order, $allowedOrders)) {
        $order = 'ASC'; // Default to ascending order if an invalid order is provided
    }

    $sql = "SELECT * FROM question ORDER BY category $order";
    $db = config::getConnexion();
    
    try {
        $req = $db->query($sql);
        return $req;
    } catch (Exception $e) {
        die('Erreur: ' . $e->getMessage());
    }
}

    



   // In your QuestionC class

   public function searchQuestions($keyword)
   {
       $sql = "SELECT * FROM question WHERE 
               title LIKE :keyword OR 
               content LIKE :keyword OR 
               category LIKE :keyword";
   
       $db = config::getConnexion();
   
       try {
           $query = $db->prepare($sql);
           $query->bindValue(':keyword', '%' . $keyword . '%', PDO::PARAM_STR);
           $query->execute();
   
           $results = $query->fetchAll();
   
           // Highlight the matched keyword in the results
           foreach ($results as &$result) {
               $result['title'] = $this->highlightKeyword($result['title'], $keyword);
               $result['content'] = $this->highlightKeyword($result['content'], $keyword);
               $result['category'] = $this->highlightKeyword($result['category'], $keyword);
           }
   
           return $results;
       } catch (Exception $e) {
           die('Erreur: ' . $e->getMessage());
       }
   }
   
   // Add a helper method to highlight the keyword in a string
   private function highlightKeyword($text, $keyword)
   {
       // Case-insensitive replacement of the keyword with a colored version
       return preg_replace("/$keyword/i", '<span style="color: red;">$0</span>', $text);
   }
   


   
        // New method to get questions by category
    public function getQuestionsByCategory($category)
    {
        $sql = "SELECT * FROM question WHERE category = :category";
        $db = config::getConnexion();

        try {
            $query = $db->prepare($sql);
            $query->bindValue(':category', $category, PDO::PARAM_STR);
            $query->execute();

            return $query->fetchAll();
        } catch (Exception $e) {
            die('Error: ' . $e->getMessage());
        }
    }


}
