<?php
include_once '../../config.php';

if (isset($_GET["idUser"])) {
    $idUser = $_GET["idUser"];

    $sql = "DELETE FROM userTr WHERE idUser = $idUser";
    $conn->query($sql);

    header("location: /web/View/admin/ui.php");
    exit;
}
?>