<?php
include('../config/constants.php');
include('logincheck.php');

 ?>

<?php

$appoid = $_GET['id'];

$query = "DELETE FROM tbl_appo WHERE appo_id='$appoid'";
$res = mysqli_query($con,$query);

if(isset($res))
{
$_SESSION['message'] = "Appointment Cancelled by the user";
header("location:useraccount.php");


}

elseif(!isset($res))
{

  echo "Something went wrong";
}




 ?>
