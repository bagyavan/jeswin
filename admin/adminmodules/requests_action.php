<?php

include('../../config/constants.php');

$id = $_GET['id'];

$del = mysqli_query($con,"UPDATE tbl_doc SET status =0 WHERE doc_id='$id'");

if($del)
{
    mysqli_close($con);
    header("location: ../adminhome.php?section=add_doc");
    exit;
}
else
{
    echo "Error deleting record";
}
?>
