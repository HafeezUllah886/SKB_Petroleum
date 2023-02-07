<!DOCTYPE html>
<html lang="en">
<?php
include("supported/session.php");
include("supported/connect.php");
$from = $_GET['from'];
$to = $_GET['to'];

?>
<head>

    <title>Pump Management - Print IN / Out Cash</title>

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
                                        <h5 class="d-flex justify-content-center"> CASH IN / OUT STATEMENT </h5>
                                    </div>
                                    <div>
                                        <hr>
                                        <table style="border:1px;width:100%;">
                                            <tr>
                                                <td width="50%" style="text-align:center;">From: <?php echo date("d-m-Y", strtotime($from)); ?> </td>
                                                <td width="50%" style="text-align:center;">To: <?php echo date("d-m-Y", strtotime($to)); ?> </td>
                                            </tr>
                                        </table>
                                        <hr>
                                        
                                       
<table style="border:1px;width:100%;" border="1px">
    <thead>
        <th>Account</th>
        <th>Date</th>
        <th width="40%">Description</th>
        <th>In/Out</th>
        <th>Amount</th>
    </thead>
    <tbody>
<?php
$get = mysqli_query($con, "select * from ppminout1 where date between '$from' and '$to'");

while($data = mysqli_fetch_array($get))
{
    $date = $data['date'];
    $rem = $data['rem'];
    ?>
    <tr>
        <td><?php echo $data['account'];?></td>
        <td><?php echo date("d-m-Y", strtotime($date));?></td>
        <td><?php echo $rem; ?></td>
        <td><?php echo $data['inouta'];?></td>
        <td><?php echo $data['amount'];?></td>
      
    </tr>
    <?php
}
?>
 </tbody>
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