<?php
	
include_once '../../Model/Products.php';
require_once '../../configg.php';
	//include_once 'CategorieC.php';
	//include_once 'commandeC.php';

	class ProductC {

		function getProduitById($idProduit){
			$sql="SELECT * from produits where idProduit=$idProduit";
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


/////..............................Afficher............................../////
		function AfficherProducts(){
			$sql="SELECT * FROM produits";
			$db = config::getConnexion();
			try{
				$liste = $db->query($sql);
				return $liste;
			}
			catch(Exception $e){
				die('Erreur:'. $e->getMessage());
			}
		}

/////..............................Supprimer............................../////
		function SupprimerProduct($idProduit){
			$sql="DELETE FROM produits WHERE idProduit=:idProduit";
			$db = config::getConnexion();
			$req=$db->prepare($sql);
			$req->bindValue(':idProduit', $idProduit);   
			try{
				$req->execute();
			}
			catch(Exception $e){
				die('Error:' . $e->getMessage());
			}
		}


/////..............................Ajouter............................../////
		function AjouterProduct($product){
			$sql="INSERT INTO produits (Product_name,Descriptionn,Product_price,Availabilityy,img,categ) 
			VALUES (:Product_name,:Descriptionn,:Product_price,:Availabilityy,:img,:categ)";
			
			$db = config::getConnexion();
			try{
				$query = $db->prepare($sql);
				$query->execute([
					'Product_name' => $product->getProduct_name(),
					'Descriptionn' => $product->getDescriptionn(),
					'Product_price' => $product->getProduct_price(),
					'Availabilityy' => $product->getAvailabilityy(),
					'img' => $product->getimg(),
					'categ' => $product->getCateg(),
			]);			
			}
			catch (Exception $e){
				echo 'Erreur: '.$e->getMessage();
			}			
		}
/////..............................Affichage............................../////
		function RecupererProduct($idProduit){
			$sql="SELECT * from produits where idProduit=$idProduit";
			$db = config::getConnexion();
			try{
				$query=$db->prepare($sql);
				$query->execute();

				$product=$query->fetch();
				return $product;
			}
			catch (Exception $e){
				die('Erreur: '.$e->getMessage());
			}
		}

/////..............................Update............................../////
function modifierProduit($produit, $id)
{
    try {
        $db = config::getConnexion();

        if (!$db) {
            echo "Failed to connect to the database";
            return;
        }

        $query = $db->prepare(
            'UPDATE produits SET 
                Product_name = :Product_name,
                Descriptionn = :Descriptionn,
                Product_price = :Product_price,
                Availabilityy = :Availabilityy,
                img = :img,
                categ = :categ
            WHERE idProduit = :idProduit '
        );

        $query->execute([
            'idProduit' => $id,
            'Product_name' => $produit->getProduct_name(),
            'Descriptionn' => $produit->getDescriptionn(),
            'Product_price' => $produit->getProduct_price(),
            'Availabilityy' => $produit->getAvailabilityy(),
            'img' => $produit->getimg(),
            'categ' => $produit->getCateg(),
        ]);

        if ($query->rowCount() > 0) {
            echo $query->rowCount() . " records UPDATED successfully <br>";
        } else {
            echo "No records were updated <br>";
        }

    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
}

function showProduit($id)
    {
        $sql = "SELECT * from produits where idProduit = $id";
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
     $sql = "SELECT * FROM produits WHERE categ LIKE '%" . $libelle . "%' OR idProduit LIKE '%" . $libelle . "%' OR  Product_name LIKE '%" . $libelle . "%' OR  
	 Availabilityy LIKE '%" . $libelle . "%' OR creationDate LIKE '%" . $libelle . "%' ";
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
 function trierproduit()
 {
     $sql = "SELECT * from produits ORDER BY creationDate DESC";
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
 function trierproduit1()
 {
     $sql = "SELECT * from produits ORDER BY creationDate ASC";
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
	?>
