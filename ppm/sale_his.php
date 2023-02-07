<!DOCTYPE html>
<html lang="en">
<?php
include("supported/session.php");
?>
<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Pump Management - Sale History</title>

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
                        <h1 class="h3 mb-0 text-gray-800">Sale History</h1>
                        
                    </div>

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
                                </div>
                                <!-- Card Body -->
                                <form id="filter">
                                <div class="card-body">
                                <div class="row">
                                    
                                    <div class="col-xl-6 col-md-6 mb-4">
                                            <div class="form-group">
                                            <label for="from">From</label>
                                                <input type="date" value="<?php echo date('Y-m-01'); ?>" class="form-control form-control-user" id="from" name="from">
                                            </div>
                                        </div>
                                        <div class="col-xl-6 col-md-6 mb-4">
                                            <div class="form-group">
                                            <label for="to">To</label>
                                                <input type="date" value="<?php echo date('Y-m-t'); ?>" class="form-control form-control-user" id="to" name="to">
                                            </div>
                                        </div>
                                        <div class="col-xl-12 col-md-12 mb-4" id="show_orders">
                                           
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
                        <span>Copyright &copy; EazSofts Developers</span>
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
    $.post("supported/show_sale.php",filter,function (orders){
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
    function delet1(id)
{
        swal({
    title: "Are You Sure",
    text: "Once Done you will not be able to recover it!",
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
        $.post('supported/delete_sale.php?tr_no='+id, function(dmsg){

          swal("Poof! Sale has been deleted!", {
            icon: "success",
      }).then(function (){
        get_orders();
      });
        });
    }
    else
    {
      swal("Invalid Password");
      
    }
  });
});
    } else {
      swal("Process Cancelled!");
      
    }
  });
    }
    
</script>

</html>