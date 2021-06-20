<?php

include('../navbarmain.php');
 ?>

 <!DOCTYPE html>
 <html lang="en" dir="ltr">
   <head>
     <meta charset="utf-8">
     <title>LogIn</title>
<link rel="stylesheet" href="../style.css">

   </head>
   <body>

<div class="alert-msg">

<!-- Registered Successfull message -->

<?php

if(isset($_SESSION['exist']))
{


$chk=$_SESSION['exist'];
if($chk=="You are already registered. Wait for approval")
{
  ?><p style="color:red;">You are already registered. Wait for approval<p> <?php
}
else if($chk=="You are Succesfully registered, Please wait for admin approval")
  {
    ?><p style="color:green;">You are Succesfully registered, Please wait for admin approval<p> <?php
  }
}

if(isset($_SESSION['sample']))
{
$chks=$_SESSION['sample'];
if($chks=="Wait for approval")
{
  ?><p style="color:red;">Wait for approval<p> <?php
}
else if($chks=="Account disabled")
  {
    ?><p style="color:red;">Account disabled<p> <?php
  }


}

if(isset($_SESSION['failed']))
{
?><p style="color:red;"><?php echo $_SESSION['failed']; ?></p>
<?php
unset($_SESSION['failed']);

}


if(isset($_SESSION['no-login-message']))
{
?><p style="color:red;"><?php echo $_SESSION['no-login-message']; ?></p>
<?php
unset($_SESSION['no-login-message']);

}




unset($_SESSION['exist']);
unset($_SESSION['sample']);

 ?>
</div>


<section>

  <div class="login-failed text-center">

<!--Incorrect user id and password message -->
    <?php
      if (isset($_SESSION['login'])) {
        echo $_SESSION['login'];
        unset($_SESSION['login']);

      }
/*User logged in or not is checked and printed here */

      if(isset($_SESSION['no-login-message']))
      {
          echo $_SESSION['no-login-message'];
          unset ($_SESSION['no-login-message']);

      }



     ?>
  </div>


  <div class="main">
        <p class="sign" align="center">Doctors Portal</p>

        <form class="form1" action="doc_login_action.php" method="POST">

        <input class="un " type="text" align="center" name="email" placeholder="Enter your Email">
        <input class="pass" type="password" align="center" name="password" placeholder="Enter your password">
        <input type="submit" name="submit" value="LOGIN" class="submit">
        <p class="forgot" align="center"><a href="#">Forgot Password?</p>
        <p class="forgot" align="center">New Doctor? <a href="doc_reg.php">Register Now</p>
        </form>

      </div>


</section>


<section>

</section>



   </body>
 </html>
