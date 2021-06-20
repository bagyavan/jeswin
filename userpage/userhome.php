<?php
include('userheader.php');



 ?>


 <!DOCTYPE html>
 <html lang="en" dir="ltr">
   <head>
     <meta charset="utf-8">
     <title>Book an Appointment</title>
     <link rel="stylesheet" href="userstyle.css">

   </head>
   <body>

<section>
  <div class="alert-msg-success">
    <?php
      if (isset($_SESSION['login'])) {

          // Login success message here

      }
     ?>
  </div>

  <div class="containerprogress">
       <ul class="progressbar">
         <li class="active">Doctor Selection</li>
         <li >Choose Date</li>
         <li>Booking Done</li>

       </ul>
     </div>







<div class="searchbar">

<form  action="#" method="POST">


<div class="unit">
  <div class="box">
    <select name="speciality" required>
      <option  selected value="No records found..." >Choose Department</option>
      <?php

    $sql = mysqli_query($con, "SELECT speciality FROM tbl_speciality");

    while ($row = $sql->fetch_assoc())
    {

    ?>

    <option><?php echo $row['speciality']; ?></option>

    <?php
    // close while loop
    }
    ?>
      </select> <br>
</div>
</div>







<div class="unit">
  <input type="submit" name="submit" value="SEARCH DOCTORS">
</div>
<div class="clearfix"></div>
</div>
</form>



<?php

if (isset($_POST['submit']))
{

usleep(1000000);
?>


<?php



$speciality = $_POST['speciality'];

$sql = "SELECT * FROM tbl_doc WHERE speciality = '$speciality'";

$res = mysqli_query($con,$sql);

?>
<div class="searchmsg">
<?php echo "You searched for : " .  $speciality ; ?>
</div>


<?php


while($rows = mysqli_fetch_array($res))
  {
     $name=$rows['name'];
     $speciality=$rows['speciality'];
     $gender=$rows['gender'];

     $fletter = $name[3];



?>

<div class="searchresult">

<div class="searchresultcontent">
  <div class="grid-container">
    <div class="img"><?php echo $fletter; ?></div>
    <div class="text">
      <h3><?php echo $name; ?> </h3>
      <i class="fa fa-stethoscope" aria-hidden="true"> &nbsp; </i> <?php echo $speciality; ?>
      &nbsp;  <i class="fa fa-user" aria-hidden="true"></i> &nbsp; <?php echo $gender; ?>
      &nbsp;  <i class="fa fa-book" aria-hidden="true"></i> &nbsp; <?php echo "MBBS,MD,DM"; ?>

     </div>


    <div class="button"> <a href="bookapp.php?id=<?php echo $rows['doc_id']; ?>">Book an Appointment</a></div>
  </div>

</div>
</div>

<?php
}


}




?>





</section>






   </body>
 </html>
