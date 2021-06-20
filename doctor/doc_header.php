<?php

include('../config/constants.php');
include('doc_login_check.php');

 ?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>

    <link rel="stylesheet" href="../style.css">
    <link rel="stylesheet" href="../userpage/userstyle.css">
    <link rel="stylesheet" href="../userpage/w3.css">
    <link rel="stylesheet" href="docpage.css">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">

<script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>


  </head>
  <body>


    <section class="navbar">

      <div class="container">


        <div class="logo">
          DOCTORS PORTAL
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

          <div class="user-header-detail">
            <a href="doc_home.php"><i class="fas fa-home"></i></a>

          </div>

        </li>
        <li>
    <div class="clearfix"></div>
          <div class="button-adjust">


            <div class="w3-container">

              <div class="w3-dropdown-click">
                <button style="background-color:orange; padding:15%; margin-right:50px; border:none; border-radius:50px;" onclick="myFunction()" class="w3-button" id="butt">
                  <?php
                      echo $_SESSION['username'];
                      $email = $_SESSION['username'];



                      $query3 = "SELECT doc_id FROM tbl_doc WHERE email='$email'";
                      $res = mysqli_query($con,$query3);

                      while($rows=mysqli_fetch_array($res))
                        {
                          $docid=$rows['doc_id'];




                    ?>

                </button>
                <div id="Demo" class="w3-dropdown-content w3-bar-block w3-border">
                  <a href="doc_profile.php" class="w3-bar-item w3-button">My Profile</a>
                  <a href="schedules.php?id=<?php echo $docid; ?> " class="w3-bar-item w3-button">Schedules</a>
                  <a href="logout.php" class="w3-bar-item w3-button">LogOut</a>
                </div>
              </div>
            </div>

            <?php
                        }

             ?>

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
