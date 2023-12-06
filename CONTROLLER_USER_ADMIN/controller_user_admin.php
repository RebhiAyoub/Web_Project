<?php
require '../config.php';

class controller_user_admin
{
    public function ListUsers()
    {
        $sql="SELECT * FROM user_admin";
        $db=config::getConnexion();
        try
        {
            $list=$db->query($sql);
            return $list;

        }
        catch(Exception $e)
        {
            die('error:'. $e->getMessage());
        }
    }

    public function getPaginatedUsers($currentPage, $perPage = 10)
    {
        $sql = "SELECT * FROM user_admin";
        $db = config::getConnexion();

        try {
            $query = $db->prepare($sql);
            $query->execute();

            $com = $query->rowCount();
        } catch (Exception $e) {
            die('Error: ' . $e->getMessage());
        }

        $totalPages = ceil($com / $perPage);

        if ($currentPage < 1 || $currentPage > $totalPages) {
            $currentPage = 1;
        }

        $offset = ($currentPage - 1) * $perPage;

        $sql .= " LIMIT $offset, $perPage";

        try {
            $query = $db->prepare($sql);
            $query->execute();
            $result = $query->fetchAll();
            return ['data' => $result, 'currentPage' => $currentPage, 'totalPages' => $totalPages];
        } catch (Exception $e) {
            die('Error: ' . $e->getMessage());
        }
    }



    function delete_user($id_user) {
        $sql = "DELETE FROM user_admin WHERE id_user = :id_user"; // Update column name
        $db = config::getConnexion();
        $req = $db->prepare($sql);

        $req->bindValue(':id_user', $id_user); // Update binding parameter
    
        try {
            $req->execute();
        } catch (PDOException $e) {
            // Log the error or handle it gracefully
            die('Error:' . $e->getMessage());
        }
    }
    function add_user($userN)
    {
        $sql = "INSERT INTO user_admin VALUES (:id_user, :first_name, :last_name, :email, :date_of_birth, :password, :role, :status)";
        $db = config::getConnexion();
        try {
            $query = $db->prepare($sql);
            $query->execute([
                'id_user' =>$userN->getId(),
                'first_name' => $userN->getFirstname(),
                'last_name' => $userN->getLastname(),
                'email' => $userN->getEmail(),
                'date_of_birth' => $userN->getDate_of_Birth(),
                'password' =>$userN->getPassword(),
                'role'=>$userN->getrole(),
                'status'=>$userN->getStatus(),
            ]);
        } catch (PDOException $e) {
            die('Error:' . $e->getMessage());   
        }
    }
    function log_in($email, $password)
    {
    $sql = "SELECT * FROM user_admin WHERE email = :email and password = :password";
    $db = config::getConnexion();
    $stmt = $db->prepare($sql);
    $stmt->bindParam(':email', $email);
    $stmt->bindParam(':password', $password);
    $stmt->execute();
    $user = $stmt->fetch(PDO::FETCH_ASSOC);
    return $user;
    }
    function get_user($email)
    {
        $sql="SELECT * FROM user_admin where email=:email";
        $db=config::getConnexion();
        $stmt = $db->prepare($sql);
        $stmt->bindParam(':email', $email);
        try
        {
            $stmt->execute();
            $user = $stmt->fetch(PDO::FETCH_ASSOC);
            return $user;

        }
        catch(Exception $e)
        {
            die('error:'. $e->getMessage());
        }
    }
    function update_user($user)
    {
        try {
            $db = config::getConnexion();
            $query = $db->prepare('UPDATE user_admin 
                                SET first_name = :first_name, 
                                    last_name = :last_name, 
                                    email = :email, 
                                    date_of_birth = :date_of_birth,
                                    password = :password
                                WHERE id_user = :id_user');

            $query->bindParam(':id_user', $user->getId());
            $query->bindParam(':first_name', $user->getFirstname());
            $query->bindParam(':last_name', $user->getLastname());
            $query->bindParam(':email', $user->getEmail());
            $query->bindParam(':date_of_birth', $user->getDate_of_Birth());
            $query->bindParam(':password', $user->getPassword());

            $query->execute();

            // Check if any rows were affected
            if ($query->rowCount() > 0) {
                echo $query->rowCount() . " records updated successfully";
            } else {
                echo "No records updated";
            }
        } catch (PDOException $e) {
            echo "Error updating user: " . $e->getMessage();
        }
    }
    public function unbanUser($id)
    {
        $sql = "UPDATE user_admin SET status = 1 WHERE id_user = :id";
        $db = config::getConnexion();
        try {
            $query = $db->prepare($sql);
            $query->execute([
                'id' => $id
            ]);
        } catch (Exception $e) {
            die("ERROR: " . $e->getMessage());
        }
    }

    

}
?>