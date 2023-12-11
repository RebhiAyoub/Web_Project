<?php
	include '../Controller/ProductsC.php';

	$message = "" ; 
	$ProductC=new ProductC();
	$ProductC->SupprimerProduct($_GET["idProduit"]);
	header('Location:indexBack.php?message= Product Supprimé avec succés');
?>