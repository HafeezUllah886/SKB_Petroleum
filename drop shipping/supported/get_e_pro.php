<?php
include("connect.php");
$id = $_POST['id'];

$get_e_driv = mysqli_query($con, "select * from pro where id = '$id'");
$e_data = mysqli_fetch_array($get_e_driv);
?>

<div class="form-group">
    <label for="pro_e_name">Product Name</label>
    <input type="hidden" value="<?php echo $e_data['id']; ?>" id="pro_e_id" name="pro_e_id">
    <input type="text" value="<?php echo $e_data['pro']; ?>" required class="form-control form-control-user" placeholder="Enter Product Name" id="pro_e_name" name="pro_e_name">
</div>
<div class="form-group">
    <label for="pro_e_pur">Purchase Rate</label>
    <input type="number" value="<?php echo $e_data['pur'];?>" required class="form-control form-control-user" placeholder="Enter Purchase Rate" id="pro_e_pur" name="pro_e_pur">
</div>
<div class="form-group">
    <label for="pro_e_sale">Sale Rate</label>
    <input type="number" value="<?php echo $e_data['sale'];?>" required class="form-control form-control-user" placeholder="Enter Sale Rate" id="pro_e_sale" name="pro_e_sale">
</div>