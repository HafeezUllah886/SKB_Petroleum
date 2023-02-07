<!DOCTYPE html>
<html lang="en">
<?php
include("supported/session.php");
include("supported/connect.php");
?>
<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Drop Shipping - Order Details</title>

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
    <div id="wrapper">

        <!-- Sidebar -->
      <?php
      include("supported/nav.html");
      ?>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <?php
                    include("supported/top bar.php");
                ?>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">Order Details</h1>
                    </div>
                    <?php
                        
                        include("supported/order_details.php");
                    ?>
                    <!-- Content Row -->
                  
                    <!-- Content Row -->

                    <div class="row">

                        <!-- Area Chart -->
                        <div class="col-xl-12 col-lg-12">
                            <div class="card shadow mb-4">
                                <!-- Card Header - Dropdown -->
                                <div
                                    class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                    <h6 class="m-0 font-weight-bold text-primary">Details</h6>
                                    <div class="dropdown no-arrow">
                                        <a href="order_print.php?id=<?php echo $id; ?>" class="btn btn-primary btn-sm" >Print</a>
                                        <a class="btn btn-danger btn-sm" role="button" id="delete">Delete</a>
                                    </div>
                                </div>
                                <!-- Card Body -->
                                <form id="filter">
                                <div class="card-body">
                                <div class="row">
                                    <div class="col-md-3">
                                        <p width="100%" >Order Id: <span style="float:right;font-weight:bold;" class="float-md-none"><?php echo $id; ?></span></p>
                                    </div>
                                    <div class="col-md-3">
                                        <p width="100%">Date: <span style="float:right;font-weight:bold;" class="float-md-none"><?php echo date("d-m-Y", strtotime($date));; ?></span></p>
                                    </div>
                                    <div class="col-md-3">
                                        <p width="100%">Product: <span style="float:right;font-weight:bold;" class="float-md-none"><?php echo $pro; ?></span></p>
                                    </div>
                                    <div class="col-md-3">
                                        <p width="100%">Profit: <span style="float:right;font-weight:bold;" class="float-md-none"><?php echo $profit; ?></span></p>
                                    </div>
                                    <div class="col-md-12">
                                        <hr class="sidebar-divider">
                                        <div class="sidebar-heading" style="opacity:0.5;">Supplier Details</div>
                                    </div>
                                    <div class="col-md-12">
                                        <p width="100%">Supplier: <span style="font-weight:bold;" class="float-md-none"><?php echo $sup; ?></span></p>
                                    </div>
                                    <div class="col-md-4">
                                        <p width="100%">Quantity: <span style="float:right;font-weight:bold;" class="float-md-none"><?php echo $s_qty; ?> Liters</span></p>
                                    </div>
                                    <div class="col-md-4">
                                        <p width="100%">Rate: <span style="float:right;font-weight:bold;" class="float-md-none">Rs. <?php echo $s_rate; ?> </span></p>
                                    </div>
                                    <div class="col-md-4">
                                        <p width="100%">Amount: <span style="float:right;font-weight:bold;" class="float-md-none">Rs. <?php echo $s_amount; ?> </span></p>
                                    </div>
                                    <div class="col-md-12">
                                        <hr class="sidebar-divider">
                                        <div class="sidebar-heading" style="opacity:0.5;">Customer Details</div>
                                    </div>
                                    <div class="col-md-12">
                                        <p width="100%">Customer: <span style="font-weight:bold;" class="float-md-none"><?php echo $cus; ?></span></p>
                                    </div>
                                    <div class="col-md-4">
                                        <p width="100%">Quantity: <span style="float:right;font-weight:bold;" class="float-md-none"><?php echo $c_qty; ?> Liters</span></p>
                                    </div>
                                    <div class="col-md-4">
                                        <p width="100%">Rate: <span style="float:right;font-weight:bold;" class="float-md-none">Rs. <?php echo $c_rate; ?> </span></p>
                                    </div>
                                    <div class="col-md-4">
                                        <p width="100%">Amount: <span style="float:right;font-weight:bold;" class="float-md-none">Rs. <?php echo $c_amount; ?> </span></p>
                                    </div>
                                    <div class="col-md-12">
                                        <hr class="sidebar-divider">
                                        <div class="sidebar-heading" style="opacity:0.5;">Vehicle Details</div>
                                    </div>
                                    <div class="col-md-12">
                                        <p width="100%">Driver: <span style="float:right;font-weight:bold;" class="float-md-none"><?php echo $driver; ?></span></p>
                                    </div>
                                    <div class="col-md-4">
                                        <p width="100%">Vehicle No. <span style="float:right;font-weight:bold;" class="float-md-none"><?php echo $veh_no; ?></span></p>
                                    </div>
                                    <div class="col-md-4">
                                        <p width="100%">Fuel Used: <span style="float:right;font-weight:bold;" class="float-md-none"><?php echo $fuel_used; ?> Liters</span></p>
                                    </div>
                                    <div class="col-md-4">
                                        <p width="100%">Driver Charges: <span style="float:right;font-weight:bold;" class="float-md-none">Rs. <?php echo $driver_char; ?> </span></p>
                                    </div>
                                    <div class="col-md-12">
                                        <hr class="sidebar-divider">
                                        <div class="sidebar-heading" style="opacity:0.5;">Check Posts Details</div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="table-responsive">
                                        <table class="table" style="min-width:400px;">
                                            <thead>
                                                <th>Post</th>
                                                <th>Charges</th>
                                                <th>Paid By</th>
                                            </thead>
                                            <tbody>
                                                <?php
                                                    $get_p_c = mysqli_query($con, "select * from route_char where tr_no = '$tr_no'");
                                                    $total = 0;
                                                    while($r_c = mysqli_fetch_array($get_p_c))
                                                    {
                                                        $p_acct_id = $r_c['acct_id'];
                                                        $total = $total + $r_c['amount'];
                                                        $g_p_name = mysqli_fetch_array(mysqli_query($con, "select * from posts where acct_id = '$p_acct_id'"));
                                                        $p_name = $g_p_name['name'];
                                                        ?>
                                                            <tr>
                                                                <td><?php echo $p_name; ?></td>
                                                                <td><?php echo $r_c['amount']; ?></td>
                                                                <td><?php echo $r_c['paid_by']; ?></td>
                                                            </tr>
                                                        <?php
                                                    }

                                                ?>
                                            </tbody>
                                            <tfoot>
                                                <th>Total:</th>
                                                <th>Rs. <?php echo $total; ?></th>
                                            </tfoot>
                                        </table>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <hr class="sidebar-divider">
                                        <div class="sidebar-heading" style="opacity:0.5;">Summary</div>
                                    </div>
                                    <div class="col-md-12">
                                        <p width="100%">Total Sale: <span style="float:right;font-weight:bold;color:green;" class="float-md-none"><?php echo $c_amount; ?></span></p>
                                    </div>
                                    <div class="col-md-3">
                                        <p width="100%">Purchase: <span style="float:right;font-weight:bold;color:tomato;" class="float-md-none"><?php echo $s_amount; ?></span></p>
                                    </div>
                                    <div class="col-md-3">
                                        <p width="100%">Check Post Charges: <span style="float:right;font-weight:bold;color:tomato;" class="float-md-none"><?php echo $route_exp; ?></span></p>
                                    </div>
                                    <div class="col-md-3">
                                        <p width="100%">Driver Charges: <span style="float:right;font-weight:bold;color:tomato;" class="float-md-none"><?php echo $driver_char; ?></span></p>
                                    </div>
                                    <div class="col-md-3">
                                        <p width="100%">Profit: <span style="float:right;font-weight:bold;color:green;" class="float-md-none"><?php echo $profit; ?></span></p>
                                    </div>
                                    <div class="col-md-12">
                                        <hr class="sidebar-divider">
                                        <div class="sidebar-heading" style="opacity:0.5;">Remarks</div>
                                    </div>
                                    <div class="col-md-12">
                                        <p width="100%"><span style="font-weight:bold;"><?php echo $rem; ?></span></p>
                                    </div>
                                       
                                    </div>
                                </div>
                                </form>
                            </div>
                        </div>

                        <!-- Pie Chart -->
                      
                    </div>

                    <!-- Content Row -->
                    

                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Copyright &copy; <a href="https://www.facebook.com/hafeez.ullah.902604">Hafeez Ullah</a></span>
                    </div>
                </div>
            </footer>
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

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
    function get_orders(){
    var filter = $("#filter").serialize();
    $.post("supported/show_orders.php",filter,function (orders){
        $("#show_orders").html(orders);
    });
}

$("#to").change(function (){
    get_orders();
});
$("#from").change(function (){
    get_orders();
});
    //Start of Document Ready
    $(document).ready(function (){
        get_orders();
    });
    //End of Document Ready
   
    $("#delete").click(function (){
        swal({
    title: "Are You Sure",
    text: "It will delete order as well as funds associated to this order",
    icon: "warning",
    buttons: ["No", "Yes"],
    dangerMode: true,
  })
  .then((willDelete) => {
    if (willDelete) {
      swal("Please confirm accout password:", {content: {
    element: "input",
    attributes: {
      placeholder: "Type your password",
      type: "password",
    },
  },})
.then((value) => {
  $.post('supported/checkpass.php',{value:value},function(result){
    if(result == 'correct')
    {
        $.post('supported/delete_order.php?tr_no=<?php echo $tr_no; ?>',function(dmsg){
            console.log(dmsg);
          swal("Poof! Order has been deleted!", {
            icon: "success",
      }).then(function (){
        window.open("order_his.php","_self");
      });
        });
    }
    else
    {
      swal("Invalid Password");
      $("#deletebtn").text("Delete");
    }
  });
});
    } else {
      swal("Process Cancelled!");
      $("#deletebtn").text("Delete");
    }
  });
    });
</script>

</html>