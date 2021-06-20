<?php
include('../navbarmain.php');
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
    <link rel="stylesheet" href="../admin/adminstyle.css">
    <link rel="stylesheet" href="../style.css">
  </head>
  <body>

<div class="adddoc_content_doc">

<form class="" action="doc_reg_action.php" method="POST">


<input type="text" name="name" value="" placeholder="Enter your Name..." required> <br>

<select name="speciality" required>
  <option disabled selected>Choose Speciality</option>
  <?php

$sql = mysqli_query($con, "SELECT speciality FROM tbl_speciality");

while ($row = $sql->fetch_assoc())
{

?>

<option><?php echo $row['speciality']; ?></option>

<?php
// close while loop
}
?>
  </select> <br>

<input type="text" name="uid" value="" style="text-transform: uppercase; " placeholder="Enter Unique ID..." required> <br>

<label class="gender">Male</label>   <input id="gender" type="radio" name="gender" value="MALE">

<label class="gender">Female</label>   <input id="gender" type="radio" name="gender" value="FEMALE"> <br>

<input type="text" name="address" value="" placeholder="Enter your address..." required> <br>

<input type="text" name="contact" value="" placeholder="Enter Phone Number..." required> <br>

<input type="text" name="email" value="" placeholder="Enter Email Id..." required> <br>

<input type="password" name="password" value="" placeholder="Create a password.." required>

<br>
<input type="password" name="password" value="" placeholder="Confirm password.." required>

<div class="spl_message">
<p>




</p>
</div>
<br>
<input type="submit" name="submit" value="Register" id="add">
</form>

</div>


<div class="spl-content-added">

<!--To print speciality added -->





<br>


</div>







  </body>



</html>
