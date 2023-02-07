<?php
include("connect.php");
$get_cust = mysqli_query($con, "select * from accounts where type = 'customer'");
$bal = 0;
while($accts = mysqli_fetch_array($get_cust)){
   $id = $accts['id'];
    $get_trans = mysqli_query($con, "select * from trans where accn = '$id'");
    while($trans = mysqli_fetch_array($get_trans))
    {
        if($trans['cr'] > 0)
        {
            $bal += $trans['cr'];
        }
        if($trans['dt'] > 0)
        {
            $bal -= $trans['dt'];
        }
    }
}



$get_sup = mysqli_query($con, "select * from accounts where type = 'supplier'");
$bal1 = 0;
while($accts1 = mysqli_fetch_array($get_sup)){
   $id1 = $accts1['id'];
    $get_trans1 = mysqli_query($con, "select * from trans where accn = '$id1'");
    while($trans1 = mysqli_fetch_array($get_trans1))
    {
        if($trans1['cr'] > 0)
        {
            $bal1 += $trans1['cr'];
        }
        if($trans1['dt'] > 0)
        {
            $bal1 -= $trans1['dt'];
        }
    }
}

$ttl =  $bal - $bal1;
echo "Rs " . number_format($ttl);
?>