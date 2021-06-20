<?php

include('../config/constants.php');


$email = $_SESSION['username'];

$query1 = "SELECT doc_id FROM tbl_doc WHERE email='$email'";

$res = mysqli_query($con,$query1);

while($rows=mysqli_fetch_array($res))
  {
    $docid=$rows['doc_id'];
  }

if(isset($_POST['submit']))
{


    $date = $_POST['froms'];
    $time1 = $_POST['time1'];
    $time2 = $_POST['time2'];

    $query2 = "INSERT INTO tbl_time SET doc_id='$docid',dates='$date',s_time='$time1',e_time='$time2'";
    $res = mysqli_query($con,$query2);

    if(isset($res))
    {
      $_SESSION['success'] = "Schedule added Succesfully";
      header("location: schedules.php?id=".$docid);

    }



}


if(isset($_POST['lsubmit']))
{

  $date = $_POST['fromss'];
  $reason = $_POST['reason'];
  $status = 'pending';

  $query = "INSERT INTO tbl_leave SET doc_id='$docid', dates='$date', reason='$reason', status='$status'";
  $result = mysqli_query($con,$query);

  if(isset($result))
  {
    $_SESSION['success'] = "Leave applied succesfully";
    header("location: schedules.php?id=".$docid);


  }








}














 ?>
