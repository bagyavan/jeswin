<?php
include('adminmoreheader.php');
 ?>
<br>
<!-- CSS applied to adminmore.css -->
<h3>Manage Appointments</h3>
<div class="dateandtime">
  <?php

  echo "Today is " . date("d-m-Y") . ", &nbsp" . date("l");

   ?>
<br><br>
<?php
if(isset($_SESSION['arrival']))
{
echo $_SESSION['arrival'];
unset($_SESSION['arrival']);

}


 ?>




   <?php
$query = "SELECT * from tbl_appo";
$res = mysqli_query($con,$query);
?>
<br><br>
<input type="text" id="myInput" onkeyup="myFunction()" placeholder="Search for Appointment number.."> <br>
<table id="manageappotable">
<tbody>
<tr>
<th>Appo No</th>
<th>Name</th>
<th>Doc name</th>
<th>Date</th>
<th>Status</th>
<th>Arrival</th>
<th>Action</th>
</tr>

<?php
while($rows=mysqli_fetch_array($res))
{
  $appoid = $rows['appo_id'];
  $docid = $rows['doc_id'];
  $regid = $rows['reg_id'];
  $apponum = $rows['appo_num'];
  $pname = $rows['p_name'];
  $dates = $rows['dates'];
  $status = $rows['status'];
  $arrival = $rows['arrival'];
?>
<?php
$query1 = "SELECT * FROM tbl_doc WHERE doc_id='$docid'";
$res1 = mysqli_query($con,$query1);
while($rowss=mysqli_fetch_array($res1))
{
  $docname = $rowss['name'];
}



 ?>


<tr>
<td><?php echo $apponum; ?></td>
<td><?php echo $pname; ?></td>
<td><?php echo $docname ?></td>
<td><?php echo $dates; ?></td>
<td><?php echo $status; ?></td>
<td><?php echo $arrival; ?></td>
<td> <a href="arrivalaction.php?id=<?php echo $appoid;?>&action=1"><i class="fa fa-check" aria-hidden="true" title="arrived"></i></a>  &nbsp; <a href="arrivalaction.php?id=<?php echo $appoid;?>&action=2"><i class="fa fa-times" aria-hidden="true" title="not arrived"></i></a>  </td>
</tr>




<?php
}
?>
</tbody>
</table>


<script>
function myFunction() {
  // Declare variables
  var input, filter, table, tr, td, i, txtValue;
  input = document.getElementById("myInput");
  filter = input.value.toUpperCase();
  table = document.getElementById("manageappotable");
  tr = table.getElementsByTagName("tr");

  // Loop through all table rows, and hide those who don't match the search query
  for (i = 0; i < tr.length; i++) {
    td = tr[i].getElementsByTagName("td")[0];
    if (td) {
      txtValue = td.textContent || td.innerText;
      if (txtValue.toUpperCase().indexOf(filter) > -1) {
        tr[i].style.display = "";
      } else {
        tr[i].style.display = "none";
      }
    }
  }
}
</script>
