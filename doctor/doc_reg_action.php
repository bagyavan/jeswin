<?php
include('../config/constants.php');

if(isset($_POST['submit']))
{
  $name = $_POST['name'];
  $speciality = $_POST['speciality'];
  $uid = $_POST['uid'];
  $gender = $_POST['gender'];
  $address = $_POST['address'];
  $contact = $_POST['contact'];
  $email = $_POST['email'];
  $password = md5($_POST['password']);
  $status = 2;

//Checking for duplicates
$sql1= "SELECT uid from tbl_doc where uid='$uid'";
$checks = mysqli_query($con,$sql1);
if(mysqli_num_rows($checks)==1)
{
  $_SESSION['exist'] = "You are already registered. Wait for approval";
  //  header("location: ../adminhome.php");
  header("location: doc_login.php");

}
else {


//inserting

  $sql = "INSERT INTO tbl_doc SET name='$name',speciality='$speciality',uid='$uid',gender='$gender',address='$address',contact='$contact',email='$email',password='$password',status='$status'";

  $res=mysqli_query($con,$sql) or die (mysqli_error());

  if($res)
  {
      //session create for message
      $_SESSION['exist'] = "You are Succesfully registered, Please wait for admin approval";
      header("location: doc_login.php");

  }

  else {

    $_SESSION['exist'] = "Something went wrong. Please try again later";
    //  header("location: ../adminhome.php");
    header("location: doc_login.php");
  }
}

}






 ?>
