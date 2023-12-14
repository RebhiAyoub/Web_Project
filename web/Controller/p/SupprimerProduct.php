<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
include_once 'ProductsC.php';

	$message = "" ; 
	$ProductC=new ProductC();
	$ProductC->SupprimerProduct($_GET["idProduit"]);
	header('Location:/web/View/admin/ui.php');
?>
