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


<style>
                                        /* Change Password form CSS here */

input[type=password] {
  width: 50%;

  padding: 12px 20px;
  margin: 8px 0;
  box-sizing: border-box;
}

input[type=submit]
{

background-color: #2C3A47;
cursor: pointer;
color: white;
padding: 1%;
position: relative;
left: 17%;

}

</style>



  </head>
  <body>
<div class="success">
  <?php
          if(isset($_SESSION['update']))
          {

              echo $_SESSION['update'];
              unset ($_SESSION['update']);

          }


          if(isset($_SESSION['pswd_done']))
          {

              echo $_SESSION['pswd_done'];
              unset ($_SESSION['pswd_done']);

          }
   ?>
</div>


<div class="profilebox">

<div class="topbox">
  <img src="doctor1.png" alt="">
  <a href="doc_profile_edit.php">Edit Profile</a>
  <div class="boxdetails">
    <h3> <?php echo $name; ?> </h3>
    <i> <?php echo $speciality; ?> </i> <br>
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

      <td> <?php echo $speciality; ?> </td>
      <td> <?php echo $address; ?> </td>
      <td> <?php echo $contact; ?> </td>
      <td> <?php echo $email; ?> </td>
    </tr>
  </table>

</div>

</div>


<!-- Change Password Block Starts Here -->

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>



<div class="changepswd">

<h3>Change password</h3>
<br><br>
<form  action="update_pass.php" method="POST">

  <input type="password" name="pass" value="" placeholder="Enter new password..." id="txtNewPassword">
  <br><br>
  <input type="password" name="confpass" value="" placeholder="Confirm new password..." id="txtConfirmPassword">
  <br><br>
  <div class="registrationFormAlert" style="color:green;" id="CheckPasswordMatch">
  </div>
    <br>



  <script>
      function checkPasswordMatch() {
          var password = $("#txtNewPassword").val();
          var confirmPassword = $("#txtConfirmPassword").val();
          if (password != confirmPassword)
              $("#CheckPasswordMatch").html("Passwords does not match!");
          else
              $("#CheckPasswordMatch").html("Passwords match.");
      }
      $(document).ready(function () {
         $("#txtConfirmPassword").keyup(checkPasswordMatch);
      });
      </script>


  <input type="submit" name="submit" value="Change password">
</form>




<br><br><br>



</div>











  </body>
</html>
