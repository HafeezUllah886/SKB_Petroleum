<?php
include("connect.php");

$name = $_POST['driv_name'];
$cont = $_POST['driv_cont'];
$veh = $_POST['driv_veh'];

$check = mysqli_query($con, "select * from drivers where name = '$name'");
if(mysqli_num_rows($check) > 0)
{
    echo "existing";
}
else
{
    $save = mysqli_query($con, "insert into drivers value (null, '$name','$cont','$veh')");
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