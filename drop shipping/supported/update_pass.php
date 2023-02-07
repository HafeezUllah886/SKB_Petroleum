<?php
    include("connect.php");
    include("session.php");
    $c_pass = md5($_POST['c_pass']);
    $n_pass = md5($_POST['n_pass']);
    $v_pass = md5($_POST['v_pass']);
    if($n_pass != $v_pass)
    {
        echo "not_m";
    }
    else
    {
        $verify = mysqli_query($con, "select * from users where uname = '$user' and password = '$c_pass'");
        if(mysqli_num_rows($verify) > 0)
        {
            $save = mysqli_query($con, "update users set password = '$n_pass' where uname = '$user'");
            echo "changed";
        }
        else
        {
            echo "wrong";
        }
    }
?>