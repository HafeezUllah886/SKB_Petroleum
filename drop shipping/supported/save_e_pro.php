<?php
include("connect.php");

$name = $_POST['pro_e_name'];
$pur = $_POST['pro_e_pur'];
$sale = $_POST['pro_e_sale'];
$id = $_POST['pro_e_id'];

$check = mysqli_query($con, "select * from pro where pro = '$name' and id != '$id'");
if(mysqli_num_rows($check) > 0)
{
    echo "existing";
}
else
{
    $save = mysqli_query($con, "update pro set pro = '$name', pur = '$pur', sale = '$sale' where  id = '$id'");
    if($save)
    {
        echo "done";
    }
    else
    {
        echo "error";
    }
}
?>