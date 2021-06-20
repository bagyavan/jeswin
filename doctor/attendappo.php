<?php

include('doc_header.php');


 ?>

 <!DOCTYPE html>
 <html lang="en" dir="ltr">
   <head>
     <meta charset="utf-8">
     <title>Attend Appointment</title>
     <script src='http://ajax.aspnetcdn.com/ajax/jQuery/jquery-3.2.1.js'></script>

   </head>
   <body>

<?php

$appoid = $_GET['appoid'];
$query = "SELECT * FROM tbl_appo WHERE appo_id='$appoid'";
$res=mysqli_query($con,$query);
while($rows=mysqli_fetch_array($res))
{
  $regid = $rows['reg_id'];
  $apponum = $rows['appo_num'];
  $pname = $rows['p_name'];

}



  ?>

  <div class="attendappo">
    <h3>Consult Session</h3> <br><br>

    <p>You are now consulting <span><?php echo $pname; ?></span> </p>  <br>
<br>
<?php
if(isset($_SESSION['meddata']))
{
?>
<div class="successs" id="suc">
  <?php echo   $_SESSION['meddata'];
        unset($_SESSION['meddata']);
   ?>
</div>


<?php
}

 ?>
<p>Enter Medical data</p>
<div class="attendappobtns">
  <button type="button" name="button"> <i class="fa fa-book" aria-hidden="true"></i> Visit history</button>
  <button type="button" name="button"> <i class="fa fa-medkit" aria-hidden="true"></i> Medical history</button>
</div>


    <form  action="uploadmedaction.php?docid=<?php echo $docid; ?>&regid=<?php echo $regid; ?>&apponum=<?php echo $apponum; ?>&appoid=<?php echo $appoid; ?>" method="post">


    <table id="medtable">


    </table>


    <br>
    <div class="keys">


    <i onclick="myCreateFunction()" style="cursor:pointer;color:#44bd32;font-size:30px;" title="Add more" class="fa fa-plus" aria-hidden="true"></i> &nbsp;&nbsp;&nbsp;&nbsp;
    <i onclick="myDeleteFunction()" style="cursor:pointer;color:#e84118;font-size:30px;" title="Delete previous" class="fa fa-trash" aria-hidden="true"></i>
    <br><br> <input type="submit" name="submit" value="Upload Data"> <br> <br>
     <div class="complete" style="float:right;">
     <a href="complete.php?id=<?php echo $appoid; ?>"><input type="button" name="" value="Close Session"></a>

    </div>
        </div>
  </form>
    <script>
    function myCreateFunction() {
      var data="<input type='text' name='medname[]' placeholder='Ente med name' required> "
      var data1 = "<select name='dosecount[]'><option selected disabled>Choose Dose</option><option>1-1-1</option><option>0-1-1</option><option>1-0-1</option><option>0-1-1</option></select>"
      var data2="<input required type='text' name='days[]' placeholder='No.of days'> "
      var table = document.getElementById("medtable");
      var row = table.insertRow(0);
      var cell1 = row.insertCell(0);
      var cell2 = row.insertCell(1);
      var cell3 = row.insertCell(2);
      cell1.innerHTML = data;
      cell2.innerHTML = data1;
      cell3.innerHTML = data2;
    }

    function myDeleteFunction() {
      document.getElementById("medtable").deleteRow(0);
    }
    </script>


  </div>





   </body>
 </html>
