<?php
include 'ovulationC.php';
$ovulationC = new  OvulationC();
$ovulationC->deleteOvulations($_GET["idUser"]);
header('Location: /web/View/admin/ui.php');