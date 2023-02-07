<?php
include("connect.php");
include("tr_no.php");

$id = $_GET['id'];
$amount = $_POST['amount'];
$date = $_POST['date'];
$rem = $_POST['rem'];

$get_name = mysqli_fetch_array(mysqli_query($con, "select * from accounts where id = '$id'"));
$acct = $get_name['name'];
$n_rem = "Cash Out <br> $rem";
$save = mysqli_query($con, "insert into trans values (null, '$id', '$date', 0, '$amount', '$n_rem', '$n_tr')");
$add = mysqli_query($con, "insert into inout1 values (null, '$date', '$acct', '$amount', 'out', '$rem', '$n_tr')");
if($save){
include("update_tr.php");
echo "ok";
}
?>