<?php
include("connect.php");

echo $id = $_GET['tr_no'];

$delete = mysqli_query($con, "delete from ppmtransfer where tr_no ='$id'");
$delete = mysqli_query($con, "delete from ppmtrans where tr_no ='$id'");
?>