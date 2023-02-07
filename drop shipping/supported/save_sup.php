<?php
include("connect.php");
$type = $_GET['type'];
$name = $_POST['acct_title'];
$cont = $_POST['sup_cont'];
$acct_no= $_POST['acct_no'];

$get_ac_id = mysqli_fetch_array(mysqli_query($con, "select * from accounts order by id desc"));
$acct_id = $get_ac_id['id'] + 1;

$check = mysqli_query($con, "select * from accounts where name = '$name'");
if(mysqli_num_rows($check) > 0)
{
    echo "existing";
}
else
{
    $save = mysqli_query($con, "insert into $type value (null, '$acct_id','$name','$cont','$acct_no')");
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