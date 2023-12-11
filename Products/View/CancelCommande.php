<?php
include '../Controller/ProductsC.php';
$commandeC = new CommandeC();
$commandeC->deleteCommande($_GET["idCommande"]);
header('Location:YourOrders.php');
