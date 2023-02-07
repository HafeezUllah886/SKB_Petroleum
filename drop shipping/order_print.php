<!DOCTYPE html>
<html lang="en">
<?php
include("supported/session.php");
include("supported/connect.php");
?>
<head>

    <title>Drop Shipping - Order Details</title>

    <!-- Custom fonts for this template-->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css" integrity="sha384-DyZ88mC6Up2uqS4h/KRgHuoeGwBcD4Ng9SiP4dIRy0EXTlnuz47vAwmeGwVChigm" crossorigin="anonymous">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">
    <link href="vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
    <style>
        #DivIdToPrint
        {
            
        }
    </style>
</head>

<body id="page-top">
    <?php        
        include("supported/order_details.php");
    ?>
    <!-- Page Wrapper -->
  
                                
                                <div class="card-body" style="font-family:cambria;" id="DivIdToPrint">
                                <link href="css/sb-admin-2.min.css" rel="stylesheet">
                                    <div>
                                        <h4 class="d-flex justify-content-center">SKB PETROLEUM </h4>
                                        <h5 class="d-flex justify-content-center"> ORDER INVOICE </h5>
                                    </div>
                                    <div>
                                        <table style="border:1px;width:100%;">
                                            <tr>
                                                <td width="33.33%">Order No: <?php echo $id; ?></td>
                                                <td width="33.33%" style="text-align:center;">Product: <?php echo $pro; ?> </td>
                                                <td width="33.33%" style="text-align:right;">Date: <?php echo $date; ?></td>
                                            </tr>
                                        </table>
                                        <p style="font-weight:bold;margin-top:10px;margin-bottom:5px;">Supplier Details</p>
                                        <table style="border:1px;width:100%;">
                                          <thead style="background:lightgray;">
                                                <th style="width:40%;">Supplier</th>
                                                <th style="width:20%;">Quantity</th>
                                                <th style="width:20%;">Rate</th>
                                                <th style="width:20%;">Amount</th>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td><?php echo $sup; ?></td>
                                                    <td><?php echo $s_qty; ?> Liters</td>
                                                    <td>Rs <?php echo $s_rate; ?></td>
                                                    <td>Rs <?php echo $s_amount; ?></td>
                                                </tr>
                                            </tbody>
                                        </table>
                                        <p style="font-weight:bold;margin-top:10px;margin-bottom:5px;">Customer Details</p>
                                        <table style="border:1px;width:100%;">
                                          <thead style="background:lightgray;">
                                                <th style="width:40%;">Customer</th>
                                                <th style="width:20%;">Quantity</th>
                                                <th style="width:20%;">Rate</th>
                                                <th style="width:20%;">Amount</th>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td><?php echo $cus; ?></td>
                                                    <td><?php echo $c_qty; ?> Liters</td>
                                                    <td>Rs <?php echo $c_rate; ?></td>
                                                    <td>Rs <?php echo $c_amount; ?></td>
                                                </tr>
                                            </tbody>
                                        </table>
                                        <p style="font-weight:bold;margin-top:10px;margin-bottom:5px;">Driver Details</p>
                                        <table style="border:1px;width:100%;">
                                          <thead style="background:lightgray;">
                                                <th style="width:40%;">Driver</th>
                                                <th style="width:20%;">Veh No.</th>
                                                <th style="width:20%;">Driver Charges</th>
                                                <th style="width:20%;">Fuel Used</th>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td><?php echo $driver; ?></td>
                                                    <td><?php echo $veh_no; ?></td>
                                                    <td>Rs <?php echo $driver_char; ?></td>
                                                    <td><?php echo $s_qty - $c_qty; ?> Liters</td>
                                                </tr>
                                            </tbody>
                                            
                                        </table>
                                        <p style="font-weight:bold;margin-top:10px;margin-bottom:5px;">Check Posts Details</p>
                                        <table border="1px" style="border:1px;width:100%;">
                                          <thead style="background:lightgray;">
                                                <th style="width:5%;">Ser</th>
                                                <th style="width:35%;">Post Name</th>
                                                <th style="width:20%;">Is Paid</th>
                                                <th style="width:20%;">Paid By</th>
                                                <th style="width:20%;">Charges</th>
                                            </thead>
                                            <tbody>
                                                <?php
                                                    $get_p_c = mysqli_query($con, "select * from route_char where tr_no = '$tr_no'");
                                                    $total = 0;
                                                    $ser = 1;
                                                    while($r_c = mysqli_fetch_array($get_p_c))
                                                    {
                                                        $p_acct_id = $r_c['acct_id'];
                                                        $total = $total + $r_c['amount'];
                                                        $g_p_name = mysqli_fetch_array(mysqli_query($con, "select * from posts where acct_id = '$p_acct_id'"));
                                                        $p_name = $g_p_name['name'];
                                                        ?>
                                                            <tr>
                                                                <td><?php echo $ser; ?></td>
                                                                <td><?php echo $p_name; ?></td>
                                                                <td><?php if($r_c['is_paid'] == 1){ echo "Yes"; } else { echo "No"; } ?></td>
                                                                <td><?php echo $r_c['paid_by']; ?></td>
                                                                <td>Rs <?php echo $r_c['amount']; ?></td>
                                                            </tr>
                                                        <?php
                                                        $ser += 1;
                                                    }

                                                ?>
                                            </tbody>
                                            <tfoot>
                                                <th colspan="4" style="text-align:right;">Total:</th>
                                                <th>Rs. <?php echo $total; ?></th>
                                            </tfoot>
                                        </table>
                                        <div style="width:300px;float:right;">
                                        <p style="font-weight:bold;margin-top:10px;margin-bottom:5px;">Summary</p>
                                        <table style="border:1px;width:100%;">
                                            <tr>
                                                <td>Sale</td>
                                                <td>Rs <?php echo $c_amount; ?></td>
                                            </tr>    
                                            <tr>
                                                <td>Purchase</td>
                                                <td>Rs <?php echo $s_amount; ?></td>
                                            </tr>    
                                            <tr>
                                                <td>Driver Charges</td>
                                                <td>Rs <?php echo $driver_char; ?></td>
                                            </tr>    
                                            <tr>
                                                <td>Check Post Charges</td>
                                                <td>Rs <?php echo $total; ?></td>
                                            </tr>    
                                            <tr style="font-weight:bold;">
                                                <td>Net Profit</td>
                                                <td>Rs <?php echo $c_amount - ($s_amount + $driver_char + $total); ?></td>
                                            </tr>    
                                        </table>
                                        </div>
                                        <p style="font-weight:bold;margin-top:10px;margin-bottom:5px;">Remarks</p>
                                        <p style="margin-top:10px;margin-bottom:5px;"><?php echo $rem; ?></p>
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