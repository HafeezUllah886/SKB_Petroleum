<?php
    include("connect.php");
    $name = $_POST['name'];
    $check = mysqli_query($con, "select * from ppmcat where name = '$name'");
    if(mysqli_num_rows($check) > 0)
    {
        echo "existing";
    }
    else
    {
        $save = mysqli_query($con, "insert into ppmcat values (null,'$name')");
        echo "saved";
    }
?>