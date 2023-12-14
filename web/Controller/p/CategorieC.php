<?php 
require_once '../../Model/Categorie.php';
require_once '../../configg.php';
class CategorieC
{
    
    function getCategById($categ){
        $sql="SELECT * from categorie where idCategorie=$categ";
        $db = config::getConnexion();
        try{
            $query=$db->prepare($sql);
            $query->execute();

            $produit=$query->fetch();
            return $produit;
        }
        catch (Exception $e){
            die('Erreur: '.$e->getMessage());
        }
    }
    function getCategByNom($categ){
        $sql="SELECT * from categorie where nomCategorie=$categ";
        $db = config::getConnexion();
        try{
            $query=$db->prepare($sql);
            $query->execute();

            $produit=$query->fetch();
            return $produit;
        }
        catch (Exception $e){
            die('Erreur: '.$e->getMessage());
        }
    }
    function ajouterCategorie($Categorie)
    {
        $sql = "INSERT INTO categorie
        VALUES (NULL, :np)";
        $db = config::getConnexion();
        try {
            $query = $db->prepare($sql);
            $query->execute([
                'np' => $Categorie->getNomCategorie() 
            ]);
        } catch (Exception $e) {
            echo 'Error: ' . $e->getMessage();
        }
        
    }
    public function afficherCategorie()
    {
        $sql = "SELECT * FROM categorie";
        $db = config::getConnexion();
        try {
            $liste = $db->query($sql);
            return $liste;
        } catch (Exception $e) {
            die('Error:' . $e->getMessage());
        }
    }
    function supprimerCategorie($id)
    {
        $sql = "DELETE FROM categorie WHERE idCategorie= :id";
        $db = config::getConnexion();
        $req = $db->prepare($sql);
        $req->bindValue(':id', $id);

        try {
            $req->execute();
        } catch (Exception $e) {
            die('Error:' . $e->getMessage());
        }
    }
    

    function modifierCategorie($categorie, $id)
    {
            try {
                $db = config::getConnexion();
                $query = $db->prepare(
                    'UPDATE categorie SET 
                        nomCategorie = :nomCategorie
                    WHERE idCategorie = :idCategorie '
                );
                $query->execute([
                    'idCategorie' => $id,
                    'nomCategorie' => $categorie->getNomCategorie(),
                    
              
                ]);
                echo $query->rowCount() . " records UPDATED successfully <br>";
            } catch (PDOException $e) {
                $e->getMessage();
            }
        
    }
    
    function showCategorie($id)
    {
        $sql = "SELECT * from categorie where idCategorie = $id";
        $db = config::getConnexion();
        try {
            $query = $db->prepare($sql);
            $query->execute();

            $Categorie = $query->fetch();
            return $Categorie;
        } catch (Exception $e) {
            die('Error: ' . $e->getMessage());
        }
        }

        function showCom($libelle)
        {
            $sql = "SELECT * FROM categorie WHERE idCategorie LIKE '%" . $libelle . "%' OR nomCategorie LIKE '%" . $libelle . "%'";
            $db = config::getConnexion();
            try {
                $query = $db->prepare($sql);
                $query->execute();
       
                $com = $query->fetchAll();
                return $com;
            } catch (Exception $e) {
                die('Error: ' . $e->getMessage());
            }
        }
        function triercategorie()
        {
            $sql = "SELECT * from categorie ORDER BY idCategorie DESC";
            $db = config::getConnexion();
            try {
                $req = $db->query($sql);
                return $req;
            } 
            catch (Exception $e)
             {
                die('Erreur: ' . $e->getMessage());
            }
        
        
        
        }
        function triercategorie1()
        {
            $sql = "SELECT * from categorie ORDER BY idCategorie ASC";
            $db = config::getConnexion();
            try {
                $req = $db->query($sql);
                return $req;
            } 
            catch (Exception $e)
             {
                die('Erreur: ' . $e->getMessage());
            }
        
        
        
        }


    
}
