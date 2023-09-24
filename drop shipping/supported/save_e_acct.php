<?php
include("connect.php");

$type = $_POST['type'].'s';
$title = $_POST['acct_e_title'];
$acct = $_POST['acct_e_no'];
$status = $_POST['e_status'];
$id = $_POST['acct_e_id'];


$check = mysqli_query($con, "select * from accounts where name = '$title' and id != '$id'");
if(mysqli_num_rows($check) > 0)
{
    echo "existing";
}
else
{
    $save = mysqli_query($con, "update accounts set name = '$title', acct_no = '$acct', status = '$status' where  id = '$id'");
    if($type != 'businesss'){
    $save_a = mysqli_query($con, "update `$type` set name = '$title' where acct_id = '$id'"); 
    }
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