<?php
include '../../Model/commande.php';
include '../../configg.php';
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
    public function listCommandes($id_user)
    {
        $sql = "SELECT * FROM commande WHERE id_user = :id_user";
        $db = config::getConnexion();
        try {
            $query = $db->prepare($sql);
            $query->bindParam(':id_user', $id_user, PDO::PARAM_INT);
            $query->execute();

            return $query->fetchAll();
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
        $sql = "INSERT INTO commande ( quantite, status, amount, idProduit,id_user)
        VALUES (:quantite, :status, :amount, :idProduit, :id_user)";

        $db = config::getConnexion();
        try {
            $query = $db->prepare($sql);
            $query->execute([
                'quantite' => $commande->getQuantite(),
                'status' => $commande->getStatus(),
                'amount' => $commande->getAmount(),
                'idProduit' => $commande->getIdProduit(),
                'id_user' => $commande->getId_user()

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
                idProduit= :idProduit,
                id_user= :id_user
                              
            WHERE idCommande= :idCommande '
        );
        $query->execute([
            'idCommande' => $id,
            'quantite' => $commande->getQuantite(),
            'status' => $commande->getStatus(),
            'amount' => $commande->getAmount(),
            'idProduit' => $commande->getIdProduit(),
            'id_user' => $commande->getId_user()

        ]);

        // Display SweetAlert notification
        echo '<script>
            Swal.fire({
                icon: "success",
                title: "Updated Successfully",
                text: "Record updated successfully!",
            });
        </script>';
    } catch (PDOException $e) {
        // Handle the exception (optional)
        echo '<script>
            Swal.fire({
                icon: "error",
                title: "Error",
                text: "An error occurred while updating the record.",
            });
        </script>';
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
