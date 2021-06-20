<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
    <link rel="stylesheet" href="../../style.css">
    <link rel="stylesheet" href="../../admin/adminstyle.css">
  </head>
  <body>

  </body>
</html>

<?php


$sql = "SELECT * from tbl_doc WHERE status=2";

$res = mysqli_query($con,$sql);
?>


<table id="customers" style="width:50%;" >
  <th>Name</th>
  <th>Speciality</th>
  <th>UID</th>
  <th>Gender</th>
  <th>Address</th>
  <th>Contact</th>
  <th>Email</th>
  
  <th>Action</th>
  <?php
  while($rows=mysqli_fetch_array($res))
    {
       $name=$rows['name'];
       $speciality=$rows['speciality'];
       $uid=$rows['uid'];
       $gender=$rows['gender'];
       $address=$rows['address'];
       $contact=$rows['contact'];
       $email=$rows['email'];
       $status=$rows['status'];


       ?>




         <tr>
           <td> <?php echo $name; ?> </td>
           <td> <?php echo $speciality; ?> </td>
           <td> <?php echo $uid; ?> </td>
           <td> <?php echo $gender; ?> </td>
           <td> <?php echo $address; ?> </td>
           <td> <?php echo $contact; ?> </td>
           <td> <?php echo $email; ?> </td>

           <td><a href="adminmodules/requests_action.php?id=<?php echo $rows['doc_id']; ?>"><i class="fa fa-check" aria-hidden="true"></i></a></td>
         </tr>



<?php

}






?>
</table>
