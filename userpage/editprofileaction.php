<?php
include('../config/constants.php');
include('logincheck.php');

 ?>

<?php
$id = $_SESSION['userid'];
$fname = $_GET['fname'];
$lname = $_GET['lname'];
// $dob = $_GET['dob'];
$email = $_GET['email'];
$mobile = $_GET['mobile'];
$address = $_GET['address'];


$query = "UPDATE register SET fname='$fname',lname='$lname',email='$dob',email='$email',mobile='$mobile',address='$address' WHERE reg_id = $id";
$res = mysqli_query($con,$query);

if(isset($res))
{
$_SESSION['message'] = "Profile Updated Succesfully";
header("location:useraccount.php");
}

elseif(!isset($res))
{
echo "something went wrong";

}




 ?>
