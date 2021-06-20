<?php

include('../config/constants.php');
 ?>

 <!DOCTYPE html>
 <html lang="en" dir="ltr">
   <head>
     <meta charset="utf-8">
     <title>Admin LogIn</title>
<link rel="stylesheet" href="../style.css">
<link rel="stylesheet" href="../userpage/userstyle.css">
<link rel="stylesheet" href="adminstyle.css">
   </head>
   <body>

<div class="admin-nav">

<ul>
  <li> <a href="../index.php">Home</a> </li>
</ul>

</div>



<section>


<!--Incorrect user id and password message -->

  <div class="login-failed text-center">

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
        <p class="sign" align="center">Admin LogIn</p>

        <form class="form1" action="adminloginaction.php" method="POST">

        <input class="un " type="text" align="center" name="username" placeholder="Enter your UserID">
        <input class="pass" type="password" align="center" name="password" placeholder="Enter your password">
        <input type="submit" name="submit" value="LOGIN" class="submit">

        </form>

      </div>


</section>


<section>
  <?php
include('../footer.html');

   ?>
</section>



   </body>
 </html>
