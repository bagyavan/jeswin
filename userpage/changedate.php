<?php

$docid = $_GET['id'];
unset($_SESSION['docstatus']);
header('location:bookapp.php?id='.$docid);




 ?>
