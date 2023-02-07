<?php
include("connect.php");

$uname = $_POST['uname'];
$pass = md5($_POST['pass']);

$check = mysqli_query($con, "select * from users where uname = '$uname' and password = '$pass'");
$verify = mysqli_num_rows($check);
if($verify > 0)
{
    session_start();
    $_SESSION['user'] = $uname;
    echo "ok";
}
else
{
    echo "invalid";
}

?>