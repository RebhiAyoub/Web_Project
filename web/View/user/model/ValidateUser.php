<?php
include '/Applications/XAMPP/xamppfiles/htdocs/carvilla-v1.0/Controller/user/controller_user_admin.php';

$userC = new controller_user_admin();
$userC->unbanUser($_GET["id_user"]);
header("Location: http://localhost/carvilla-v1.0/View//user/index.php");
?>