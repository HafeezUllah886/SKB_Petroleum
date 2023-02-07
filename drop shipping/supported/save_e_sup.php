<?php
include("connect.php");

$type = $_GET['type'];
$name = $_POST['sup_e_name'];
$cont = $_POST['sup_e_cont'];
$id = $_POST['sup_e_id'];


$check = mysqli_query($con, "select * from accounts where name = '$name' and id != '$id'");

if(mysqli_num_rows($check) > 0)
{
    echo "existing";
}
else
{
    $save = mysqli_query($con, "update $type set name = '$name', cont = '$cont' where  acct_id = '$id'");
    $save_a = mysqli_query($con, "update accounts set name = '$name' where  id = '$id'");
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