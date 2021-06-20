<?php
include('../config/constants.php');

 ?>

<?php

$docid = $_GET['id'];
$regid = $_SESSION['regid'];
$apponum = mt_rand(100000, 999999);
$status = "Booked";
$arrival = "No";
$dates = $_SESSION['dates'];
$name = $_SESSION['name'];

// For checking duplicate appointments

$query1 = "SELECT * FROM tbl_appo WHERE doc_id='$docid' AND reg_id='$regid' AND dates='$dates'";
$res1 = mysqli_query($con,$query1);

if(mysqli_num_rows($res1)>=1)
{

echo '<script type="text/javascript">';
echo 'alert("You already have an appointment on the selected date. Please check your appointments.");';
echo 'window.location.href = "useraccount.php";';
echo '</script>';
}
elseif(mysqli_num_rows($res1)==0)
{


$query = "INSERT INTO tbl_appo SET doc_id='$docid',reg_id='$regid',appo_num='$apponum',p_name='$name',dates='$dates',status='$status',arrival='$arrival'";
$res = mysqli_query($con,$query);

if(isset($res))
{
  $_SESSION['bookingdone']="yes";
  header("location:bookingdone.php");
}
}


 ?>
