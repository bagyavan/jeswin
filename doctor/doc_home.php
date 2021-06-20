<?php

include('doc_header.php');


 ?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>

  </head>
  <body>
    <div class="alert-msg-success">




      <?php


        if (isset($_SESSION['login']))
         {
          echo $_SESSION['login'];
          unset($_SESSION['login']);
        }
       ?>

       <?php

       $_SESSION['check'] = "Please login to continue";
       if (isset($_SESSION['check']))
        {

       }

       else {
         header("location: doc_login.php");
       }

        ?>

    </div>

    <!-- CSS applied in docpage.css -->
<h3>Dashboard</h3>
<div class="dateandtime">
  <?php
date_default_timezone_set('Asia/Kolkata');
  echo "Today is " . date("d-m-Y") . ", &nbsp" . date("l");
$today = date("d-m-Y");
   ?>
</div>

<?php
// for appointments in queue
$query = "SELECT COUNT(*) FROM tbl_appo WHERE doc_id='$docid' AND status='Booked' AND arrival='Yes' AND dates='$today'";
$res = mysqli_query($con,$query);
$rows = mysqli_fetch_row($res);


// for done Appointment
$query1 = "SELECT COUNT(*) FROM tbl_appo WHERE doc_id='$docid' AND status='Complete' AND arrival='Yes' AND dates='$today'";
$res = mysqli_query($con,$query1);
$rowss = mysqli_fetch_row($res);

// for pending appointments
$query2 = "SELECT COUNT(*) FROM tbl_appo WHERE doc_id='$docid' AND status='Booked' AND arrival='Yes' AND dates='$today'";
$res1 = mysqli_query($con,$query2);
$rowsss = mysqli_fetch_row($res1);


 ?>

<div class="docappocounterparent">
  <div class="docappocounter">
    <span><?php echo $rowsss[0]; ?></span> <br>
  Pending Appointments
  <br><br><br>
  <a href="manageappo.php" > <button  type="button" name="button" title="Start Consult">Start Consult <i class="fa fa-arrow-right" aria-hidden="true"></i></button>  </a> &nbsp;&nbsp;
  <a > <button onclick="document.getElementById('id02').style.display='block'" type="button" name="button" title="Manage Appointments">Go to <i class="fa fa-arrow-right" aria-hidden="true"></i></button>  </a>
  </div>
  <div class="docappocounter">
    <span><?php echo $rowss[0]; ?></span> <br>
  Appointment done today
  <br><br><br>
  <a > <button onclick="document.getElementById('id01').style.display='block'" type="button" name="button" title="Manage Appointments">Go to <i class="fa fa-arrow-right" aria-hidden="true"></i></button>  </a>

  </div>
  <div class="docappocounter">
<span><?php echo $rows[0]; ?></span> <br>
In Queue
<br><br><br>
<a> <button type="button" name="button" title="Manage Appointments">Go to <i class="fa fa-arrow-right" aria-hidden="true"></i></button>  </a>
  </div>

</div>

<!-- Modal Class Starts Here -->

<div id="id01" class="w3-modal">
    <div class="w3-modal-content w3-animate-top w3-card-4">
      <header class="w3-container w3-teal">
        <span onclick="document.getElementById('id01').style.display='none'"
        class="w3-button w3-display-topright">&times;</span>
        <h3 style="color:white;">Appointments Done today</h3>
      </header>
      <div class="w3-container">
<?php

$mquery = "SELECT appo_num,p_name FROM tbl_appo WHERE doc_id='$docid' AND dates='$today' AND status='Complete' AND arrival='Yes'";
$mres = mysqli_query($con,$mquery);
?>
<table id="adonetoday">
<tbody>
<tr>
<th>Appointment No</th>
<th>Patient Name</th>
</tr>
<?php
while($mrows=mysqli_fetch_array($mres))
{
  $pname = $mrows['p_name'];
  $apponum = $mrows['appo_num'];
?>
<tr>
<td><?php echo $apponum; ?></td>
<td><?php echo $pname; ?></td>
</tr>
<?php

}



 ?>
</tbody>
</table>

      </div>
      <!-- <footer class="w3-container w3-teal">
        <p>Modal Footer</p>
      </footer> -->
    </div>
  </div>



<!-- Modal Class 2 starts here -->

<div id="id02" class="w3-modal">
    <div class="w3-modal-content w3-animate-top w3-card-4">
      <header class="w3-container w3-teal">
        <span onclick="document.getElementById('id02').style.display='none'"
        class="w3-button w3-display-topright">&times;</span>
        <h3 style="color:white;">Pending Appointments</h3>
      </header>
      <div class="w3-container">
<?php

$mquery1 = "SELECT appo_num,p_name FROM tbl_appo WHERE doc_id='$docid' AND dates='$today' AND status='Booked' AND arrival='Yes'";
$mres1 = mysqli_query($con,$mquery1);
?>
<table id="adonetoday">
<tbody>
<tr>
<th>Appointment No</th>
<th>Patient Name</th>
</tr>
<?php
while($mrowss=mysqli_fetch_array($mres1))
{
  $pname = $mrowss['p_name'];
  $apponum = $mrowss['appo_num'];
?>
<tr>
<td><?php echo $apponum; ?></td>
<td><?php echo $pname; ?></td>
</tr>
<?php

}



 ?>
</tbody>
</table>

      </div>
      <footer class="w3-container w3-teal">
        <br>
        <a href="manageappo.php"> <input type="button" name="" value="Start Consult"> </a> <br>
      </footer>
    </div>
  </div>


</div>

<!-- Modal class ends here -->





  </body>
</html>
