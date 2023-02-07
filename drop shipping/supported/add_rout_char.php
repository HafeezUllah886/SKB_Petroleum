<?php
include("connect.php");
include("tr_no.php");

$id = $_POST['id'];
$p_b = $_POST['p_b'];
$acct_id = $_POST['post'];
$p_char = $_POST['p_char'];
$paid = $_POST['paid'];

$check = mysqli_query($con, "select * from route_char where order_id = '$id' and acct_id = '$acct_id'");
if(mysqli_num_rows($check) > 0)
{
    echo "existing";
}
else
{
    $save = mysqli_query($con, "insert into route_char values (null, '$acct_id','$id', '$p_char','$p_b','$paid','$n_tr')");
}



?>