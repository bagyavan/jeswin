<?php

include('../config/constants.php');
include('logincheck.php');


 ?>


<?php

$leaveid = $_GET['leaveid'];
$type = $_GET['type'];

if($type==1)
{

$query1 = "UPDATE tbl_leave SET status='rejected' WHERE leave_id='$leaveid'";
$res = mysqli_query($con,$query1);

if(isset($res))
{
  usleep(1000000);
  header("location:manageleave.php");


}
}

if($type==2)
{

$query2 = "UPDATE tbl_leave SET status='approved' WHERE leave_id='$leaveid'";
$res2 = mysqli_query($con,$query2);

if(isset($res2))
{
  usleep(1000000);
  header("location:manageleave.php");

}

}


 ?>
