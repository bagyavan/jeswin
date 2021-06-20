<?php
include('userheader.php');

 ?>

<?php
include('useraccountq.php');
usleep(1000000);
 ?>

 <!DOCTYPE html>
 <html lang="en" dir="ltr">
   <head>
     <meta charset="utf-8">
     <title>User account</title>
   </head>
   <body style="background-color:#F7F7F7;">
<br><br>
<?php
if(isset($_SESSION['message']))
{
?>
<div class="prflmessage">
  <?php
  echo $_SESSION['message'];
  unset($_SESSION['message']);
   ?>
   <span onclick="this.parentElement.style.display='none'"
  class="closebtns">&times;</span>
</div>

  <?php


}

 ?>
<div class="heads">




  <h3>My Account</h3>

</div>
<div class="leftbar">
  <div class="leftone">
    <img src="https://static.qkdoc.com/static/pw_v3/images/user_male.png" style="float:left; padding:5px;" alt=""> <br>

    <div class="leftone-contents">
      <div class="heads-name">

        <h4><?php echo $name; ?></h4>
      </div>

      <span>Date of Birth:</span> <?php echo $dob; ?> <br>
      <span>Gender:</span> <?php echo $gender; ?> <br>
      <a id="editprofile" class="editbutton" onclick="document.getElementById('id01').style.display='block'" href="#" >Edit Profile</a> <br>
    </div>



    <div class="hr"></div>
<div class="lefone-bottom">


    <span><?php echo $email; ?></span> <br>

<?php echo $mobile; ?> <br>

<?php echo $address; ?> <br>

</div>
  </div>
 <br>
  <div class="lefttwo">
    <h4>Registered Dependants</h4>
    <div class="hr"></div>

    <div class="lefttwo-contents">
      <img src="https://static.qkdoc.com/static/pw_v3/images/no-dependent.png" alt=""><br>
      You do not have any Registered Dependants in your Account <br>
      <div class="btn-adddep">
          <a href="#">Add Dependant</a>
      </div>

    </div>


  </div>

</div>


<div class="nav">
  <ul>
                              <li><a href="" active>Dashboard</a></li>

                              <li>|</li>

                              <li><a href="mytransactions.php">My Transactions</a></li>
                              <li>|</li>
                              <li><a href="visithistory.php">Visit History</a></li>
                              <li>|</li>
                              <li><a href="pharmacy.php">Pharmacy</a></li>
                          </ul>

</div>



<br> <br>
<div class="rightbar">
  <h4>My Appointments</h4>
  <div class="hr"></div>




  <div class="rightbar-contents" id="tohide">
    <img src="https://static.qkdoc.com/static/pw_v3/images/no-request.png" alt=""><br>
    You don't have any pending Appointments <br>

  </div>

  <div class="rightbar-contents2">
<?php
if(mysqli_num_rows($res1)>0)
  {

 ?>




    <div class="viewappobox">
    <div class="view1">
      Appointment
    </div>
    <br>
    <div class="view2 clearfixs">
    <div class="profl">
    <span> <?php echo $fletter; ?> </span>

    </div>
    <div class="profl">

    <?php echo $docname; ?> <br> <?php echo $speciality; ?>
    </div>

    </div>


    <div class="view3">

      <table>
      <tbody>
      <tr>
      <td>Appointment Date	:	 </td>
      <td><span> <?php echo $dates; ?> </span></td>
      </tr>
      <tr>
      <td>Appo Number	:	</td>
      <td><span> <?php echo $apponum; ?> </span></td>

      </tr>

      <tr>
      <td>Time	:	</td>
      <td><span>12:10 PM </span></td>
      </tr>
      <tr>
      <td>Status	:	</td>
      <td><span> <?php echo $status; ?> </span></td>

      </tr>
      <tr>
      <td>Booking for	:	</td>
      <td><span> <?php echo $name; ?> </span></td>
      </tr>
      <tr>
      <td>Payment :</td>
      <td> <a style="text-decoration:none;" href="payment.php?appoid=<?php echo $appoid; ?>" target="_blank"><span style="color:#e84118;"> Pay now </span></a> </td>
      </tr>
      </tbody>
      </table>


    </div>
    <?php
    if($status=='Booked')
    {
      ?>
      <div class="view4">
      Cancel Appointment <span> <a href="cancelappo.php?id=<?php echo $appoid; ?>" onclick="document.getElementById('delete').style.display='block'">Cancel</a> </span>
      </div>
      <?php
    }

    elseif($status=='Complete')
    {
      ?>
      <div class="view4">
      Appointment Completed <span> <a href="pharmacy.php" >View Result</a> </span>
      </div>
    <?php
    }

     ?>


    </div>



  </div>

  <?php
  if(mysqli_num_rows($res1)>0)
  {
  ?>
  <script type="text/javascript">
    document.getElementById('tohide').style.display = "none";
  </script>
  <?php
  }

   ?>


</div>


<?php
}
 ?>

 <div id="id01" class="w3-modal">
     <div class="w3-modal-content w3-card-4 w3-animate-zoom" style="max-width:600px">

       <div class="w3-center"><br>
         <span onclick="document.getElementById('id01').style.display='none'" class="w3-button w3-xlarge w3-hover-red w3-display-topright" title="Close Modal">&times;</span>

       </div>

       <form class="w3-container" action="editprofileaction.php">
         <div class="w3-section">
           <div class="editprofileflds1">
             <div class="onefield">
               <label>First Name</label><br>
               <input class="editform w3-border w3-margin-bottom" type="text" value="<?php echo $fname; ?>"  name="fname" required>
             </div>
             <div class="onefield">
               <label>Second Name</label><br>
               <input class="editform w3-border" type="text" value="<?php echo $lname; ?>"  name="lname" required>
             </div>
             <div class="onefield">
               <!-- <label>DOB</label><br>
               <input class="editform w3-border" type="date" value="<?php echo $dob; ?>"  name="dob" required readonly="readonly"> -->
             </div>
             </div>
             <div class="editprofileflds2">


             <div class="onefield">
               <label>Email</label><br>
               <input class="editform w3-border" readonly="readonly" type="text" value="<?php echo $email; ?>"  name="email" required  >
             </div>
             <div class="onefield">
               <label>Mobile</label><br>
               <input class="editform w3-border" type="text" value="<?php echo $mobile; ?>"  name="mobile" required >
             </div>
             <div class="onefield">
               <label>Address</label><br>
               <input class="editform w3-border" type="text" value="<?php echo $address; ?>"  name="address" required>
             </div>
</div>



           <button class=" w3-block editprofilebtn w3-section w3-padding" type="submit">Update Profile</button>

         </div>
       </form>



     </div>
   </div>
 </div>




   </body>
 </html>
