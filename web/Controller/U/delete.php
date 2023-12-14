<?php
include 'controller_user_admin.php';
$c= new controller_user_admin();
$c->delete_user($_GET['id_user']);
header("location: /web/View/admin/ui.php");
?>