<?php
include("connect.php");
include("session.php");
$pass = md5($_POST['value']);

$check = mysqli_query($con,"select * from users where uname = '$user' and s_password = '$pass'");
$checkno = mysqli_num_rows($check);
if($checkno > 0)
{
  echo "correct";
}
else {
  echo "invalid";
}

?>
