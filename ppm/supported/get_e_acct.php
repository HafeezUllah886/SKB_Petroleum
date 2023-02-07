<?php
include("connect.php");
$id = $_POST['id'];

$get_e_acct = mysqli_query($con, "select * from ppmaccounts where id = '$id'");
$e_data = mysqli_fetch_array($get_e_acct);
$status = $e_data['status'];
?>

<div class="form-group">
    <label for="acct_e_title">Title</label>
    <input type="hidden" value="<?php echo $e_data['id']; ?>" id="acct_e_id" name="acct_e_id">
    <input type="text" value="<?php echo $e_data['name']; ?>" required class="form-control form-control-user" placeholder="Enter Driver Name" id="acct_e_title" name="acct_e_title">
</div>
<div class="form-group">
    <label for="acct_e_no">Account No.</label>
    <input type="text" value="<?php echo $e_data['acct_no'];?>" required class="form-control form-control-user" placeholder="Enter Driver Contact No." id="acct_e_no" name="acct_e_no">
</div>
<div class="form-group">
<label for="e_status">Status</label>
    <select class="form-control form-control-user" id="e_status" name="e_status">
        <option value="Active" <?php if($status == 'Active'){ echo "selected"; } ?>>Active</option>
        <option value="In-active" <?php if($status == 'In-active'){ echo "selected"; } ?>>In-active</option>
    </select>
</div>
