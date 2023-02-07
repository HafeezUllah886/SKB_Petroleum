<?php
include("connect.php");

$tr_no = $_GET['tr_no'];
mysqli_query($con, "delete from ppmsale where tr_no = '$tr_no'");
mysqli_query($con, "delete from ppmtrans where tr_no = '$tr_no'");
mysqli_query($con, "delete from ppmstock where tr_no = '$tr_no'");
?>