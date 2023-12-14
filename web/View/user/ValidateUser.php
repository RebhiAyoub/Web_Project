<?php
include '../../Controller/U/controller_user_admin.php';

$userC = new controller_user_admin();
$userC->unbanUser($_GET["id_user"]);
header("Location: http://localhost/web/View//user/index.php");
?>