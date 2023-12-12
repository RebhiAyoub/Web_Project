<?php
include '../../Controller/CycleC.php';
$cycleC = new  CycleC();
$cycleC->delete($_GET["idUser"]);
header('Location:listeCycle.php');