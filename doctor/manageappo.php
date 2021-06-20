<?php

include('doc_header.php');
 ?>

<!-- CSS applied to docpage.css -->
 <!DOCTYPE html>
 <html lang="en" dir="ltr">
   <head>
     <meta charset="utf-8">
     <title>Manage Appointments</title>
   </head>
   <body>
     <br><br>
<?php
if(isset($_SESSION['complete']))
{
?>
<div class="successs">
  <?php echo $_SESSION['complete'];
        // unset($_SESSION['complete']);
  ?>
</div>
<?php
}

 ?>


<h3>Appointments</h3> <br><br>
<?php
date_default_timezone_set('Asia/Kolkata');
  $today = date("d-m-Y");



 ?>
<?php
$query = "SELECT * FROM tbl_appo WHERE dates='$today' AND doc_id='$docid' AND arrival='Yes' AND status='Booked'";
$res = mysqli_query($con,$query);



if(mysqli_num_rows($res)==0)
{
echo "There is no pending Appointments";

}

elseif(mysqli_num_rows($res)>0)
{
?>
<div class="appotable">
<table>
<tbody>
<tr>
<th>Appo num</th>
<th>Name</th>
<th>Arrival status</th>
<th>Action</th>
</tr>
<?php
while($rows=mysqli_fetch_array($res))
{
  $appoid = $rows['appo_id'];
  $apponum = $rows['appo_num'];
  $pname = $rows['p_name'];
  $arrival = $rows['arrival'];
?>
<tr>
<td><?php echo $apponum; ?></td>
<td><?php echo $pname; ?></td>
<td><?php echo $arrival; ?></td>
<td> <a href="attendappo.php?appoid=<?php echo $appoid; ?>"><input type="button" name="attend" value="Attend this Appointments"></a>  </td>
</tr>


<?php
}
?>
</tbody>
</table>
<?php
}
?>

   </body>
 </html>
