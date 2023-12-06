<?php
include '../CONTROLLER_USER_ADMIN/controller_user_admin.php';

$token = $_GET['token']; // Get the token from the URL

$userC = new controller_user_admin();
$verificationResult = $userC->verify_user($token);

if ($verificationResult) {
    echo "Thank you for verifying your email. You can now login.";
} else {
    echo "Invalid verification token.";
}
?>
