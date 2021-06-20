<!--PHP script for insertion of value into registration table -->



<?php
include('config/constants.php');

if (isset($_POST['submit']))
{
 $fname=$_POST['fname'];
$lname=$_POST['lname'];
$dob=$_POST['dob'];
$email=$_POST['email'];
$mobile=$_POST['mobile'];
$gender=$_POST['gender'];
$address=$_POST['address'];
$password=md5($_POST['password']);

$sql="INSERT INTO register SET fname='$fname',lname='$lname',dob='$dob',email='$email',mobile='$mobile',gender='$gender',address='$address',password='$password'";

$res=mysqli_query($con,$sql) or die (mysqli_error());
}

/*Session variable set here */

if($res==TRUE)
{
$_SESSION['add'] = "Registered Succesfully, Please LogIn";
header("location: login.php");

}


else {
  $_SESSION['add'] = "Cant Register, Please try again";


}

 ?>
