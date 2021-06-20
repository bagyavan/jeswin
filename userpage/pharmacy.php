<?php
include('userheader.php');

 ?>
<?php
$regid = $_SESSION['userid'];

$query = "SELECT appo_num,dates FROM tbl_appo WHERE reg_id='$regid'";
$res = mysqli_query($con,$query);
while($rows=mysqli_fetch_array($res))
{
  $apponum = $rows['appo_num'];
  $dates = $rows['dates'];
?>
<br><br>


<div class="w3-card-4" style="width:30%;margin-left:20px;">
    <header class="w3-container w3-blue" style="padding:7px;">
      <p>Appointment No : <?php echo $apponum; ?> &nbsp; &nbsp; Date: <?php echo $dates; ?></p>
    </header>









<?php
$query2 = "SELECT doc_id,med_name,med_dose,med_days FROM tbl_med WHERE appo_num='$apponum'";
$res2 = mysqli_query($con,$query2);
?>
<table id="medtable" class="medt">
<tbody>
<tr>
<th>Med Name</th>
<th>Dose</th>
<th>Days</th>
</tr>
<?php
while($rowss=mysqli_fetch_array($res2))
{

  $medname = $rowss['med_name'];
  $dosecount = $rowss['med_dose'];
  $days = $rowss['med_days'];
  ?>
  <div class="w3-container">
    <p>
      <tr>
<td><?php echo $medname; ?></td>
<td><?php echo $dosecount; ?></td>
<td><?php echo $days; ?></td>
</tr>

    </p>

</div>

<?php

}
?>

</tbody>
</table>
<?php
$query3 = "SELECT doc_id FROM tbl_appo WHERE reg_id='$regid'";
$res3 = mysqli_query($con,$query3);
while($rowsss=mysqli_fetch_array($res3))
{
  $docid = $rowsss['doc_id'];

}

 ?>


<!-- <footer class="w3-container w3-red">
  <p>Consulted by :  </p>
</footer> -->
<?php

 ?>
</div>


<?php
}


 ?>




<?php




 ?>
