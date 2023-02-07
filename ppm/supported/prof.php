<?php
include("connect.php");

$from = $_POST['from'];
$to = $_POST['to'];
?>
<div class="row">
<div class="table-responsive">
    
<table style="border:1px;min-width:600px;" class="table">
    <thead>
        <th>Product</th>
        <th>Avg purchase rate</th>
        <th>Avg Sale rate</th>
        <th>Unit Profit</th>
        <th>Qty Sold</th>
        <th>Est Prof</th>
    </thead>
    <tbody>
<?php
$get = mysqli_query($con, "select * from ppmpro");
$t_prof = 0;
while($data = mysqli_fetch_array($get))
{
    $pro_id = $data['id'];
    $get_sale = mysqli_query($con, "select * from ppmsale where pro = '$pro_id' order by id desc limit 30");
    $t_sale_q = 0;
    $sale_amount = 0;
    $sale_rows = mysqli_num_rows($get_sale);
    while($sale = mysqli_fetch_array($get_sale))
    {
        $t_sale_q += $sale['qty'];
        $sale_amount += $sale['amount'];
    }
    @$avg_sale_rate = ($sale_amount / $t_sale_q);
     if(is_nan($avg_sale_rate))
    {
        $avg_sale_rate = 0;
    }
    $get_pur = mysqli_query($con, "select * from ppmpurchase where pro = '$pro_id' order by id desc limit 2");
    $t_pur_q = 0;
    $pur_amount = 0;
    $pur_rows = mysqli_num_rows($get_pur);
    while($pur = mysqli_fetch_array($get_pur))
    {
        $t_pur_q += $pur['qty'];
        $pur_amount += $pur['amount'];
    }
    @$avg_pur_rate = ($pur_amount / $t_pur_q);
    if(is_nan($avg_pur_rate))
    {
        $avg_pur_rate = 0;
    }
    
    $get_sale_total = mysqli_query($con, "select * from ppmsale where date between '$from' and '$to' and pro = '$pro_id'");
    $total_sale_q = 0;
     while($total = mysqli_fetch_array($get_sale_total))
    {
        $total_sale_q += $total['qty'];
    }
    
     $unit_prof = $avg_sale_rate - $avg_pur_rate;
    $net_pro = $unit_prof * $total_sale_q;
    $t_prof += $net_pro;
    ?>
    <tr>
        
        <td><?php echo $data['pro']; ?></td>
        <td><?php echo number_format($avg_pur_rate,1); ?></td>
        <td><?php echo number_format($avg_sale_rate,1); ?></td>
        <td><?php echo number_format($unit_prof,1); ?></td>
        <td><?php echo number_format($total_sale_q,1); ?></td>
        <td><?php echo number_format($net_pro,1); ?></td>
      
    </tr>
    <?php
}
?>
 </tbody>
 <tfoot>
     <th colspan="5" style="text-align:right;">Total Profit: </th>
    <th><?php echo number_format($t_prof,1); ?></th>
    </tfoot>
</table>

</div>
</div>