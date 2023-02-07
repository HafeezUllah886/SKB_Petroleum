<?php
session_start();
$user = $_SESSION['user'];
if(!$user)
{
    echo "<script> window.open('../index.html?msg=not_all','_self'); </script>";
}
?>