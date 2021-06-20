<?php

include('../config/constants.php');
include('doc_login_check.php');

 ?>

 <?php
$appoid = $_GET['id'];


$query = "UPDATE tbl_appo SET status='Complete' WHERE appo_id='$appoid'";
$res = mysqli_query($con,$query);
if(isset($res))
{
  $_SESSION['complete'] = "Appointment Completed";
  header("location:manageappo.php");
}


  ?>
