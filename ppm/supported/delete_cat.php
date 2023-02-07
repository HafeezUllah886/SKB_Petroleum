<?php
include("connect.php");

$id = $_POST['id'];

$delete = mysqli_query($con, "delete from ppmcat where id ='$id'");
?>