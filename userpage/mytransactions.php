<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>My Transactions</title>
  </head>
  <body>
<style media="screen">
table, th, td {
  border: 1px solid black;
  border-collapse: collapse;
  padding: 5px;
}

table {
  width: 100%;
}
</style>


<?php
include('userheader.php');

 ?>
 <?php
$email = $_SESSION['username'];
  ?>

  <?php
$query = "SELECT * FROM tbl_transactions WHERE email='$email' AND status='Success'";
$res = mysqli_query($con,$query);
if(isset($res))
{
?>
<br><br><br><br><br>
<table>
<tbody>
<tr>
<th>Payment ID</th>
<th>Status</th>
<th>Date</th>
</tr>
<tr>
<?php
while($rows=mysqli_fetch_array($res))
{
  $paymentid = $rows['payment_id'];
  $status = $rows['status'];
  $dates = $rows['dates'];
?>

  <tr>
<td><?php echo $paymentid; ?></td>
<td><?php echo $status; ?></td>
<td><?php echo $dates; ?></td>
</tr>

<?php
}


}

   ?>

 </body>
</html>
