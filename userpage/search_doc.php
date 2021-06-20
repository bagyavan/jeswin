<?php

$speciality = $_POST['speciality'];

$sql = "SELECT * FROM tbl_doc WHERE speciality = '$speciality'";

$res = mysqli_query($con,$sql);




while($rows = mysqli_fetch_array($res))
  {
     $name=$rows['name'];
     $speciality=$rows['speciality'];
     $gender=$rows['gender'];


}

?>
