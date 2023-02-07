<?php
include("connect.php");
include("tr_no.php");

$name = $_POST['pro_name'];
$o_qty = $_POST['o_qty'];
$unit = $_POST['unit'];
$sale = $_POST['pro_sale'];


$check = mysqli_query($con, "select * from ppmpro where pro = '$name'");
if(mysqli_num_rows($check) > 0)
{
    echo "existing";
}
else
{
    $save = mysqli_query($con, "insert into ppmpro value (null, '$name','$unit','$sale')");
    if($save)
    {
        $get_id = mysqli_query($con, "select * from ppmpro where pro = '$name'");
        $get_id = mysqli_fetch_array($get_id);
        $acct_id = $get_id['id'];
        $date = date('Y-m-d');
        $save = mysqli_query($con, "insert into ppmstock value (null, '$acct_id','$date','$o_qty',0,'Opening Quantity','$n_tr')");
        if($save)
        {
            include("update_tr.php");
            echo "done";
        }
        else
        {
            echo "error";
        }
    }
    else
    {
        echo "error";
    }
}

?>