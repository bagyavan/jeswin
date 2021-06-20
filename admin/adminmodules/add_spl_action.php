<?php
include('../../config/constants.php');

if(isset($_POST['submit']))
{

  $speciality = $_POST['speciality'];

//Checking for duplicates
$sql1= "SELECT speciality from tbl_speciality where speciality='$speciality'";
$checks = mysqli_query($con,$sql1);
if(mysqli_num_rows($checks)==1)
{
  $_SESSION['add'] = "Multiple Speciality Detected!";
  //  header("location: ../adminhome.php");
  header("location: ../adminhome.php?section=specialisation");

}
else {


//inserting

  $sql = "INSERT INTO tbl_speciality SET speciality='$speciality'";

  $res=mysqli_query($con,$sql) or die (mysqli_error());

  if($res)
  {
    
      //session create for message
      $_SESSION['add'] = "Speciality added Succesfully";
      header("location: ../adminhome.php?section=specialisation");

  }

  else {

    $_SESSION['add'] = "Speciality adding failed";
    //  header("location: ../adminhome.php");
    header("location: ../adminhome.php?section=specialisation");
  }
}

}






 ?>
