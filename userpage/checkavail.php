<?php
include('../config/constants.php');

 ?>

<?php
$docid=$_GET['id'];
$dates=$_POST['from'];
$_SESSION['dates'] = $dates;


$query = "SELECT doc_id, dates, status FROM tbl_leave WHERE doc_id='$docid' AND dates='$dates' AND status='approved'";
$res = mysqli_query($con,$query);

if(mysqli_num_rows($res)>=1)
{

$_SESSION['docstatus'] = "Appointment cannot be done on the selected date";
                  // This means doctor is not available
header("location:bookapp.php?id=".$docid);

}

if(mysqli_num_rows($res)==0)
{

  $query3 = "SELECT dates FROM tbl_time WHERE dates='$dates' AND doc_id='$docid'";
  $res3 = mysqli_query($con,$query3);
}

  if(mysqli_num_rows($res3)==0)
  {
    // This means schedule is not entered
    $_SESSION['docstatus'] = "Doctor Schedule is not entered";
header("location:bookapp.php?id=".$docid);


  }




  if(mysqli_num_rows($res3)>=1)
  {
    // This means Appointment is possible on the selected date
    $_SESSION['docstatus'] = "Appointment available.";
header("location:bookapp.php?id=".$docid);

  }







 ?>
