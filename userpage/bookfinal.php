<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Book your Appointment</title>
    <script src="https://code.jquery.com/jquery-3.6.0.js" > </script>

    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <link rel="stylesheet" href="https://code.jquery.com/ui/1.11.3/themes/smoothness/jquery-ui.css">



  </head>
  <body>

  </body>
</html>


<?php
include('userheader.php');
$id = $_GET['id'];
 ?>
<br><br>

 <div class="containerprogress">
      <ul class="progressbar">
        <li class="active">Doctor Selection</li>
        <li class="active">Choose Date</li>
        <li class="active">Booking Done</li>

      </ul>
    </div>

  <br><br>


  <?php
  usleep(1000000);
  $query = "SELECT * FROM tbl_doc WHERE doc_id='$id'";

  $res = mysqli_query($con,$query);
  $dates = $_SESSION['dates'];

  $query1 = "SELECT * FROM tbl_time WHERE doc_id='$id' AND dates='$dates'";
  $res1 = mysqli_query($con,$query1);

  while($rows = mysqli_fetch_array($res1))
  {
    $stime = $rows['s_time'];
    $etime = $rows['e_time'];


  }


  while($rows = mysqli_fetch_array($res))
    {
       $docname=$rows['name'];

       $speciality=$rows['speciality'];
       $gender=$rows['gender'];

       $fletter = $docname[3];


    }

$email = $_SESSION['username'];
$query4 = "SELECT fname,lname FROM register WHERE email='$email'";
$res3 = mysqli_query($con,$query4);

while($rows = mysqli_fetch_array($res3))
{
$fname = $rows['fname'];
$lname = $rows['lname'];

}

$name = $fname." ".$lname;
$_SESSION['name'] = $name;


   ?>

   <div class="booknow">

     <div class="grid-containers">


       <div class="title">Book now</div>
       <div class="img"> <?php echo $fletter; ?> </div>
       <div class="details">
         <h3><?php echo $docname; ?> </h3>
         <i class="fa fa-stethoscope" aria-hidden="true"> &nbsp; </i> <?php echo $speciality; ?>
         &nbsp;  <i class="fa fa-user" aria-hidden="true"></i> &nbsp; <?php echo $gender; ?>
         &nbsp;  <i class="fa fa-book" aria-hidden="true"></i> &nbsp; <?php echo "MBBS,MD,DM"; ?>
       </div>

        <div class="date">

          <div class="scrub">

            <form class="" action="bookingaction.php?id=<?php echo $id; ?>" method="post">
              Available from <?php echo $stime; ?>AM to <?php echo $etime; ?> PM on <?php echo $dates; ?>


          </div>
          <a href="changedate.php?id=<?php echo $id; ?>"><button class="change" type="button" name="button">Change Date</button></a>

          <input type="submit" name="hsubmit" value="Book" id="finalsub">
        </form>



        </div>

     </div>
   </div>
