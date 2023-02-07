<?php
include("connect.php");
$tr = $_GET['tr_no'];

mysqli_query($con, "delete from trans where tr_no = '$tr'");
mysqli_query($con, "delete from route_char where tr_no = '$tr'");
mysqli_query($con, "delete from orders where tr_no = '$tr'");
mysqli_query($con, "delete from drive_pay where tr_no = '$tr'");

echo "ok";
?>