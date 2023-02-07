<?php 
include("connect.php");
include("tr_no.php");

$date = $_POST['date'];
$pro = $_POST['pro'];
$cust = $_POST['cust'];
$acct = $_POST['acct'];
$paid = $_POST['paid'];
$rate = $_POST['rate'];
$qty = $_POST['qty'];
$amount = $_POST['amount'];
$rem = $_POST['rem'];

$cust_name = mysqli_fetch_array(mysqli_query($con, "select * from ppmaccounts where id = '$cust'"));
$cust1 = $cust_name['name'];

$save_pur = mysqli_query($con, "insert into ppmsale values(null, '$date', '$cust', '$acct', '$paid', '$pro', '$rate', '$qty', '$amount', '$rem', '$n_tr')");
$s_rem = "Sold to " . $cust1;
$save_stock = mysqli_query($con, "insert into ppmstock values (null, '$pro', '$date', 0, '$qty', '$s_rem', '$n_tr')");
if($paid == "Yes")
{
    $get_pro = mysqli_fetch_array(mysqli_query($con, "select * from ppmpro where id = '$pro'"));
    $name = $get_pro['pro'];
    $rem1 = "Sale of " . $name . " Qty: " . $qty;
    $save_trans = mysqli_query($con, "insert into ppmtrans values (null, '$acct', '$date', '$amount', 0, '$rem1', '$n_tr')");
}
else
{
    $get_pro = mysqli_fetch_array(mysqli_query($con, "select * from ppmpro where id = '$pro'"));
    $name = $get_pro['pro'];
    $rem1 = "Sale of " . $name . " Qty: " . $qty;
    $save_trans = mysqli_query($con, "insert into ppmtrans values (null, '$cust', '$date', '$amount', 0, '$rem1', '$n_tr')"); 
}

include("update_tr.php");
?>