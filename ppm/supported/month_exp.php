<?php
include("connect.php");

$from = date("Y-m-01");
$to = date("Y-m-t");

$get_exp = mysqli_fetch_array(mysqli_query($con, "select sum(amount) as total from ppmexp where date between '$from' and '$to'"));

echo "Rs. ".number_format($get_exp['total']);

?>