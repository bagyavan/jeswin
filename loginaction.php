<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
<link rel="stylesheet" href="style.css">
  </head>
  <body>

  </body>
</html>

<?php

include('config/constants.php');

if(isset($_POST['submit']))
{

$email = $_POST['email'];
$password = md5($_POST['password']);

$sql = "SELECT * FROM register WHERE email='$email' AND password='$password'";

$res = mysqli_query($con,$sql);

while($rows = mysqli_fetch_array($res))
{
  $_SESSION['regid'] = $rows['reg_id'];


}
 $count = mysqli_num_rows($res);

 if($count==1)
 {
//user available
$_SESSION['login'] = "You are now logged In.";
$_SESSION['username'] = $email;


header("location: userpage/userhome.php");

 }

 else {
   //user not available

   $_SESSION['login'] = "Incorrect email or password";
   header("location: login.php");
      }


}


 ?>
