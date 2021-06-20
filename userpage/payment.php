<?php
include('userheader.php');


 ?>
<style media="screen">
  input[type=submit]
  {
    padding: 8px;
    background-color: #40739e;
    border: none;
    border-radius: 5px;
    color: white;
    cursor: pointer;


  }
</style>
 <?php
$appoid = $_GET['appoid'];
$userid = $_SESSION['userid'];
$query = "SELECT fname,lname,mobile,address FROM register where reg_id='$userid'";
$res = mysqli_query($con,$query);
while ($rows=mysqli_fetch_array($res))
{
  $fname = $rows['fname'];
  $lname = $rows['lname'];
  $mobile = $rows['mobile'];
  $address = $rows['address'];

}
$name = $fname." ".$lname;

  ?>
<?php $_SESSION['mobile'] = $mobile;

      $_SESSION['address'] = $address;
      ?>
<h3 style="color:#273c75;margin-left:15px;">Payment Form</h3>

<br>
<div class="paymentform">


<div class="notes">
Online Appointment fee is 100RS per session. You can pay either online or pay when you reach hospital/clinic
</div>
<br>
<form class="" action="../razorpay-api/pay.php" method="post" target="_blank">

  <table>
<tbody>
<tr>
<td><label>Name</label></td>
<td><input type="text" name="custname" value="<?php echo $name; ?>" ></td>
<?php $_SESSION['name'] = $name; ?>
</tr>
<tr>
<?php $_SESSION['email']=$email; ?>
<td><label>Email</label></td>
<td><input type="text" name="custemail" value="<?php echo $email; ?>"></td>
</tr>
<tr>
<td><label>Amount</label></td>
<td> <input type="text" name="amount" value="100" disabled></td>
</tr>
</tbody>
</table>

 <input type="submit" name="Pay Now" value="Pay Now">



</form>

</div>
