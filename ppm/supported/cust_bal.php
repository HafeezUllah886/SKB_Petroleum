<?php
include("connect.php");

$get_cust = mysqli_query($con, "select * from ppmaccounts where type = 'customer'");
$bal = 0;
while($accts = mysqli_fetch_array($get_cust)){
   $id = $accts['id'];
    $get_trans = mysqli_query($con, "select * from ppmtrans where accn = '$id'");
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
echo "Rs " . number_format($bal);
?>
