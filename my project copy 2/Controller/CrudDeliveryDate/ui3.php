<?php

include_once '../../config.php';


if (isset($_GET["idUser"])) {
    $idUser = $_GET["idUser"];

    

    $sql = "DELETE FROM user WHERE idUser = $idUser";
    $conn->query($sql);

    header("location: /carvilla-v1.0/View/admin/ui.php");
    exit;
}
?>