<?php

?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
    <link rel="stylesheet" href="../adminstyle.css">
  </head>
  <body>

<div class="adddoc_content">

<form class="" action="adminmodules/add_doc_action.php" method="POST">


<input type="text" name="name" value="" placeholder="Enter Doctor Name..." required> <br>

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

<input type="password" name="password" value="" placeholder="Generate password" required>
<br>

<div class="spl_message">
<p>
<?php

if(isset($_SESSION['adds']))
{


$chk=$_SESSION['adds'];
if($chk=="Doctor already Exist !. Please check again.")
{
  ?><p style="color:red;">Doctor already Exist.<p> <?php
}
else if($chk=="Doctor added ")
  {
    ?><p style="color:green;">Doctor added Succesfully<p> <?php
  }
}

unset($_SESSION['adds']);

 ?>



</p>
</div>
<br>
<input type="submit" name="submit" value="Add Doctor" id="add">
</form>

</div>


<div class="spl-content-added">

<!--To print speciality added -->

<?php

$sql = "SELECT * FROM tbl_doc";
$res = mysqli_query($con,$sql);

if($res==TRUE)
{
$count = mysqli_num_rows($res);
if($count>0)
{
//data in database

  while($rows=mysqli_fetch_assoc($res))
    {
       $spec=$rows['name'];
       $status=$rows['status'];
       if($status==0)
       {

         $status_final = "Active";
       }
       elseif($status==1)
       {
         $status_final = "Disabled";
       }

       else
       {
         $status_final = "Waiting approval";
       }

       ?>

        <table id="customers" style="position:relative;bottom:400px;left:140px;">


         <tr>
           <td> <?php echo $spec; ?> </td>
           <td> <?php echo $status_final; ?> </td>
           <td><a href="adminmodules/delete_doc.php?id=<?php echo $rows['doc_id']; ?>"> <i class="fa fa-trash" aria-hidden="true">  </i> </a></td>
         </tr>
</table>


       <?php

    }
}

else {
  //No data in database
}

}

 ?>



<br>


</div>







  </body>



</html>
