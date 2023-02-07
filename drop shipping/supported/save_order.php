<?php
include("connect.php");
include("tr_no.php");

$o_id = $_POST['order_no'];
$date = $_POST['date'];
$afrom = $_POST['afrom'];
$pro = $_POST['pro'];
$sup = $_POST['sup'];
$p_rate = $_POST['p_rate'];
$p_qty = $_POST['p_qty'];
$p_amount = $_POST['p_amount'];
$cus = $_POST['cus'];
$s_rate = $_POST['s_rate'];
$s_qty = $_POST['s_qty'];
$s_amount = $_POST['s_amount'];
$driv = $_POST['driv'];
$veh = $_POST['veh'];
$v_char = $_POST['v_char'];
$rem = $_POST['rem'];
$rout_c = 0;
$get_driv_name = mysqli_query($con, "select * from drivers where id = '$driv'");
$driver_d = mysqli_fetch_array($get_driv_name);
$driver_name = $driver_d['name'];

$p_a_rem = "Order No. $o_id <br>Driver: $driver_name Veh No. $veh";


$get_rout = mysqli_query($con, "select * from route_char where order_id = '$o_id'");
if(mysqli_num_rows($get_rout) < 1)
{
    $rout_c = 0;
}
else
{
    $p_b_driver = 0;
    $p_b_owner = 0;
    while($rout_d = mysqli_fetch_array($get_rout))
    {
        $rout_c += $rout_d['amount'];
        $p_acct_id = $rout_d['acct_id'];
        $cp_amount = $rout_d['amount'];
        $p_b = $rout_d['paid_by'];
        $is_paid = $rout_d['is_paid'];
        if($p_b == 'Driver')
        {
            $p_b_driver = $p_b_driver + $cp_amount;
        }
        else
        {
            $p_b_owner = $p_b_owner + $cp_amount;
        }
        if($is_paid == 1)
        {
            $s_t_p_a = mysqli_query($con, "insert into trans value(null, '$p_acct_id', '$date', '$cp_amount', 0, '$p_a_rem', '$n_tr')");
            $s_t_p_a = mysqli_query($con, "insert into trans value(null, '$p_acct_id', '$date', 0, '$cp_amount', '$p_a_rem', '$n_tr')");
        }
        else
        {
            $s_t_p_a = mysqli_query($con, "insert into trans value(null, '$p_acct_id', '$date', '$cp_amount', 0, '$p_a_rem', '$n_tr')");
            
        }

       
    }
}


$profit = $s_amount - ($p_amount + $rout_c + $v_char);
$char = $rout_c + $v_char;

$get_pro_name = mysqli_fetch_array(mysqli_query($con, "select * from pro where id = '$pro'"));
$pro_name = $get_pro_name['pro'];

$get_sup_name = mysqli_fetch_array(mysqli_query($con, "select * from suppliers where acct_id = '$sup'"));
$sup_name = $get_sup_name['name'];

$get_cus_name = mysqli_fetch_array(mysqli_query($con, "select * from customers where acct_id = '$cus'"));
$cus_name = $get_cus_name['name'];
$save_order = mysqli_query($con, "insert into orders values (null, '$date', '$pro_name', '$sup_name','$p_rate','$p_qty', '$p_amount','$cus_name', '$s_rate', '$s_qty', '$s_amount','$driver_name', '$veh', '$v_char','$profit','$rout_c','$rem','$n_tr')");


$s_t_sup_a = mysqli_query($con, "insert into trans values(null, '$sup', '$date', '$p_amount', 0, '$p_a_rem','$n_tr')");


$s_t_cus_a = mysqli_query($con, "insert into trans values(null, '$cus', '$date', '$s_amount', 0, '$p_a_rem','$n_tr')");

$save_d_pay = mysqli_query($con, "insert into drive_pay values (null, '$driv', '$veh', '$v_char', '$date', '$n_tr', '$o_id')");

$from_rem = "Exp of Order No. $o_id <br>Driver: $driver_name Veh No. $veh";
$save_from_a = mysqli_query($con, "insert into trans values (null, '$afrom', '$date', '0', '$char', '$from_rem','$n_tr')");


include("update_tr.php");

$update_o = mysqli_query($con, "update order_no set no = '$o_id'");
?>