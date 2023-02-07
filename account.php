<!DOCTYPE html>
<html lang="en">
<?php
session_start();
$user = $_SESSION['user'];
if(!$user)
{
 echo "<script> window.open('index.html?msg=not_all','_self'); </script>";
}
?>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Module Selection</title>
    <!-- Custom fonts for this template-->
   
    <link
        rel="stylesheet">
    <!-- Custom styles for this template-->
    <link href="drop shipping/css/sb-admin-2.css" rel="stylesheet">

</head>
<body class="bg-gradient-primary">
    <div class="container">
        <!-- Outer Row -->
        <div class="row justify-content-center">
            <div class="col-xl-6 col-lg-6 col-md-9">
                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-0">
                        <!-- Nested Row within Card Body -->
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="p-5">
                                    <div class="text-center">
                                        <h1 class="h4 text-gray-900 mb-4">Select Module</h1>
                                    </div>
                                    <form class="user login-form" method="post">
                                        <a href="drop shipping/" class="btn btn-info btn-user btn-block" id="in-btn" style="font-size:20px;">Drop Shipping</a>
                                        <a href="ppm/" class="btn btn-primary btn-user btn-block" style="font-size:20px;" id="in-btn">Pump Management</a>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="drop shipping/vendor/jquery/jquery.min.js"></script>
    <script src="drop shipping/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="drop shipping/vendor/jquery-easing/jquery.easing.min.js"></script>
    <script src="drop shipping/js/sweetalert2/sweetalert.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="drop shipping/js/sb-admin-2.min.js"></script>
</body>
</html>