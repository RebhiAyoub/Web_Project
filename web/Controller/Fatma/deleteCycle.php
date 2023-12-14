<?php
include 'CycleC.php';
$cycleC = new  CycleC();
$cycleC->delete($_GET["idUser"]);
header('Location:/web/View/admin/ui.php');