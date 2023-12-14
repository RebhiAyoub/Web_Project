<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
include_once 'ProductsC.php';
include_once 'commandeC.php';
$commandeC = new CommandeC();
$commandeC->deleteCommande($_GET["idCommande"]);
header('Location:/web/View/admin/ui.php');
