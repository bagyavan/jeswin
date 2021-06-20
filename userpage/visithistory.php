<?php
include('userheader.php');

 ?>

 <!DOCTYPE html>
 <html lang="en" dir="ltr">
   <head>
     <meta charset="utf-8">
     <title>Visit History</title>
   </head>
   <body>
     <div class="visithistory">
       <br>
       <h3>Visit History</h3>
       <br>
<?php
$regid = $_SESSION['userid'];
$query = "SELECT * FROM tbl_appo WHERE reg_id='$regid' AND status='Complete'";
$res = mysqli_query($con,$query);
while($rows=mysqli_fetch_array($res))
{
  $apponum = $rows['appo_num'];
  $pname = $rows['p_name'];
  $dates = $rows['dates'];
  $status = $rows['status'];
  $docid = $rows['doc_id'];
?>
<?php
$query2 = "SELECT name FROM tbl_doc  WHERE doc_id='$docid'";
$res2 = mysqli_query($con,$query2);
while($rowss=mysqli_fetch_array($res2))
{
  $docname = $rowss['name'];
}



 ?>


<div class="historycard">
<div class="box1">
  <div class="w3-container">


    <div class="w3-card-4" style="width:90%;height:250px;">
      <header class="w3-container w3-blue">
        <h5>Appointment <?php echo $apponum; ?></h5>
      </header>

      <div class="w3-container">
        <p>
          <h5 style="font-weight:bold;"><?php echo $pname; ?></h5>

          with <strong><?php echo $docname; ?></strong>
          on <br> <?php echo $dates; ?> <br><br>
          Appointment status: <span style="color:#44bd32;font-weight:bold;"><?php echo $status; ?></span>



        </p>
      </div>


    </div>
  </div>
</div>




</div>



<?php
}


 ?>






     </div>

   </body>
 </html>
