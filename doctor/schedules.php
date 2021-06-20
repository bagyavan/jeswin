<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Doctor Schedules</title>

    <script src="https://code.jquery.com/jquery-3.6.0.js" > </script>

    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <link rel="stylesheet" href="https://code.jquery.com/ui/1.11.3/themes/smoothness/jquery-ui.css">






  </head>
  <body>

  </body>
</html>

<?php

include('doc_header.php');


 ?>

<!-- CSS Done in style.css -->



<div class="schedulewrapper">
  <h2>Schedule Time</h2>
  <br>

  <div class="notes">
NOTE: You can schedule your duty hours accordingly for a maximum of upto 7 days from today.
  </div>
<br><br>


<div class="time" id="divschedule">

<form action="schedule_action.php" method="POST">



  <input type="text" name="froms" id="froms" placeholder="Choose your date" required><i class="fa fa-calendar" style="font-size:24px"></i>

  <input placeholder="Selected time" type="time" id="timepicker1" name="time1" required >
  <input placeholder="Selected time" type="time" id="timepicker2" name="time2" required >
  <input type="submit" name="submit" value="Schedule">

  <br>
  <br>
  <br>

</div>

</form>

  <script type="text/javascript">
      function ShowHideDiv(chkPassport) {
          var dvPassport = document.getElementById("dvPassport");
          dvPassport.style.display = chkPassport.checked ? "block" : "none";
          var hidesection = document.getElementById("divschedule");
          hidesection.style.display = chkPassport.checked ? "none" : "block"
      }
  </script>


<div class="leavecontent">
<form class="" action="index.html" method="post">

  <label for="chkPassport">
    <input type="checkbox" id="chkPassport" onclick="ShowHideDiv(this)" />
    Apply leave instead.
</label>

</form>
</div>

<br><br><br>
<div id="dvPassport" style="display: none">


    <br>

    <div class="time" id="divschedule">

    <form action="schedule_action.php" method="POST">



      <input type="text" name="fromss" id="fromss" placeholder="Choose your date" required>

      <label for="reason">Reason for leave</label>  <input type="text" name="reason" placeholder="Reason" value=""  required>

      <input type="submit" name="lsubmit" value="Apply Leave">

      <br>
      <br>
      <br>

    </div>

    </form>




</div>



</div>


<?php


$id = $_GET['id'];
$sql = "SELECT * from tbl_time WHERE doc_id='$id'";
$res = mysqli_query($con,$sql);

$sql2 = "SELECT * from tbl_leave WHERE doc_id='$id'";
$res2 = mysqli_query($con,$sql2);


 ?>

<div class="clearfixs">

</div>

<div class="schedulewrapper2">
<h2>Your schedules</h2> <br>

<table style="width: 100%;">
<tbody>
<tr>
<th>Date</th>
<th>Start time</th>
<th>End Time</th>
<th>Action</th>
</tr>

<?php
while($rows=mysqli_fetch_array($res))
  {
     $date=$rows['dates'];
     $time1=$rows['s_time'];
     $time2=$rows['e_time'];
     $timeid=$rows['time_id'];

     ?>




<tr>
<td> <?php echo $date; ?> </td>
<td> <?php echo $time1; ?> </td>
<td> <?php echo $time2; ?> </td>
<td>  <a href="#"><i class="fas fa-edit"></i></a>  &nbsp; &nbsp; <a href="del_schedule.php?id=<?php echo $id ?>&timeid=<?php echo $timeid  ?>  "> <i class="fa fa-trash" aria-hidden="true">  </i></a>  </td>
</tr>

<?php
}
?>
</tbody>
</table>

<br>
<h2>Leave status</h2>

<table style="width: 100%;">
<tbody>
<tr>
<th>Date</th>
<th>Reason</th>
<th>Status</th>
<th>Action</th>
</tr>

<?php
while($rows=mysqli_fetch_array($res2))
  {
     $date=$rows['dates'];
     $reason=$rows['reason'];
     $status=$rows['status'];
     $leaveid=$rows['leave_id'];

     ?>




<tr>
<td> <?php echo $date; ?> </td>
<td> <?php echo $reason; ?> </td>
<td>  <?php

if($status=='pending')
{
?>
<span style = "background-color: #ffa502; color: white;border-radius: 3px; cursor: pointer; font-size: 14px;">  <?php echo $status; ?> </span>
<?php

}

elseif ($status=='approved')
 {
   ?>
  <span style = "background-color: #2ed573; color: white;border-radius: 3px; cursor: pointer; font-size: 14px;">  <?php echo $status; ?> </span>
<?php
}

elseif ($status=='rejected')
 {
   ?>
  <span style = "background-color: #e74c3c; color: white;border-radius: 3px; cursor: pointer; font-size: 14px;">  <?php echo $status; ?> </span>
<?php
}


 ?>  </td>
<td>  <a href="#"><i class="fas fa-edit"></i></a>  &nbsp; &nbsp; <a href="del_schedule.php?id=<?php echo $id ?>&leaveid=<?php echo $leaveid  ?>  "> <i class="fa fa-trash" aria-hidden="true">  </i></a>  </td>
</tr>

<?php
}
?>
</tbody>
</table>



</div>




<script type="text/javascript">
var dateToday = new Date();
var dates = $("#froms").datepicker({
  defaultDate: "+1w",
  dateFormat: 'dd-mm-yy',
  changeMonth: true,
  numberOfMonths: 1,
  minDate: dateToday,
  onSelect: function(selectedDate) {
      var option = this.id == "froms" ? "minDate" : "maxDate",
          instance = $(this).data("datepicker"),
          date = $.datepicker.parseDate(instance.settings.dateFormat || $.datepicker._defaults.dateFormat, selectedDate, instance.settings);
      dates.not(this).datepicker("option", option, date);
  }
});
</script>


<script type="text/javascript">
var dateToday = new Date();
var dates = $("#fromss").datepicker({
  defaultDate: "+1w",
  dateFormat: 'dd-mm-yy',
  changeMonth: true,
  numberOfMonths: 1,
  minDate: dateToday,
  onSelect: function(selectedDate) {
      var option = this.id == "fromss" ? "minDate" : "maxDate",
          instance = $(this).data("datepicker"),
          date = $.datepicker.parseDate(instance.settings.dateFormat || $.datepicker._defaults.dateFormat, selectedDate, instance.settings);
      dates.not(this).datepicker("option", option, date);
  }
});
</script>
