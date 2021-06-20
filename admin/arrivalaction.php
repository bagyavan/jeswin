<?php
include('../config/constants.php');
include('logincheck.php');

 ?>

 <?php
$appoid = $_GET['id'];
$action = $_GET['action'];


if($action==1)
{
  $query = "UPDATE tbl_appo SET arrival ='Yes' WHERE appo_id='$appoid'";
  $res = mysqli_query($con,$query);
  if(isset($res))
  {
    $_SESSION['arrival'] = "Arrival Status Updated";
    header("location:manageappo.php");
  }
}
elseif($action==2)
{
  $query1 = "UPDATE tbl_appo SET arrival ='No' WHERE appo_id='$appoid'";
  $res1 = mysqli_query($con,$query1);
  if(isset($res1))
  {
    $_SESSION['arrival'] = "Arrival Status Updated";
    header("location:manageappo.php");
  }

}



  ?>
