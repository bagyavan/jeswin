<?php
if(!isset($_SESSION['username']))
{
$_SESSION['no-login-message'] = "Please Login to Continue";

header('location: adminlogin.php');



}
 ?>
