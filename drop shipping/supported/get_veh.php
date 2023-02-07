<?php
include("connect.php");
$id = $_POST['id'];
$get_veh = mysqli_query($con, "select * from drivers where id = '$id'");
$veh_data = mysqli_fetch_array($get_veh);
echo $veh_data['veh'];

?>