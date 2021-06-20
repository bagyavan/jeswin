


<?php

include ('../config/constants.php');
if(isset($_POST['submit']))
{
$password = md5($_POST['confpass']);
$email = $_SESSION['username'];


$query = "UPDATE tbl_doc SET password = '$password' WHERE email = '$email'";
$result = mysqli_query($con,$query);


if(isset($result))
{
$_SESSION['pswd_done'] = "Password Changed Succesfully";
header ("location: doc_profile.php");

}


}
 ?>
