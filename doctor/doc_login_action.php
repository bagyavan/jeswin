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

include('../config/constants.php');

if(isset($_POST['submit']))
{

$email = $_POST['email'];
$password = md5($_POST['password']);


$sql = "SELECT * FROM tbl_doc WHERE email='$email' AND password='$password'";


$res = mysqli_query($con,$sql);

$count = mysqli_num_rows($res);

while($row=mysqli_fetch_array($res))
{
  if($row['status']==2){
    $_SESSION['sample']= "Wait for approval";
    header("location: doc_login.php");

  }
  elseif ($row['status']==1)
  {
    $_SESSION['sample']= "Account disabled";
    header("location: doc_login.php");

  }
  elseif ($row['status']==0)
   {


     $_SESSION['login'] = "You are now logged In.";
     $_SESSION['username'] = $email;
     header("location: doc_home.php");

  }


 else {
   //user not available

   $_SESSION['login'] = "Incorrect email or password";
   header("location: doc_login.php");
 }






}

if($count==0)
{
//user not available
$_SESSION['login'] = "Incorrect Email or Password";


header("location: doc_login.php");

}


}
 ?>
