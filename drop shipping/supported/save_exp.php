<?php
include("connect.php");
include("tr_no.php");

$date = $_POST['date'];
$from = $_POST['from'];
$cat = $_POST['cat'];
$amount = $_POST['amount'];
$rem = $_POST['rem'];

    $get_f_name = mysqli_fetch_array(mysqli_query($con, "select * from accounts where id = '$from'"));
    $acct_from = $get_f_name['name'];
    $frem = "Expense - $cat <br>" . $rem; 

    $save = mysqli_query($con, "insert into exp values (null, '$acct_from','$cat','$amount', '$date', '$rem','$n_tr')");
    $s_from = mysqli_query($con, "insert into trans values (null, '$from','$date',0, '$amount', '$frem','$n_tr')");
    
    include("update_tr.php");
  echo "ok";

?>