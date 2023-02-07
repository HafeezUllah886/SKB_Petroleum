<?php
include("connect.php");

$get_pro = mysqli_query($con, "select * from ppmpro");
$total_val = 0;
while($pro = mysqli_fetch_array($get_pro))
{
    $id = $pro['id'];
    $sale = $pro['sale'];
$get2 = mysqli_query($con, "select * from ppmstock where accn = '$id'");
$c_bal = 0;
$unit_value = 0;
while($data2 = mysqli_fetch_array($get2))
{
    $c_cr = $data2['cr'];
    $c_dt = $data2['dt'];
    if($c_cr > 0)
    {
        $c_bal += $c_cr;
    }
    if($c_dt > 0)
    {
        $c_bal -= $c_dt;
    }
}
$unit_value += $c_bal * $sale;
$total_val += $unit_value;
}
echo "Rs. " . number_format($total_val);
?>