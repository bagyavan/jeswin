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


<div class="spl-content">

<form class="" action="adminmodules/add_spl_action.php" method="POST">


<input type="text" name="speciality" value="" placeholder="Enter speciality..." required>

<div class="spl_message">
<p>


<?php
if(isset($_SESSION['add']))
{

//echo $_SESSION['add'];
$chk=$_SESSION['add'];
if($chk=="Multiple Speciality Detected!")
{
  ?><p style="color:red;">Multiple Speciality Detected!<p> <?php
}
else if($chk=="Speciality added Succesfully")
  {
    ?><p style="color:green;">Speciality added Succesfully<p> <?php
  }
}

unset($_SESSION['add']);

 ?>
</p>
</div>
<br>
<input type="submit" name="submit" value="Add Speciality" id="add">
</form>

</div>


<div class="spl-content-added">

<!--To print speciality added -->

<?php
$sql = "SELECT * FROM tbl_speciality";
$res = mysqli_query($con,$sql);

if($res==TRUE)
{
$count = mysqli_num_rows($res);
if($count>0)
{
//data in database

  while($rows=mysqli_fetch_assoc($res))
    {
       $spec=$rows['speciality'];

       ?>
        <table id="customers">

         <tr>
           <td> <?php echo $spec; ?> </td>
            <td><a href="adminmodules/delete.php?id=<?php echo $rows['spl_id']; ?>"> <i class="fa fa-trash" aria-hidden="true">  </i> </a></td>


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
