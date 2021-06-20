<?php

include('../config/constants.php');
include('doc_login_check.php');

 ?>

 <?php
 $apponum = $_GET['apponum'];
 $regid = $_GET['regid'];
 $docid = $_GET['docid'];
 $appoid = $_GET['appoid'];


 if(isset($_POST['submit']))
 {
 $medname = $_POST['medname'];
 $dosecount = $_POST['dosecount'];
 $days = $_POST['days'];


 for($l=0; $l < count($medname); $l++)
 {

   $query = "INSERT INTO tbl_med SET med_name='$medname[$l]',med_dose='$dosecount[$l]',med_days='$days[$l]',appo_num='$apponum',reg_id='$regid',doc_id='$docid'";
 	$res = mysqli_query($con,$query);


 }

  if(isset($res))
  {
    $_SESSION['meddata'] = "Medical data uploaded success";
    header("location:attendappo.php?appoid=".$appoid);
  }
}

else
{
  echo "No medical data uploaded. Close Session instead";
}


  ?>
