<?php
include_once 'CategorieC.php';

	$message = "" ; 
	$CategorieC=new CategorieC();
	$CategorieC->supprimerCategorie($_GET["idCategorie"]);
	header('Location:/web/View/admin/ui.php');
?>
