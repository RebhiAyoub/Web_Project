<?php
include_once '../../config.php';

try {
    $conn = new PDO("mysql:host=$db_host;dbname=$db_name", $db_user, $db_password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    if (isset($_GET["idUser"])) {
        $idUser = $_GET["idUser"];

        $stmt = $conn->prepare("DELETE FROM userTr WHERE idUser = :idUser");
        $stmt->bindParam(':idUser', $idUser);
        $stmt->execute();

        header("location: /carvilla-v1.0/Controller/back/ui.php");
        exit;
    }
} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
}
?>
