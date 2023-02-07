<!DOCTYPE html>
<html lang="en">
<?php
include("supported/session.php");
include("supported/connect.php");

$from = $_GET['from'];
$to = $_GET['to'];
?>
<head>

    <title>Pump Management - Profit Print</title>

    <!-- Custom fonts for this template-->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css" integrity="sha384-DyZ88mC6Up2uqS4h/KRgHuoeGwBcD4Ng9SiP4dIRy0EXTlnuz47vAwmeGwVChigm" crossorigin="anonymous">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">
    <link href="vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
 
</head>

<body id="page-top">
 
    <!-- Page Wrapper -->
                                <div class="card-body" style="font-family:cambria;" id="DivIdToPrint">
                                <link href="css/sb-admin-2.min.css" rel="stylesheet">
                                    <div>
                                        <h4 class="d-flex justify-content-center">SKB PETROLEUM </h4>
                                        <h5 class="d-flex justify-content-center"> ESTIMATED PROFIT </h5>
                                    </div>
                                    <div>
                                        <hr>
                                        <table style="border:1px;width:100%;">
                                            <tr>
                                                
                                                <td style="text-align:center;">From: <?php echo date("d-m-Y", strtotime($from)); ?> </td>
                                                <td style="text-align:center;">To: <?php echo date("d-m-Y", strtotime($to)); ?> </td>
                                            </tr>
                                        </table>
                                        
                                       
                                       
   
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
    $get_sale = mysqli_query($con, "select * from ppmsale where date between '$from' and '$to' and pro = '$pro_id'");
    $t_sale_q = 0;
    $sale_amount = 0;
    $sale_rows = mysqli_num_rows($get_sale);
    while($sale = mysqli_fetch_array($get_sale))
    {
        $t_sale_q += $sale['qty'];
        $sale_amount += $sale['amount'];
    }
    @$avg_sale_rate = ($sale_amount / $t_sale_q);
    
    $get_pur = mysqli_query($con, "select * from ppmpurchase where date between '$from' and '$to' and pro = '$pro_id'");
    $t_pur_q = 0;
    $pur_amount = 0;
    $pur_rows = mysqli_num_rows($get_pur);
    while($pur = mysqli_fetch_array($get_pur))
    {
        $t_pur_q += $pur['qty'];
        $pur_amount += $pur['amount'];
    }
    @$avg_pur_rate = ($pur_amount / $t_pur_q);
    $unit_prof = $avg_sale_rate - $avg_pur_rate;
    $net_pro = $unit_prof * $t_sale_q;
    $t_prof += $net_pro;
    ?>
    <tr>
        
        <td><?php echo $data['pro']; ?></td>
        <td><?php echo number_format($avg_pur_rate,1); ?></td>
        <td><?php echo number_format($avg_sale_rate,1); ?></td>
        <td><?php echo number_format($unit_prof,1); ?></td>
        <td><?php echo number_format($t_sale_q); ?></td>
        <td><?php echo number_format($net_pro); ?></td>
      
    </tr>
    <?php
}
?>
 </tbody>
 <tfoot>
     <th colspan="5" style="text-align:right;">Total Profit: </th>
    <th><?php echo number_format($t_prof); ?></th>
    </tfoot>
</table>
                                    </div>
                                </div>
                          
    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>
    <script src="js/sweetalert2/sweetalert.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>
   <!-- Page level plugins -->

</body>
<script>
$(document).ready(function (){
    window.print();
});
</script>

</html>