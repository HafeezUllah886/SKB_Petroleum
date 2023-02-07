<?php
include("connect.php");
include("tr_no.php");

$type = $_GET['type'];
$title = $_POST['acct_title'];
$acct_no = $_POST['acct_no'];
$opening = $_POST['opening'];

$check = mysqli_query($con, "select * from accounts where name = '$title'");
if(mysqli_num_rows($check) > 0)
{
    echo "existing";
}
else
{
    $save = mysqli_query($con, "insert into accounts value (null, '$title','$type','$acct_no','Active')");
    if($save)
    {
        $get_id = mysqli_query($con, "select * from accounts where name = '$title'");
        $get_id = mysqli_fetch_array($get_id);
        $acct_id = $get_id['id'];
        $date = date('Y-m-d');
        $save = mysqli_query($con, "insert into trans value (null, '$acct_id','$date','$opening',0,'Opening Balance','$n_tr')");
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