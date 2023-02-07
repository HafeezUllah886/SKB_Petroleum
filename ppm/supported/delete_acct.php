<?php
include("connect.php");

$id = $_GET['id'];

$delete1 = mysqli_query($con, "delete from ppmaccounts where id ='$id'");
$delete = mysqli_query($con, "delete from ppmtrans where accn ='$id'");
echo "done";
?>