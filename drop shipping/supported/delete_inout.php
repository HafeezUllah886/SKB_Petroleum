<?php
include("connect.php");

echo $id = $_GET['tr_no'];

$delete = mysqli_query($con, "delete from inout1 where tr_no ='$id'");
$delete = mysqli_query($con, "delete from trans where tr_no ='$id'");
?>