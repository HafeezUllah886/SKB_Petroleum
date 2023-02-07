<!DOCTYPE html>
<html lang="en">
<?php
include("supported/connect.php");
include("supported/session.php");
?>
<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Pump Management - Purchase</title>

    <!-- Custom fonts for this template-->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css" integrity="sha384-DyZ88mC6Up2uqS4h/KRgHuoeGwBcD4Ng9SiP4dIRy0EXTlnuz47vAwmeGwVChigm" crossorigin="anonymous">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">

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
        <div id="content-wrapper" class="d-flex flex-column ">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <?php
                    include("supported/top bar.php");
                ?>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid ">

                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">Purchase</h1>
                        
                    </div>
                
                    <!-- Content Row -->

                    <div class="row justify-content-md-center">
                    
                        <!-- Area Chart -->
                        <div class="col-lg-10">
                        <form method="post" id="purchase-form">
                            <div class="card shadow mb-4">
                                <!-- Card Header - Dropdown -->
                                <div
                                    class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                    <h6 class="m-0 font-weight-bold text-primary">Details</h6>
                                </div>
                                <!-- Card Body -->
                                <div class="card-body">
                                    <div class="row">
                                    
                                        <div class="col-xl-3 col-md-6 mb-4">
                                            <div class="form-group">
                                                <label for="date">Date</label>
                                                <input type="date" value="<?php echo date("Y-m-d"); ?>" class="form-control form-control-user" id="date" name="date">
                                            </div>
                                        </div>
                       
                                        <div class="col-xl-3 col-md-6 mb-4">
                                            <div class="form-group">
                                                <label for="sup">Supplier</label>
                                                <select class="form-control form-control-user" id="sup" name="sup">
                                                   <?php
                                                        $get_sup = mysqli_query($con, "select id, name from ppmaccounts where type='supplier' and status = 'active'");
                                                        while($sup = mysqli_fetch_array($get_sup))
                                                        {
                                                            ?>
                                                           <option value="<?php echo $sup['id']; ?>"> <?php echo $sup['name']; ?> </option>
                                                         <?php
                                                        }
                                                   ?>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-xl-3 col-md-6 mb-4">
                                            <div class="form-group">
                                                <label for="acct">Account</label>
                                                <select class="form-control form-control-user" name="acct">
                                                <?php 
                                                    $acct = mysqli_query($con, "select * from ppmaccounts where type = 'business' and status = 'Active'");
                                                    while($op = mysqli_fetch_array($acct))
                                                    {
                                                        ?>
                                                        <option value="<?php echo $op['id']?>"><?php echo $op['name'];?></option>
                                                        <?php
                                                    }
                                                ?>
                                            </select>
                                            </div>

                                        </div>
                                        <div class="col-xl-3 col-md-6 mb-4">
                                            <div class="form-group">
                                                <label for="paid">Is Paid</label>
                                                <select class="form-control form-control-user" id="paid" name="paid">
                                                    <option>Yes</option>
                                                    <option>No</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-xl-3 col-md-6 mb-4">
                                            <div class="form-group">
                                                <label for="pro">Product</label>
                                                <select class="form-control form-control-user" id="pro" name="pro">
                                                <?php
                                                        $get_pro = mysqli_query($con, "select id, pro from ppmpro");
                                                        while($pro = mysqli_fetch_array($get_pro))
                                                        {
                                                            ?>
                                                           <option value="<?php echo $pro['id']; ?>"> <?php echo $pro['pro']; ?> </option>
                                                         <?php
                                                        }
                                                   ?>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-xl-3 col-md-6 mb-4">
                                            <div class="form-group">
                                                <label for="rate">Rate</label>
                                                <input type="number" required class="form-control form-control-user" id="rate" name="rate">
                                            </div>
                                        </div>
                                        <div class="col-xl-3 col-md-6 mb-4">
                                            <div class="form-group">
                                                <label for="qty">Purchase Qty</label>
                                                <input type="number" required class="form-control form-control-user" id="qty" name="qty">
                                            </div>
                                        </div>
                                        
                                        <div class="col-xl-3 col-md-6 mb-4">
                                            <div class="form-group">
                                                <label for="amount">Purchase Amount</label>
                                                <input type="number" readonly class="form-control form-control-user" id="amount" name="amount">
                                            </div>
                                        </div>
                                       
                                        
                                        <div class="col-xl-8 col-md-6 mb-4">
                                            <div class="form-group">
                                                <label for="rem">Remarks / Description</label>
                                                <textarea class="form-control form-control-user" id="rem" name="rem"></textarea>
                                            </div>
                                        </div>
                                        
                                        <div class="col-xl-4 col-md-6 mb-4">
                                            <div class="form-group">
                                            <label for="btn"> </label>
                                                <input type="submit" value="Save" class="btn btn-success form-control form-control-user" id="save">
                                            </div>
                                        </div>
                                        
                                    </div>
                                </div>
                            </div>
                            </form>
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

</body>
<script>

    
    $(document).ready(function (){
  
    });

    $("#save").click(function (){
        $all_data = $("#purchase-form").serialize();
        $.post("supported/save_pur.php",$all_data,function (order_msg){
            console.log(order_msg);
            swal({
                  title: "Saved",
                  text: "Order Succesfully Saved",
                  icon: "success",
                  dangerMode: false
                  }).then(function (){
                     window.open("purchase.php","_self");
                  }); 
        });
    });

$("#rate").focusout(function (){
  get_amount();
});

$("#qty").focusout(function (){
  get_amount();
});


function get_amount(){
  var qty = parseFloat($('#qty').val()),
      rate = parseFloat($('#rate').val());
  $("#amount").val(qty * rate);
}

$("#purchase-form").submit(function (){
   
    return false;
});

</script>

</html>