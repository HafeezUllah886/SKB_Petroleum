<?php
include("connect.php");
include("tr_no.php");

$id = $_GET['id'];
$amount = $_POST['amount'];
$date = $_POST['date'];
$rem = $_POST['rem'];

$get_name = mysqli_fetch_array(mysqli_query($con, "select * from ppmaccounts where id = '$id'"));
$acct = $get_name['name'];
$n_rem = "Add Cash <br> $rem";
$save = mysqli_query($con, "insert into ppmtrans values (null, '$id', '$date', '$amount', 0, '$n_rem', '$n_tr')");
$add = mysqli_query($con, "insert into ppminout1 values (null, '$date', '$acct', '$amount', 'in', '$rem', '$n_tr')");
include("update_tr.php");
if($add)
{

echo "ok";
}
else
{
    echo "error";
}
?>