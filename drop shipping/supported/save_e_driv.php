<?php
include("connect.php");

$name = $_POST['driv_e_name'];
$cont = $_POST['driv_e_cont'];
$veh = $_POST['driv_e_veh'];
$id = $_POST['driv_e_id'];

$check = mysqli_query($con, "select * from drivers where name = '$name' and id != '$id'");
if(mysqli_num_rows($check) > 0)
{
    echo "existing";
}
else
{
    $save = mysqli_query($con, "update drivers set name = '$name', cont = '$cont', veh = '$veh' where  id = '$id'");
    
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