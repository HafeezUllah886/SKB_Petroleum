<?php
include("connect.php");
$id = $_POST['id'];
$type=$_GET['type'];

$get_e_sup = mysqli_query($con, "select * from $type where acct_id = '$id'");
$e_data = mysqli_fetch_array($get_e_sup);
?>

<div class="form-group">
    <label for="sup_e_name">Supplier Name</label>
    <input type="hidden" value="<?php echo $e_data['acct_id']; ?>" id="sup_e_id" name="sup_e_id">
    <input type="text" value="<?php echo $e_data['name']; ?>" required class="form-control form-control-user" placeholder="Enter Supplier Name" id="sup_e_name" name="sup_e_name">
</div>
<div class="form-group">
    <label for="sup_e_cont">Contact No.</label>
    <input type="text" value="<?php echo $e_data['cont'];?>" required class="form-control form-control-user" placeholder="Enter Supplier Contact No." id="sup_e_cont" name="sup_e_cont">
</div>