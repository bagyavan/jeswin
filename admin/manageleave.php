<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Manage Leave</title>
  </head>
  <body>
<?php
include('adminmoreheader.php');
 ?>

<br><br>

<input type="text" id="myInput" onkeyup="myFunction()" placeholder="Search for Doctor name.."> <br>
<?php
$query1 = "SELECT * FROM tbl_leave";
$res = mysqli_query($con,$query1);

if(isset($res))
{
?>
<table id="myTable">
<tbody>
<tr>
  <th>Doctor Name</th>
<th>Date</th>
<th>Reason</th>
<th>Status</th>
<th>Action</th>
</tr>

<?php


while($rows=mysqli_fetch_array($res))
  {
     $date=$rows['dates'];
     $reason=$rows['reason'];
     $status=$rows['status'];
     $leaveid=$rows['leave_id'];
     $docid=$rows['doc_id'];
?>
              <!-- PHP To find doctor name with id -->
<?php
$query2 = "SELECT name FROM tbl_doc WHERE doc_id='$docid'";
$res2 = mysqli_query($con,$query2);

while($rows=mysqli_fetch_array($res2))
  {
     $docname=$rows['name'];
}
 ?>


     <tr>
      <td> <?php echo $docname; ?> </td>
     <td> <?php echo $date; ?> </td>
     <td> <?php echo $reason; ?> </td>
     <td>  <?php

     if($status=='pending')
     {
     ?>
     <span style = "background-color: #ffa502; color: white;border-radius: 1px; cursor: pointer; font-size: 15px; padding:3px;">  <?php echo $status; ?> </span>
     <?php

     }

     elseif ($status=='approved')
      {
        ?>
       <span style = "background-color: #2ed573; color: white;border-radius: 1px; cursor: pointer; font-size: 15px; padding:3px;">  <?php echo $status; ?> </span>
     <?php
     }

     elseif ($status=='rejected')
      {
        ?>
       <span style = "background-color: #e74c3c; color: white;border-radius: 1px; cursor: pointer; font-size: 15px; padding:3px;">  <?php echo $status; ?> </span>
     <?php
     }


      ?>  </td>

      <td>  <a href="leaveaction.php?leaveid=<?php echo $leaveid?>&type=1"><i class="fa fa-ban" aria-hidden="true" title="reject"></i></a> &nbsp; &nbsp; <a href="leaveaction.php?leaveid=<?php echo $leaveid?>&type=2"><i class="fa fa-check" aria-hidden="true" title="approve"></i></a> </td>




<?php
}
}

 ?>
</table>

<script>
function myFunction() {
  // Declare variables
  var input, filter, table, tr, td, i, txtValue;
  input = document.getElementById("myInput");
  filter = input.value.toUpperCase();
  table = document.getElementById("myTable");
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

  </body>
</html>
