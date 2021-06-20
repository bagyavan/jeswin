
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>

<script src="https://code.jquery.com/jquery-3.6.0.js" > </script>

<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<link rel="stylesheet" href="https://code.jquery.com/ui/1.11.3/themes/smoothness/jquery-ui.css">



<script>

var close = document.getElementsByClassName("closebtn");
var i;


for (i = 0; i < close.length; i++) {

  close[i].onclick = function(){
    var div = this.parentElement;
    div.style.opacity = "0";

    setTimeout(function(){ div.style.display = "none"; }, 600);
  }
}


</script>



  </head>
  <body>



  </body>
</html>


<?php
include('userheader.php');
$id = $_GET['id'];
if(isset($id))
{

usleep(1000000);

$query = "SELECT * FROM tbl_doc WHERE doc_id='$id'";

$res = mysqli_query($con,$query);


while($rows = mysqli_fetch_array($res))
  {
     $name=$rows['name'];
     $speciality=$rows['speciality'];
     $gender=$rows['gender'];

     $fletter = $name[3];
?>

<br><br><br>

<div class="containerprogress">
     <ul class="progressbar">
       <li class="active">Doctor Selection</li>
       <li class="active">Choose Date</li>
       <li>Booking Done</li>

     </ul>
   </div>
<br><br>












<?php
if(isset($_SESSION['docstatus']))
{

?>

<div class="alert">
<span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span>
<?php echo $_SESSION['docstatus'];

 ?>
</div>



<?php

  }


?>



<?php

  }


}

 ?>






<div class="booknow">

  <div class="grid-containers">


    <div class="title">Choose date</div>
    <div class="img"> <?php echo $fletter; ?> </div>
    <div class="details">
      <h3><?php echo $name; ?> </h3>
      <i class="fa fa-stethoscope" aria-hidden="true"> &nbsp; </i> <?php echo $speciality; ?>
      &nbsp;  <i class="fa fa-user" aria-hidden="true"></i> &nbsp; <?php echo $gender; ?>
      &nbsp;  <i class="fa fa-book" aria-hidden="true"></i> &nbsp; <?php echo "MBBS,MD,DM"; ?>

     </div>
    <div class="date">
<form  action="checkavail.php?id=<?php echo $id; ?> " method="POST">

<script type="text/javascript">

function changedate()
{

  var x = document.getElementById("demo");
  var y = document.getElementById("continue");
  var z = document.getElementById("refresh");
  var d = document.getElementById("from");

if (x.style.visibility === "hidden") {
  x.style.visibility = "visible";
  y.style.visibility = "hidden";
  z.style.visibility = "hidden";
  d.style.cursor = "pointer";
  d.disabled = false;
}

document.getElementById("from").focus();




}

</script>



<input type="text" name="from" id="from" placeholder="Choose your date" value="<?php
if(isset($_SESSION['dates']))
{

echo $_SESSION['dates'];


}
 ?>" required><i class="fa fa-calendar" style="font-size:24px"></i> <i id="refresh" style="visibility:hidden;" class="fa fa-refresh" aria-hidden="true" title="Change Date" onclick="changedate()"></i>





  <input style="visibility:visible;" type="submit" name="submit" id="demo"  value="Check Availablility"> </input>
</form>
<form  action="bookfinal.php?id=<?php echo $id; ?>" method="post">
  <input style="visibility:hidden;"  type="submit" name="fsubmit" id="continue" value="Book Appointment"> </input>
</form>




  <?php
  if(isset($_SESSION['docstatus']))
  {
  $buttontest=$_SESSION['docstatus'];

  if($buttontest=="Appointment available.")

  {
  ?>
  <script type="text/javascript">
  function showbutt()
  {
    var x = document.getElementById("demo");
    var y = document.getElementById("continue");
    var z = document.getElementById("refresh");
    var d = document.getElementById("from");
  if (x.style.visibility === "visible") {
    x.style.visibility = "hidden";
    y.style.visibility = "visible";
    z.style.visibility = "visible";
    d.style.cursor = "no-drop";
    d.disabled = true;
  }

  }
  </script>

    <?php
    echo "<script>";
     echo "showbutt();";
     echo "</script>";
  }
  }
  ?>







    </div>
  </div>

</div>

<script type="text/javascript">
var dateToday = new Date();
var dates = $("#from").datepicker({
  // defaultDate: "+1w",
  dateFormat: 'dd-mm-yy',
  changeMonth: true,
  numberOfMonths: 1,
  minDate: dateToday,
  onSelect: function(selectedDate) {
      var option = this.id == "from" ? "minDate" : "maxDate",
          instance = $(this).data("datepicker"),
          date = $.datepicker.parseDate(instance.settings.dateFormat || $.datepicker._defaults.dateFormat, selectedDate, instance.settings);
      dates.not(this).datepicker("option", option, date);
  }
});
</script>

<?php


 ?>
