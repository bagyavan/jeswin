<?php

include('../config/constants.php');

if(isset($_POST['submit']))
{

$username = $_POST['username'];
$password = ($_POST['password']);

$sql = "SELECT * FROM admin WHERE username='$username' AND password='$password'";

$res = mysqli_query($con,$sql);

 $count = mysqli_num_rows($res);

 if($count==1)
 {
//user available
$_SESSION['login'] = "You are now logged In.";

$_SESSION['username'] = $username;

header("location: adminhome.php");

 }

 else {
   //user not available

   $_SESSION['login'] = "Incorrect username or password";
   header("location: adminlogin.php");
 }


}


 ?>
