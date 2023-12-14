<?php
//all necessary functions for a logout page
session_start();
session_destroy();
header("Location: /carvilla-v1.0/View/user/welcome.html");
exit();
?>