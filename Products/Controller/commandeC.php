<?php
include '../Model/commande.php';

class CommandeC
{
    function affichercommande($idPlat){
        try{
            $pdo = config::getConnexion();
            $query = $pdo->prepare(
                'SELECT * FROM commande where panier = :id'
            );
            $query->execute([
                'id'  =>  $idPlat
             ]);
            return $query->fetchAll();
        }catch(PDOException $e){
            $e->getMessage();
        }

    }
    public function listCommandes()
    {
        $sql = "SELECT * FROM commande";
        $db = config::getConnexion();
        try {
            $liste = $db->query($sql);
            return $liste;
        } catch (Exception $e) {
            die('Error:' . $e->getMessage());
        }
    }

    function deleteCommande($id)
    {
        $sql = "DELETE FROM commande WHERE idCommande = :id";
        $db = config::getConnexion();
        $req = $db->prepare($sql);
        $req->bindValue(':id', $id);

        try {
            $req->execute();
        } catch (Exception $e) {
            die('Error:' . $e->getMessage());
        }
    }

    function addCommande($commande)
    {
        $sql = "INSERT INTO commande ( quantite, status, amount, idProduit) 
        VALUES (:quantite, :status, :amount, :idProduit)";

        $db = config::getConnexion();
        try {
            $query = $db->prepare($sql);
            $query->execute([
                'quantite' => $commande->getQuantite(),
                'status' => $commande->getStatus(),
                'amount' => $commande->getAmount(),
                'idProduit' => $commande->getIdProduit()
            ]);
        } catch (Exception $e) {
            echo 'Error: ' . $e->getMessage();
        }
    }
    

    function updateCommande($commande, $id)
    {
        try {
            $db = config::getConnexion();
            $query = $db->prepare(
                'UPDATE commande SET 
                    quantite = :quantite,
                    status= :status,
                    amount= :amount,
                    idProduit= :idProduit
                WHERE idCommande= :idCommande '
            );
            $query->execute([
                'idCommande' => $id,
                'quantite' => $commande->getQuantite(),
                'status' => $commande->getStatus(),
                'amount' => $commande->getAmount(),
                'idProduit' => $commande->getIdProduit(),
            ]);
            echo $query->rowCount() . " records UPDATED successfully <br>";
        } catch (PDOException $e) {
            $e->getMessage();
        }
    }

    function showCommande($id)
    {
        $sql = "SELECT * from commande where idCommande = $id";
        $db = config::getConnexion();
        try {
            $query = $db->prepare($sql);
            $query->execute();

            $commande = $query->fetch();
            return $commande;
        } catch (Exception $e) {
            die('Error: ' . $e->getMessage());
        }
    }
}
