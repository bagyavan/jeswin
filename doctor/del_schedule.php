<?php
include('../config/constants.php');

$id = $_GET['id'];
$timeid = $_GET['timeid'];
$leaveid = $_GET['leaveid'];

$query1 = "DELETE FROM tbl_time WHERE doc_id='$id' AND time_id='$timeid' ";

$res = mysqli_query($con,$query1);

if($res)
{
  $_SESSION['success'] = "Schedule deleted Succesfully";
  header("location: schedules.php?id=" .$id);

}

if(isset($leaveid))
{
$query2 = "DELETE FROM tbl_leave WHERE doc_id='$id' AND leave_id='$leaveid' ";
$res2 = mysqli_query($con,$query2);

if(isset($res2))
{
  $_SESSION['success'] = "Leave cancelled Succesfully";
  header("location: schedules.php?id=" .$id);


}

}









 ?>
