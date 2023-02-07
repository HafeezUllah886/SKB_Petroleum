<?php
include("connect.php");
include("tr_no.php");


$title = $_POST['acct_title'];
$acct_no = $_POST['acct_no'];
$type = $_POST['type'];
$opening = $_POST['opening'];

$check = mysqli_query($con, "select * from ppmaccounts where name = '$title'");
if(mysqli_num_rows($check) > 0)
{
    echo "existing";
}
else
{
    $save = mysqli_query($con, "insert into ppmaccounts value (null, '$title','$type','$acct_no','Active')");
    if($save)
    {
        $get_id = mysqli_query($con, "select * from ppmaccounts where name = '$title'");
        $get_id = mysqli_fetch_array($get_id);
        $acct_id = $get_id['id'];
        $date = date('Y-m-d');
        $save = mysqli_query($con, "insert into ppmtrans value (null, '$acct_id','$date','$opening',0,'Opening Balance','$n_tr')");
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