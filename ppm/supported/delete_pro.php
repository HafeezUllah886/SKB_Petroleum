<?php
include("connect.php");

$id = $_GET['tr_no'];

$delete = mysqli_query($con, "delete from ppmpro where id ='$id'");
$delete = mysqli_query($con, "delete from ppmstock where accn ='$id'");
?>