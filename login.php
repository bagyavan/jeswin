<?php

include('navbarmain.php');
 ?>

 <!DOCTYPE html>
 <html lang="en" dir="ltr">
   <head>
     <meta charset="utf-8">
     <title>LogIn</title>
<link rel="stylesheet" href="style.css">

   </head>
   <body>

<div class="alert-msg">

<!-- Registered Successfull message -->

  <?php
if(isset($_SESSION['add'])){

echo $_SESSION['add'];
unset($_SESSION['add']);

}
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
        <p class="sign" align="center">Login to your account</p>

        <form class="form1" action="loginaction.php" method="POST">

        <input class="un " type="text" align="center" name="email" placeholder="Enter your Email">
        <input class="pass" type="password" align="center" name="password" placeholder="Enter your password">
        <input type="submit" name="submit" value="LOGIN" class="submit">
        <p class="forgot" align="center"><a href="#">Forgot Password?</p>
        <p class="forgot" align="center">New Member? <a href="register.php">Register Now</p>
        </form>

      </div>


</section>


<section>
  <?php
include('footer.html');

   ?>
</section>



   </body>
 </html>
