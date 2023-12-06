<?php
include '../CONTROLLER_USER_ADMIN/controller_user_admin.php';

$userC = new controller_user_admin();
$userC->unbanUser($_GET["id_user"]);
header("Location: http://localhost/UserAdmin/VIEW_USER_ADMIN/index2.php");
?>