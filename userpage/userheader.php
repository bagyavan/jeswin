<!--This is user page navigation bar -->

<?php
include('../config/constants.php');
include('logincheck.php');

 ?>

<!-- sessioning user id for every page -->

<?php
$email = $_SESSION['username'];
$querys = "SELECT * FROM register WHERE email='$email'";
$resu = mysqli_query($con,$querys);

while($rows = mysqli_fetch_array($resu))
{
  $_SESSION['userid'] = $rows['reg_id'];



}



 ?>




<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
<link rel="stylesheet" href="userstyle.css">
<link rel="stylesheet" href="w3.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

  </head>

  <body>

    <section class="navbar">

      <div class="container">


        <div class="logo">
          DOCTOR APPOINTMENT SYSTEM
        </div>

    <div class="menu">
      <ul>
        <li>
          <div class="user-header-detail">
              Contact : 1800 759 7678
          </div>
        </li>
        <li>
          <div class="user-header-detail">
              Email : support@das.com
          </div>

        </li>
        <li>
<div class="clearfix"></div>
          <div class="button-adjust">


            <div class="w3-container">

              <div class="w3-dropdown-click">
                <button style="background-color:orange; padding:15%; margin-right:50px; border:none; border-radius:50px;" onclick="myFunction()" class="w3-button ">

                <?php
                  echo $_SESSION['username'];
                  ?>


                </button>
                <div id="Demo" class="w3-dropdown-content w3-bar-block w3-border">
                  <a href="useraccount.php" class="w3-bar-item w3-button">My Account</a>
                  <a href="#" class="w3-bar-item w3-button">Appointments</a>
                  <a href="logout.php" class="w3-bar-item w3-button">LogOut</a>
                </div>
              </div>
            </div>

            <script>
            function myFunction() {
              var x = document.getElementById("Demo");
              if (x.className.indexOf("w3-show") == -1) {
                x.className += " w3-show";
              } else {
                x.className = x.className.replace(" w3-show", "");
              }
            }
            </script>


          </li>
        </ul>
      </div>
      </div>
          </div>

    </section>


  </body>
</html>
