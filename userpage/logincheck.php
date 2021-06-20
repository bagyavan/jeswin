<?php
if(!isset($_SESSION['login']))
{
$_SESSION['no-login-message'] = "Please Login to Continue";

header('location: ../login.php');

}
?>
