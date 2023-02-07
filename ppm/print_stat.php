<!DOCTYPE html>
<html lang="en">
<?php
include("supported/session.php");
include("supported/connect.php");
$acct_id = $_GET['id'];
$from = $_GET['from'];
$to = $_GET['to'];

$get_name = mysqli_fetch_array(mysqli_query($con, "select * from ppmaccounts where id = '$acct_id'"));
$ac_name = $get_name['name'];
$ac_type = $get_name['type'];

$get1 = mysqli_query($con, "select * from ppmtrans where date < '$from' and accn = '$acct_id'");
$p_bal = 0;
while($data1 = mysqli_fetch_array($get1))
{
    $p_cr = $data1['cr'];
    $p_dt = $data1['dt'];
    if($p_cr > 0)
    {
        $p_bal += $p_cr;
    }
    if($p_dt > 0)
    {
        $p_bal -= $p_dt;
    }
}

$get2 = mysqli_query($con, "select * from ppmtrans where accn = '$acct_id'");
$c_bal = 0;
while($data2 = mysqli_fetch_array($get2))
{
    $c_cr = $data2['cr'];
    $c_dt = $data2['dt'];
    if($c_cr > 0)
    {
        $c_bal += $c_cr;
    }
    if($c_dt > 0)
    {
        $c_bal -= $c_dt;
    }
}
?>
?>
<head>

    <title>Drop Shipping - Statement Print</title>

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
 
    <!-- Page Wrapper -->
                                <div class="card-body" style="font-family:cambria;" id="DivIdToPrint">
                                <link href="css/sb-admin-2.min.css" rel="stylesheet">
                                    <div>
                                        <h4 class="d-flex justify-content-center">SKB PETROLEUM </h4>
                                        <h5 class="d-flex justify-content-center"> ACCOUNT STATEMENT </h5>
                                    </div>
                                    <div>
                                        <hr>
                                        <table style="border:1px;width:100%;">
                                            <tr>
                                                <td width="40%">Account Name: <?php echo $ac_name; ?></td>
                                                <td width="20%">Type: <?php echo $ac_type; ?> </td>
                                                <td width="20%">From: <?php echo date("d-m-Y", strtotime($from)); ?> </td>
                                                <td width="20%">To: <?php echo date("d-m-Y", strtotime($to)); ?> </td>
                                            </tr>
                                        </table>
                                        <hr>
                                        <table style="border:1px;width:100%;">
                                            <tr>
                                                <td width="50%" style="font-size:15px;text-align:center;"> Rs <span style="font-size:20px;"><?php echo $p_bal; ?> </span><br> Opening Balance</td>
                                                <td width="50%" style="font-size:15px;text-align:center;"> Rs <span style="font-size:20px;"><?php echo $c_bal; ?> </span><br> Closing Balance</td>
                                                
                                            </tr>
                                        </table>
                                       
<table style="border:1px;width:100%;" border="1px">
    <thead>
        <th>Date</th>
        <th width="40%">Description</th>
        <th>Credit</th>
        <th>Dabit</th>
        <th>Balance</th>
    </thead>
    <tbody>
<?php
$get = mysqli_query($con, "select * from ppmtrans where date between '$from' and '$to' and accn = '$acct_id'");
$bal = $p_bal;
while($data = mysqli_fetch_array($get))
{
    $date = $data['date'];
    $rem = $data['rem'];
    $cr = $data['cr'];
    $dt = $data['dt'];
    
    ?>
    <tr>
        <td><?php echo date("d-m-Y", strtotime($date));?></td>
        <td><?php echo $rem; ?></td>
        <td><?php if($cr > 0){echo $cr; $bal += $cr; } else{ echo 0; }?></td>
        <td><?php if($dt > 0){echo $dt; $bal -= $dt;} else{ echo 0; }?></td>
        <td><?php echo $bal; ?></td>
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