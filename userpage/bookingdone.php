<?php
include('userheader.php');
$email = $_SESSION['username'];
 ?>

 <?php
 if(!isset($_SESSION['bookingdone']))
  {
    ?>
    <script type="text/javascript">
      alert("Booking not done. Error");
      window.location = 'userhome.php';
    </script>
    <?php


  }


  ?>


<?php

$query = "SELECT * FROM tbl_appo";
$res = mysqli_query($con,$query);

while($rows = mysqli_fetch_array($res))
{

  $docid = $rows['doc_id'];
  $regid = $rows['reg_id'];
  $apponum = $rows['appo_num'];
  $status = $rows['status'];


}


$query2 = "SELECT name FROM tbl_doc WHERE doc_id='$docid'";
$res1 = mysqli_query($con,$query2);

while($rows = mysqli_fetch_array($res1))
{
$docname = $rows['name'];


}

$query3 = "SELECT fname FROM register WHERE email='$email'";
$res2 = mysqli_query($con,$query3);

while($rows = mysqli_fetch_array($res2))
{
$name = $rows['fname'];

}






 ?>




<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Book your Appointment</title>
    <script src="https://code.jquery.com/jquery-3.6.0.js" > </script>

    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <link rel="stylesheet" href="https://code.jquery.com/ui/1.11.3/themes/smoothness/jquery-ui.css">

    <style>
    /* Center the loader */
    #loader {
      position: absolute;
      left: 50%;
      top: 50%;
      z-index: 1;
      width: 120px;
      height: 120px;
      margin: -76px 0 0 -76px;
      border: 16px solid #f3f3f3;
      border-radius: 50%;
      border-top: 16px solid #3498db;
      -webkit-animation: spin 2s linear infinite;
      animation: spin 2s linear infinite;
    }

    @-webkit-keyframes spin {
      0% { -webkit-transform: rotate(0deg); }
      100% { -webkit-transform: rotate(360deg); }
    }

    @keyframes spin {
      0% { transform: rotate(0deg); }
      100% { transform: rotate(360deg); }
    }

    /* Add animation to "page content" */
    .animate-bottom {
      position: relative;
      -webkit-animation-name: animatebottom;
      -webkit-animation-duration: 1s;
      animation-name: animatebottom;
      animation-duration: 1s
    }

    @-webkit-keyframes animatebottom {
      from { bottom:-100px; opacity:0 }
      to { bottom:0px; opacity:1 }
    }

    @keyframes animatebottom {
      from{ bottom:-100px; opacity:0 }
      to{ bottom:0; opacity:1 }
    }

    #something {
      display: none;
      text-align: center;
    }
    </style>

  </head>
  <body onload="myfunc()" style="margin:0;" >


<br><br>

<div id="loader"></div>

<div style="display:none;" id="something" class="animate-bottom">
<div class="appobox">
<h3> <?php echo $_SESSION['name']; ?> </h3>  <br>
<span>Doctor Appointed : <?php echo $docname; ?></span> <br>
<span>On <?php echo $_SESSION['dates'] ; ?></span> <br>
<span>Appointment number : <?php echo $apponum; ?></span> <br>
<span>Booking status : <?php echo $status; ?></span>
<div class="print">
<a href="makepdf.php?docname=<?php echo $docname; ?>&apponum=<?php echo $apponum; ?>&status=<?php echo $status; ?>&name=<?php echo $_SESSION['name']; ?>&dates=<?php echo $_SESSION['dates']; ?>" target="_blank">  <button type="button" name="print" id="print"> &nbsp</button><i  class="fa fa-file-pdf-o" aria-hidden="true"></i></a>

</div>

</div>



</div>

<script>
var myVar;

function myfunc() {
  myVar = setTimeout(showPage, 1000);
}

function showPage() {
  document.getElementById("loader").style.display = "none";
  document.getElementById("something").style.display = "block";
}
</script>


</body>
</html>
