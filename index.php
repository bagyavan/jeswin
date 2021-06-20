

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Doctor Appointment System</title>
  <link rel="stylesheet" href="homepagecss.css">
  <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
  </head>
  <body>
<?php

include('navbarmain.php');

 ?>

 <?php
 $query = "SELECT COUNT(*) FROM tbl_appo";
 $result = mysqli_query($con,$query);
 $rows = mysqli_fetch_row($result);


  ?>

  <?php
  $query1 = "SELECT COUNT(*) FROM tbl_doc";
  $result1 = mysqli_query($con,$query1);
  $rows1 = mysqli_fetch_row($result1);


   ?>





<div class="slider1">
  <div class="box1">
<h2>Doctor Booking</h2> <h3>has never been this easy</h3> <br>
<div class="records">
  <div class="rec1">
<h3> <?php echo $rows1[0]; ?></h3> <br>
 <h4>Doctors</h4>
  </div>
  <div class="rec2">
    <h3><?php echo $rows[0]; ?></h3>
     <h4>Appointments </h4>
  </div>

</div>


  </div>
  <div class="box2">
    <i class="fa fa-medkit" aria-hidden="true"></i>
  </div>

</div>









<!-- Footer section inclusion -->
<br><br><br>
<?php

include('footer.html');

 ?>

  </body>
</html>
