<?php
	include '../Controller/CategorieC.php';

	$message = "" ; 
	$CategorieC=new CategorieC();
	$CategorieC->supprimerCategorie($_GET["idCategorie"]);
	header('Location:indexCategory.php?message= Categorie Supprimée avec succés');
?>