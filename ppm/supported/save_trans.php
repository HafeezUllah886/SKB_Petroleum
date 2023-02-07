<?php
include("connect.php");
include("tr_no.php");

$date = $_POST['date'];
$from = $_POST['from'];
$to = $_POST['to'];
$amount = $_POST['amount'];
$rem = $_POST['rem'];


if($from == $to)
{
    echo "same";
}
else
{
    $get_f_name = mysqli_fetch_array(mysqli_query($con, "select * from ppmaccounts where id = '$from'"));
    $get_t_name = mysqli_fetch_array(mysqli_query($con, "select * from ppmaccounts where id = '$to'"));
    $acct_from = $get_f_name['name'];
    $acct_to = $get_t_name['name'];
  
    $frem = "Fund Transfer to $acct_to <br>" . $rem; 
    $trem = "Fund Transfer From $acct_from <br>" . $rem; 
    $save = mysqli_query($con, "insert into ppmtransfer values (null, '$acct_from','$acct_to','$amount', '$rem', '$date','$n_tr')");
    $s_from = mysqli_query($con, "insert into ppmtrans values (null, '$from','$date',0, '$amount', '$frem','$n_tr')");
    $s_to = mysqli_query($con, "insert into ppmtrans values (null, '$to','$date','$amount', 0, '$trem','$n_tr')");

    
    include("update_tr.php");
  echo "ok";
}
?>