<?php
include("connect.php");

$name = $_POST['post_name'];
$cont = $_POST['cont_no'];



$check = mysqli_query($con, "select * from posts where post = '$name'");
if(mysqli_num_rows($check) > 0)
{
    echo "existing";
}
else
{
    $save = mysqli_query($con, "insert into post value (null, '$name','$cont')");
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