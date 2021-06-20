<?php
include('doc_header.php');
$email = $_SESSION['username'];

$sql = "SELECT * FROM tbl_doc WHERE email='$email'";
$res = mysqli_query($con,$sql);

while($rows=mysqli_fetch_array($res))
{

  $name=$rows['name'];
  $speciality=$rows['speciality'];
  $uid=$rows['uid'];
  $address=$rows['address'];
  $contact=$rows['contact'];
  $email=$rows['email'];

}
 ?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
    <link rel="stylesheet" href="doc_style.css">

  </head>
  <body>
<form method="POST" action="#" >
<div class="profilebox">

<div class="topbox">
  <img src="doctor1.png" alt="">
  <input  type="submit" name="submit" value="SAVE">

  <div class="boxdetails">
    <h3><?php echo $name; ?></h3>
    <i><?php echo $speciality; ?></i> <br>
    <?php echo $uid; ?>
  </div>

</div>
<hr>
<div class="bottombox">
  <table>
    <tr>

      <th>Department</th>
      <th>Address</th>
      <th>Contact</th>
      <th>Email</th>
    </tr>

    <tr>

      <td> <input type="text" name="" value=" <?php echo $speciality; ?> " disabled> </td>
      <td> <input type="text" name="address" value=" <?php echo $address; ?> "> </td>
      <td> <input type="text" name="contact" value=" <?php echo $contact; ?> "> </td>
      <td> <input type="text" name="email" value="<?php echo $email; ?>" disabled> </td>
</form>
    </tr>
  </table>

</div>

</div>

<?php

if(isset($_POST['submit']))
{
$address = $_POST['address'];
$contact = $_POST['contact'];


$query = "UPDATE tbl_doc SET address = '$address',contact = '$contact', email = '$email' WHERE email = '$email'";
$res = mysqli_query($con,$query);

if(isset($res))
{
$_SESSION['update'] = "Profile Updated Succesfully";
header ("location: doc_profile.php");

}
}


 ?>

  </body>
</html>
