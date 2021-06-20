<?php

include('../../config/constants.php');

$id = $_GET['id'];

$del = mysqli_query($con,"delete from tbl_speciality where spl_id = '$id'");

if($del)
{
    mysqli_close($con);
    header("location: ../adminhome.php?section=specialisation");
    exit;
}
else
{
    echo "Error deleting record";
}
?>
