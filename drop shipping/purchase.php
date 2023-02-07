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

    <title>Drop Shipping - Create Order</title>

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
                        <h1 class="h3 mb-0 text-gray-800">Create Order</h1>
                        
                    </div>
                
                    <!-- Content Row -->

                    <div class="row">
                    
                        <!-- Area Chart -->
                        <div class="col-lg-12">
                        <form method="post" id="order-form">
                            <div class="card shadow mb-4">
                                <!-- Card Header - Dropdown -->
                                <div
                                    class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                    <h6 class="m-0 font-weight-bold text-primary">Details</h6>
                                </div>
                                <!-- Card Body -->
                                <div class="card-body">
                                    <div class="row">
                                    <div class="col-xl-4 col-md-6 mb-4">
                                            <div class="form-group">
                                                <?php 
                                                    $get_o_n = mysqli_query($con, "select * from order_no");
                                                    $get_o_n = mysqli_fetch_array($get_o_n);
                                                    $order_no = $get_o_n['no'] + 1; 
                                                ?>
                                                <label for="order_no">Order No.</label>
                                                <input type="number" value="<?php echo $order_no; ?>" readonly class="form-control form-control-user" id="order_no" name="order_no">
                                            </div>
                                        </div>
                                        <div class="col-xl-4 col-md-6 mb-4">
                                            <div class="form-group">
                                                <label for="date">Date</label>
                                                <input type="date" value="<?php echo date("Y-m-d"); ?>" class="form-control form-control-user" id="date" name="date">
                                            </div>
                                        </div>
                                       
                                       
                                       
                                        <div class="col-xl-4 col-md-6 mb-4">
                                            <div class="form-group">
                                                <label for="pro">Product</label>
                                                <select class="form-control form-control-user" id="pro" name="pro">
                                                <?php
                                                        $get_pro = mysqli_query($con, "select id, pro from pro");
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
                                                <label for="sup">Supplier</label>
                                                <select class="form-control form-control-user" id="sup" name="sup">
                                                   <?php
                                                        $get_sup = mysqli_query($con, "select id, name from accounts where type='supplier' and status = 'active'");
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
                                                <label for="s_rate">Rate</label>
                                                <input type="number" required class="form-control form-control-user" id="s_rate" name="p_rate">
                                            </div>
                                        </div>
                                        <div class="col-xl-3 col-md-6 mb-4">
                                            <div class="form-group">
                                                <label for="p_qty">Purchase Qty</label>
                                                <input type="number" required class="form-control form-control-user" id="p_qty" name="p_qty">
                                            </div>
                                        </div>
                                        <div class="col-xl-3 col-md-6 mb-4">
                                            <div class="form-group">
                                                <label for="s-amount">Purchase Amount</label>
                                                <input type="number" readonly class="form-control form-control-user" id="s_amount" name="p_amount">
                                            </div>
                                        </div>
                                        <div class="col-xl-3 col-md-6 mb-4">
                                            <div class="form-group">
                                                <label for="cus">Customer</label>
                                                <select class="form-control form-control-user" id="cus" name="cus">
                                                   <?php
                                                        $get_cus = mysqli_query($con, "select id, name from accounts where type = 'customer' and status = 'active'");
                                                        while($cus = mysqli_fetch_array($get_cus))
                                                        {
                                                            ?>
                                                           <option value="<?php echo $cus['id']; ?>"> <?php echo $cus['name']; ?> </option>
                                                         <?php
                                                        }
                                                   ?>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-xl-3 col-md-6 mb-4">
                                            <div class="form-group">
                                                <label for="c_rate">Rate</label>
                                                <input type="number" required class="form-control form-control-user" id="c_rate" name="s_rate">
                                            </div>
                                        </div>
                                        <div class="col-xl-3 col-md-6 mb-4">
                                            <div class="form-group">
                                                <label for="s_qty">Sale Qty</label>
                                                <input type="number" required class="form-control form-control-user" id="s_qty" name="s_qty">
                                            </div>
                                        </div>
                                        <div class="col-xl-3 col-md-6 mb-4">
                                            <div class="form-group">
                                                <label for="c_amount">Sale Amount</label>
                                                <input type="number" readonly class="form-control form-control-user" id="c_amount" name="s_amount">
                                            </div>
                                        </div>
                                        <div class="col-xl-3 col-md-6 mb-4">
                                            <div class="form-group">
                                                <label for="driv">Driver</label>
                                                <select class="form-control form-control-user" id="driv" name="driv">
                                                <?php
                                                        $get_driv = mysqli_query($con, "select * from drivers");
                                                        while($driv = mysqli_fetch_array($get_driv))
                                                        {
                                                            ?>
                                                           <option value="<?php echo $driv['id']; ?>"> <?php echo $driv['name']; ?> </option>
                                                         <?php
                                                        }
                                                   ?>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-xl-3 col-md-6 mb-4">
                                            <div class="form-group">
                                                <label for="veh">Vehicle No.</label>
                                                <input type="text" required class="form-control form-control-user" id="veh" name="veh">
                                            </div>
                                        </div>
                                        <div class="col-xl-3 col-md-6 mb-4">
                                            <div class="form-group">
                                                <label for="v-char">Driver Charges</label>
                                                <input type="number" required class="form-control form-control-user" id="v_char" name="v_char">
                                            </div>
                                        </div>
                                        <div class="col-xl-3 col-md-6 mb-4">
                                            <div class="form-group">
                                            <label for="froma">Account</label>
                                            <select class="form-control form-control-user" name="afrom">
                                                <?php 
                                                    $acct = mysqli_query($con, "select * from accounts where type = 'business' and status = 'Active'");
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
                                        <div class="col-xl-12 mb-4">
                                    
                                                <h5>Route Expences</h5>
                                                <hr>
                                            
                                        </div>
                                        <div class="col-xl-2 col-md-6 mb-4">
                                            <div class="form-group">
                                                <label for="p_b">Paid By</label>
                                                <select class="form-control form-control-user" id="p_b" name="p_b">
                                                <option value="Driver">Driver</option>
                                                <option value="Owner">Owner</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-xl-3 col-md-6 mb-4">
                                            <div class="form-group">
                                                <label for="c_post">Check Post</label>
                                                <select class="form-control form-control-user" id="c_post" name="c_post">
                                                <?php
                                                        $get_post = mysqli_query($con, "select * from accounts where type='post'");
                                                        while($post = mysqli_fetch_array($get_post))
                                                        {
                                                            ?>
                                                           <option value="<?php echo $post['id']; ?>"> <?php echo $post['name']; ?> </option>
                                                         <?php
                                                        }
                                                   ?>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-xl-2 col-md-6 mb-4">
                                            <div class="form-group">
                                                <label for="p_char">Charges</label>
                                                <input type="number" class="form-control form-control-user" id="p_char" name="p_char">
                                            </div>
                                        </div>
                                        <div class="col-xl-3 col-md-6 mb-4">
                                            <div class="form-group">
                                                <label for="paid">Paid?</label>
                                                <select class="form-control form-control-user" id="paid" name="paid">
                                                <option value="1">Yes</option>
                                                <option value="2">No</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-xl-2 col-md-6 mb-4">
                                            <div class="form-group">
                                            <label for="btn"> </label>
                                                <p class="btn btn-primary form-control form-control-user" id="add">Add</p>
                                            </div>
                                        
                                        </div>
                                        <div class="table-responsive" id="show_rout_char">
                                       
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
        get_veh();
        get_rates();
        get_rout()
    });

    $("#save").click(function (){
        $all_data = $("#order-form").serialize();
        $.post("supported/save_order.php",$all_data,function (order_msg){
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

$("#driv").change(function (){
    get_veh();
});
$("#pro").change(function (){
 
    get_s_amount();
  get_c_amount();
});

function get_rout()
{
    $("#show_rout_char").load("supported/show_rout_char.php?id=<?php echo $order_no; ?>");
}
$("#add").click(function (){
    var order_id = $("#order_no").val();
    var p_b = $("#p_b option:selected").val();
    var post = $("#c_post option:selected").val();
    var p_char = $("#p_char").val();
    var paid = $("#paid option:selected").val();

    if(p_char == '')
    {
        $("#p_char").css("border-color","red");
    }
    else
    {
        $("#p_char").css("border-color","lightgray");
        $.post("supported/add_rout_char.php",{id:order_id, p_b:p_b, post:post, p_char:p_char, paid:paid}, function (rout_msg){
            if(rout_msg == 'existing')
            {
                swal({
                  title: "Existing",
                  text: "Please Change Check Post",
                  icon: "warning",
                  dangerMode: false
                  }); 
            }
            get_rout();
        });
    }
});

$("#p_b").change(function (){
    var p_b = $("#p_b option:selected").val();
    console.log(p_b);
    if(p_b == 'Driver')
    {
        $("#paid option[value=1]").attr('selected', 'selected');
        $("#paid option[value=2]").removeAttr('selected');
    }
    else
    {
        $("#paid option[value=2]").attr('selected', 'selected');
        $("#paid option[value=1]").removeAttr('selected');
    }
});

function get_rates()
{
    var pro = $("#pro option:selected").val();
    $.post("supported/get_pur_rate.php",{id:pro},function (p_rate){
        $("#s_rate").val(p_rate);
    });

    $.post("supported/get_sale_rate.php",{id:pro},function (s_rate){
        $("#c_rate").val(s_rate);
    });
}

function delet(id)
{
    $.post("supported/delete_rout_char.php",{id:id},function (){
        get_rout();
    });

}
$("#s_rate").focusout(function (){
  get_s_amount();
});
$("#c_rate").focusout(function (){
  get_c_amount();
});
$("#p_qty").focusout(function (){
  get_s_amount();
  
});

$("#s_qty").focusout(function (){

  get_c_amount();
});

function get_s_amount(){
  var qty = parseFloat($('#p_qty').val()),
      s_rate = parseFloat($('#s_rate').val());
  $("#s_amount").val(qty * s_rate);
}

function get_c_amount(){
  var qty = parseFloat($('#s_qty').val()),
      c_rate = parseFloat($('#c_rate').val());
  $("#c_amount").val(qty * c_rate);
}

$("#order-form").submit(function (){
   
    return false;
});

function get_veh()
{
    var id =  $("#driv option:selected").val();
    $.post("supported/get_veh.php",{id:id},function (res){
        $("#veh").val(res);
    });
}
</script>

</html>