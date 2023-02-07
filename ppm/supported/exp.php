<?php
include("connect.php");

$from = $_POST['from'];
$to = $_POST['to'];
?>
<div class="row">
<div class="table-responsive">
    
<table style="border:1px;min-width:600px;" class="table">
    <thead>
        <th>Date</th>
        <th>Account</th>
        <th>Category</th>
        <th>Amount</th>
        <th width="40%">Description</th>
        <th>X</th>
    </thead>
    <tbody>
<?php
$get = mysqli_query($con, "select * from ppmexp where date between '$from' and '$to'");

while($data = mysqli_fetch_array($get))
{
    $date = $data['date'];
    $rem = $data['rem'];
    
    ?>
    <tr>
        <td><?php echo date("d-m-Y", strtotime($date));?></td>
        <td><?php echo $data['acct']; ?></td>
        <td><?php echo $data['cat']; ?></td>
        <td><?php echo $data['amount']; ?></td>
        <td><?php echo $rem; ?></td>
        <td><p> <i class="fas fa-trash" title="Delete" onclick="delet1(<?php echo $data['tr_no']?>)" style="color:tomato;"></i></p></td>
    </tr>
    <?php
}
?>
 </tbody>
</table>
</div>
</div>