<?php
include '../../Controller/ovulationC.php';
$ovulationC = new  OvulationC();
$ovulationC->deleteOvulations($_GET["idUser"]);
header('Location:listOvulations.php');