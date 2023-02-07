<?php
include("connect.php");

$from = date("Y-m-1");
$to = date("Y-m-t");


$get_prof = mysqli_fetch_array(mysqli_query($con, "select sum(profit) as prof from orders where date between '$from' and '$to'"));

echo "Rs " . number_format($get_prof['prof']);
?>