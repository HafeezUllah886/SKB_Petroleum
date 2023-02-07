<?php
include("connect.php");

$name = $_POST['pro_name'];
$pur = $_POST['pro_pur'];
$sale = $_POST['pro_sale'];


$check = mysqli_query($con, "select * from pro where pro = '$name'");
if(mysqli_num_rows($check) > 0)
{
    echo "existing";
}
else
{
    $save = mysqli_query($con, "insert into pro value (null, '$name','$pur','$sale')");
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