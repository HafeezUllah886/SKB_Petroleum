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

    <title>Drop Shipping - Business Accounts</title>

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
                        <h1 class="h3 mb-0 text-gray-800">Business Accounts</h1>
                        
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
                                    <div class="dropdown no-arrow">
                                        <p class="btn btn-info btn-sm" role="button" id="add_sup" data-toggle="modal" data-target="#add-acct">Add New</p>
                                    </div>
                                </div>
                                <!-- Card Body -->
                                <div class="card-body" id="show_acct">
                               
                                </div>
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



    <div class="modal fade" id="add-acct" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Add New Account</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="acct_form" method="post">
                    <div class="form-group">
                        <label for="acct_title">Account Title</label>
                        <input type="text" required class="form-control form-control-user" placeholder="Enter Account Name" name="acct_title">
                    </div>
                    <div class="form-group">
                        <label for="acct_no">Account No.</label>
                        <input type="text" required class="form-control form-control-user" placeholder="Enter Account No." name="acct_no">
                    </div>
                    <div class="form-group">
                        <label for="opening">Opening Balance</label>
                        <input type="number" required class="form-control form-control-user" placeholder="Enter Openning Balance" name="opening">
                    </div>
                </div>
                <div class="modal-footer">
                <input type="submit" value="Create" class="btn btn-success form-control form-control-user" id="save">
                </div>
                </form>
            </div>
        </div>
    </div>

    

    <div class="modal fade" id="edit-acct" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Edit Account</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="acct_e_form" method="post">
                   
                </div>
                <div class="modal-footer">
                <input type="submit" value="Update" class="btn btn-success form-control form-control-user" id="save_e">
                </div>
                </form>
            </div>
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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/dataTables.bootstrap4.min.css">
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.6/js/dataTables.bootstrap4.min.js"></script>

   <!-- Page level plugins -->

</body>
<script>
    function get_acct(){
    $("#show_acct").load("supported/show_acct.php?type=business");
}

    //Start of Document Ready
    $(document).ready(function (){
        get_acct();
        new DataTable('#datatable', {
    ordering: false,
});
    });
    //End of Document Ready
    //Start of Edit Modal
    function edit(id)
    {
        $.post("supported/get_e_acct.php",{id:id},function (e){
            $("#acct_e_form").html(e);
        });
        $("#edit-acct").modal('show');
        
    }

    function add(id,title)
    {
        console.log("working");
        $('#acct_id').val(id);
        $('#acct_name').val(title);
        $("#add-cash").modal('show');
        
    }
    //End of Edit Modal
    //Start of Save New Supplier
$("#save").click(function (){
    var data = $("#acct_form").serialize();
    $.post("supported/save_acct.php?type=business",data,function(msg){
        if(msg == 'done')
        {
            swal({
                  title: "Saved",
                  icon: "success",
                  dangerMode: true
                  }).then(function (){
                      $("#add-acct").modal('hide');
                      get_acct();
                  });
        }
        if(msg == 'existing')
        {
            swal({
                  title: "Existing",
                  text: "Driver with this name has already saved",
                  icon: "warning",
                  dangerMode: false
                  }); 
        }
    });
});

$("#addCash").click(function (){
    var data = $("#add_form").serialize();
    $.post("supported/add_cash.php?type=business",data,function(msg){
        if(msg == 'ok')
        {
            swal({
                  title: "Saved",
                  icon: "success",
                  dangerMode: true
                  }).then(function (){
                      $("#add-cash").modal('hide');
                  });
        }
    });
});
//End of Save New Supplier
//Start of Save Edit Supplier

    $("#save_e").click(function (){
        var data_e = $("#acct_e_form").serialize();
        $.post("supported/save_e_acct.php",data_e,function(msg_e){
            console.log(msg_e);
            if(msg_e == 'done')
            {
                swal({
                    title: "Updated",
                    icon: "success",
                    dangerMode: true
                    }).then(function (){
                      $("#edit-acct").modal('hide');
                      get_acct();
                    });
            }
            if(msg_e == 'existing')
            {
                swal({
                    title: "Existing",
                    text: "Account with this title has already saved",
                    icon: "warning",
                    dangerMode: false
                    }); 
            }
        });

    });
    
//End of Save Edit Supplier

$("#acct_form").submit(function (){
   
   return false;
});
$("#acct_e_form").submit(function (){
   
   return false;
});
$("#add_form").submit(function (){
   
   return false;
});
</script>

</html>