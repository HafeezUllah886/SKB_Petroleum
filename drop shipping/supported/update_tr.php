<?php
    include("connect.php");
$get_tr = mysqli_query($con, "select * from tr_no");
    $get_tr = mysqli_fetch_array($get_tr);
    $tr_no = $get_tr ['no'];
    $n_tr = $tr_no + 1;
    $update = mysqli_query($con, "update tr_no set no = '$n_tr' where id = 1"); 
?>