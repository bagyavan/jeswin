
<?php


include('logincheck.php');
 ?>


<?php
// queries here
if(isset($_SESSION['userid']))
{
  $id = $_SESSION['userid'];
}

$query = "SELECT * FROM register WHERE  reg_id='$id'";
$res = mysqli_query($con,$query);

while($rows = mysqli_fetch_array($res))
  {
     $fname=$rows['fname'];
     $lname = $rows['lname'];
     $dob = $rows['dob'];
     $email = $rows['email'];
     $mobile = $rows['mobile'];
     $gender = $rows['gender'];
     $address = $rows['address'];
   }
$name = $fname ." " .$lname;

 ?>

 <?php

$query1 = "SELECT * FROM tbl_appo WHERE reg_id = '$id' ";
$res1 = mysqli_query($con,$query1);
while($rows = mysqli_fetch_array($res1))
{
$appoid = $rows['appo_id'];
$docid= $rows['doc_id'];
$apponum = $rows['appo_num'];
$dates = $rows['dates'];
$status = $rows['status'];
$arrival = $rows['arrival'];

}

if(mysqli_num_rows($res1)>0)
{
$query2 = "SELECT * FROM tbl_doc WHERE doc_id='$docid'";
$res2 = mysqli_query($con,$query2);
while($rows = mysqli_fetch_array($res2))
{
$docname = $rows['name'];
$speciality = $rows['speciality'];


}

$fletter = $docname[3];
}
  ?>
