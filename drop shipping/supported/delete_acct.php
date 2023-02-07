<?php
include("connect.php");

$id = $_GET['id'];

$get = mysqli_fetch_array(mysqli_query($con, "select * from accounts where id = '$id'"));
$type = $get['type'];
if($type != 'business')
{
    $type1 = $type . 's';
    $delete_tyle = mysqli_query($con, "delete from $type1 where acct_id ='$id'");
}
$delete1 = mysqli_query($con, "delete from accounts where id ='$id'");
$delete = mysqli_query($con, "delete from trans where accn ='$id'");
echo "done";
?>