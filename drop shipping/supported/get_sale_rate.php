<?php
include("connect.php");

$id = $_POST['id'];

$get_p_rate = mysqli_query($con, "select * from pro where id = '$id'");
$p_rate = mysqli_fetch_array($get_p_rate);
echo $p_rate['sale']; 
?>