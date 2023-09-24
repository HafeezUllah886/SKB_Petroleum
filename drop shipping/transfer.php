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

    <title>Drop Shipping - Transfer</title>

    <!-- Custom fonts for this template-->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css" integrity="sha384-DyZ88mC6Up2uqS4h/KRgHuoeGwBcD4Ng9SiP4dIRy0EXTlnuz47vAwmeGwVChigm" crossorigin="anonymous">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">
    <link href="vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/selectize-bootstrap4-theme@2.0.2/dist/css/selectize.bootstrap4.min.css">

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
                        <h1 class="h3 mb-0 text-gray-800">Fund Transfer</h1>
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
                                        <p class="btn btn-info btn-sm" role="button" data-toggle="modal" data-target="#add-trans">New Transfer</p>
                                        <p class="btn btn-primary btn-sm" id="printbtn">Print</p>
                                    </div>
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
                                        <div class="col-xl-12 col-md-12 mb-4" id="show_transfers">
                                           
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



    <div class="modal fade" id="add-trans" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Add New Transfer</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="trans_form" method="post">
                    <div class="form-group">
                        <label for="date">Date</label>
                        <input type="date" required value="<?php echo date('Y-m-d')?>" class="form-control form-control-user" name="date">
                    </div>
                    <div class="form-group">
                        <label for="from">From</label>
                        <select class="form-control form-control-user selectize" name="from">
                        <optgroup label="Business">
                           <?php 
                                $acct = mysqli_query($con, "select * from accounts where type = 'business' and status = 'Active'");
                                while($op = mysqli_fetch_array($acct))
                                {
                                    ?>
                                        <option value="<?php echo $op['id']?>"><?php echo $op['name'];?></option>
                                    <?php
                                }
                            ?>
                            </optgroup>
                            <optgroup label="Customers">
                           <?php 
                                $acct1 = mysqli_query($con, "select * from accounts where type = 'Customer' and status = 'Active'");
                                while($op1 = mysqli_fetch_array($acct1))
                                {
                                    ?>
                                        <option value="<?php echo $op1['id']?>"><?php echo $op1['name'];?></option>
                                    <?php
                                }
                            ?>
                            </optgroup>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="acct_no">To</label>
                        <select class="form-control form-control-user selectize" name="to">
                        <optgroup label="Business">
                           <?php 
                                $acct2 = mysqli_query($con, "select * from accounts where type = 'business' and status = 'Active'");
                                while($op2 = mysqli_fetch_array($acct2))
                                {
                                    ?>
                                        <option value="<?php echo $op2['id']?>"><?php echo $op2['name'];?></option>
                                    <?php
                                }
                            ?>
                            </optgroup>
                            <optgroup label="Suppliers">
                           <?php 
                                $acct3 = mysqli_query($con, "select * from accounts where type = 'supplier' and status = 'Active'");
                                while($op3 = mysqli_fetch_array($acct3))
                                {
                                    ?>
                                        <option value="<?php echo $op3['id']?>"><?php echo $op3['name'];?></option>
                                    <?php
                                }
                            ?>
                            </optgroup>
                            <optgroup label="Check Posts">
                           <?php 
                                $acct4 = mysqli_query($con, "select * from accounts where type = 'post'");
                                while($op4 = mysqli_fetch_array($acct4))
                                {
                                    ?>
                                        <option value="<?php echo $op4['id']?>"><?php echo $op4['name'];?></option>
                                    <?php
                                }
                            ?>
                            </optgroup>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="amount">Amount</label>
                        <input type="number" required class="form-control form-control-user" placeholder="Enter Amount" name="amount">
                    </div>
                    <div class="form-group">
                        <label for="rem">Remarks</label>
                        <textarea class="form-control form-control-user" placeholder="Enter Remarks" name="rem"></textarea>
                    </div>
                </div>
                <div class="modal-footer">
                <input type="submit" value="Transfer" class="btn btn-success form-control form-control-user" id="save">
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
   <!-- Page level plugins -->
   <script
  src="https://cdnjs.cloudflare.com/ajax/libs/selectize.js/0.15.2/js/selectize.min.js"
  integrity="sha512-IOebNkvA/HZjMM7MxL0NYeLYEalloZ8ckak+NDtOViP7oiYzG5vn6WVXyrJDiJPhl4yRdmNAG49iuLmhkUdVsQ=="
  crossorigin="anonymous"
  referrerpolicy="no-referrer"
></script>

</body>
<script>

function get_transfer(){
    var filter = $("#filter").serialize();
    $.post("supported/transfers.php",filter,function (state){
        $("#show_transfers").html(state);
    });
}
$("#to").change(function (){
    get_transfer();
});
$("#from").change(function (){
    get_transfer();
});
    //Start of Document Ready
    $(document).ready(function (){
        get_transfer();
        $(".selectize").selectize();
    });
    //End of Document Ready
    //Start of Edit Modal
 
   

    //End of Edit Modal
    //Start of Save New Supplier
$("#save").click(function (){
    var data = $("#trans_form").serialize();
    console.log("clicked");
    $.post("supported/save_trans.php",data,function(msg){
        if(msg == 'ok')
        {
            swal({
                  title: "Transfered",
                  icon: "success",
                  dangerMode: true
                  }).then(function (){
                      $("#add-trans").modal('hide');
                      get_transfer();
                  });
        }
        if(msg == 'same')
        {
            swal({
                  title: "Same Accounts",
                  text: "Please Select Different Account",
                  icon: "warning",
                  dangerMode: false
                  }); 
        }
    });
});
function delet(id)
{
$.post("supported/delete_transfer.php",{id:id},function (msg){
       console.log(msg);
        get_transfer();
    });

}
$("#printbtn").click(function (){
    var from = $("#from").val();
    var to = $("#to").val();
    window.open("print_transfer.php?from="+from+"&to="+to,"_self");

   });

    
//End of Save Edit Supplier

$("#trans_form").submit(function (){
   
   return false;
});
   
function delet(id)
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
        $.post('supported/delete_transfer.php?tr_no='+id, function(dmsg){
          swal("Poof! Order has been deleted!", {
            icon: "success",
      }).then(function (){
        get_transfer();
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