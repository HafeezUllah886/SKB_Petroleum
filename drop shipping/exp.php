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

    <title>Drop Shipping - Expenses</title>

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
                        <h1 class="h3 mb-0 text-gray-800">Expenses</h1>
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
                                    <p class="btn btn-warning btn-sm" role="button" data-toggle="modal" data-target="#cat">Categories</p>    
                                    <p class="btn btn-info btn-sm" role="button" data-toggle="modal" data-target="#add-trans">New Expense</p>
                                        
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
                                        <div class="col-xl-12 col-md-12 mb-4" id="show_exp">
                                           
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
                    <h5 class="modal-title" id="exampleModalLabel">Add New Expense</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="exp_form" method="post">
                    <div class="form-group">
                        <label for="date">Date</label>
                        <input type="date" required value="<?php echo date('Y-m-d')?>" class="form-control form-control-user" name="date">
                    </div>
                    <div class="form-group">
                        <label for="from">Account</label>
                        <select class="form-control form-control-user" name="from">
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
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="cat">Category</label>
                        <select class="form-control form-control-user" name="cat">
                  
                           <?php 
                                $acct2 = mysqli_query($con, "select * from cat");
                                while($op2 = mysqli_fetch_array($acct2))
                                {
                                    ?>
                                        <option><?php echo $op2['name'];?></option>
                                    <?php
                                }
                            ?>
                           
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
                <input type="submit" value="Save" class="btn btn-success form-control form-control-user" id="save">
                </div>
                </form>
            </div>
        </div>
    </div>

    
    <div class="modal fade" id="cat" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Category</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="trans_form" method="post">
                    <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" required class="form-control form-control-user" placeholder="Enter Category Name" id="name" name="nmae">
                    </div>
                    <div class="form-group">
                        <p class="btn btn-warning btn-block" onclick="save_cat()">Save</p>
                    </div>
                    <div class="table-responsive" id="show_cat">
                        
                    </div>
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

</body>
<script>
    $(document).ready(function (){
        showCat();
    });
    function showCat()
    {
        $("#show_cat").load("supported/show_cat.php");
    }
function save_cat()
{
    var name = $("#name").val();
    $.post("supported/save_cat.php",{name:name},function(save){
        if(save == 'saved')
        {
            swal({
                  title: "Saved",
                  icon: "success",
                  dangerMode: true
                  }).then(function (){
                    showCat();
                  });
        }
        if(save == 'existing')
        {
            swal({
                  title: "Catagory with this name already existing",
                  icon: "warning",
                  dangerMode: false
                  }); 
        }
    });
}




function get_exp(){
    var filter = $("#filter").serialize();
    $.post("supported/exp.php",filter,function (state){
        $("#show_exp").html(state);
    });
}
$("#to").change(function (){
    get_exp();
});
$("#from").change(function (){
    get_exp();
});
    //Start of Document Ready
    $(document).ready(function (){
        get_exp();
    });
    //End of Document Ready
    //Start of Edit Modal
 
   

    //End of Edit Modal
    //Start of Save New Supplier
$("#save").click(function (){
    var data = $("#exp_form").serialize();
    console.log("clicked");
    $.post("supported/save_exp.php",data,function(msg){
        if(msg == 'ok')
        {
            swal({
                  title: "Expense Saved",
                  icon: "success",
                  dangerMode: true
                  }).then(function (){
                      $("#add-trans").modal('hide');
                      get_exp();
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
$.post("supported/delete_cat.php",{id:id},function (msg){
        showCat();
    });

}

    
//End of Save Edit Supplier

$("#exp_form").submit(function (){
   
   return false;
});
   
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
        $.post('supported/delete_exp.php?tr_no='+id, function(dmsg){
          swal("Poof! Expense has been deleted!", {
            icon: "success",
      }).then(function (){
        get_exp();
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