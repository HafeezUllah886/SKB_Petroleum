<?php
$id = $_GET['id'];
$get_o_details = mysqli_query($con, "select * from orders where id = '$id'");
$data = mysqli_fetch_array($get_o_details);

$date = $data['date'];
$pro = $data['product'];
$sup = $data['sup'];
$s_rate = $data['s_rate'];
$s_qty = $data['s_qty'];
$s_amount = $data['s_amount'];
$cus = $data['cus'];
$c_rate = $data['c_rate'];
$c_qty = $data['c_qty'];
$c_amount = $data['c_amount'];
$driver = $data['driver'];
$veh_no = $data['veh_no'];
$driver_char = $data['d_char'];
$profit = $data['profit'];
$route_exp = $data['route_exp'];
$rem = $data['rem'];
$tr_no = $data['tr_no'];

$fuel_used = $s_qty - $c_qty;
?>