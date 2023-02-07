<?php
include("connect.php");
$id = $_POST['id'];

$get_e_driv = mysqli_query($con, "select * from drivers where id = '$id'");
$e_data = mysqli_fetch_array($get_e_driv);
?>

<div class="form-group">
    <label for="sup_e_name">Driver Name</label>
    <input type="hidden" value="<?php echo $e_data['id']; ?>" id="driv_e_id" name="driv_e_id">
    <input type="text" value="<?php echo $e_data['name']; ?>" required class="form-control form-control-user" placeholder="Enter Driver Name" id="driv_e_name" name="driv_e_name">
</div>
<div class="form-group">
    <label for="sup_e_cont">Contact No.</label>
    <input type="text" value="<?php echo $e_data['cont'];?>" required class="form-control form-control-user" placeholder="Enter Driver Contact No." id="driv_e_cont" name="driv_e_cont">
</div>
<div class="form-group">
    <label for="sup_e_cont">Vehicle No.</label>
    <input type="text" value="<?php echo $e_data['veh'];?>" required class="form-control form-control-user" placeholder="Enter Veh No." id="driv_e_veh" name="driv_e_veh">
</div>