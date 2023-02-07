<nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">
    <!-- Sidebar Toggle (Topbar) -->
    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
        <i class="fa fa-bars"></i>
    </button>
    <!-- Topbar Search -->
    <form
        class="d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
        <div class="input-group">
            <h4 class="form-control border-0 small" aria-label="Search" aria-describedby="basic-addon2">Pump Managment</h4>
        </div>
    </form>
    <!-- Topbar Navbar -->
    <ul class="navbar-nav ml-auto">
        <!-- Nav Item - Search Dropdown (Visible Only XS) -->
        <!-- Nav Item - Alerts -->
        <!-- Nav Item - Messages -->
        <div class="topbar-divider d-none d-sm-block"></div>
        <!-- Nav Item - User Information -->
        <li class="nav-item dropdown no-arrow">
            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <span class="mr-2 d-none d-lg-inline text-gray-600 small"><?php echo $user; ?></span>
                <img class="img-profile rounded-circle"
                    src="img/undraw_profile.svg">
            </a>
            <!-- Dropdown - User Information -->
            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                aria-labelledby="userDropdown">
                
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                    Logout
                </a>
            </div>
        </li>
    </ul>
</nav>
    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <a class="btn btn-primary" href="supported/out.php">Logout</a>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="password" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Change Password</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form method="post" id="password_form">
                        <div class="form-group">
                            <label for="c_pass">Current Password</label>
                            <input type="password" required class="form-control form-control-user" placeholder="Enter old Password" name="c_pass">
                        </div>
                        <div class="form-group">
                            <label for="n_pass">New Password</label>
                            <input type="password" required class="form-control form-control-user" placeholder="Enter New Password" name="n_pass">
                        </div>
                        <div class="form-group">
                            <label for="v_pass">Re-Enter New Password</label>
                            <input type="password" required class="form-control form-control-user" placeholder="Re-enter New Password" name="v_pass">
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                <input type="submit" value="Save" class="btn btn-success form-control form-control-user" id="save_pass">
                </div>
                </form>
            </div>
        </div>
    </div>

    
    <div class="modal fade" id="s_password" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Change Settings Password</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form method="post" id="s_password_form">
                        <div class="form-group">
                            <label for="c_pass">Current Password</label>
                            <input type="password" required class="form-control form-control-user" placeholder="Enter old Password" name="c_pass">
                        </div>
                        <div class="form-group">
                            <label for="n_pass">New Password</label>
                            <input type="password" required class="form-control form-control-user" placeholder="Enter New Password" name="n_pass">
                        </div>
                        <div class="form-group">
                            <label for="v_pass">Re-Enter New Password</label>
                            <input type="password" required class="form-control form-control-user" placeholder="Re-enter New Password" name="v_pass">
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                <input type="submit" value="Save" class="btn btn-success form-control form-control-user" id="s_save_pass">
                </div>
                </form>
            </div>
        </div>
    </div>
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="js/sweetalert2/sweetalert.min.js"></script>
<script>
    $("#save_pass").click(function (){
    var data = $("#password_form").serialize();
    $.post("supported/update_pass.php",data,function(pmsg){
        if(pmsg == 'changed')
        {
            swal({
                  title: "Done!",
                  text: "Please loging again with new Password",
                  icon: "success",
                  dangerMode: true
                  }).then(function (){
                      window.open("supported/out.php","_self");
                  });
        }
        if(pmsg == 'not_m')
        {
            swal({
                  title: "Not Matched",
                  text: "Please enter the same password in New & Re-Enter Password",
                  icon: "warning",
                  dangerMode: true
                  }); 
        }
        if(pmsg == 'wrong')
        {
            swal({
                  title: "Invalid Password",
                  text: "Current Password is wrong",
                  icon: "error",
                  dangerMode: true
                  }); 
        }
    });
});

$("#s_save_pass").click(function (){
    var data = $("#s_password_form").serialize();
    $.post("supported/update_s_pass.php",data,function(smsg){
        console.log(smsg);
        if(smsg == 'changed')
        {
            swal({
                  title: "Done!",
                  text: "Please loging again with new Password",
                  icon: "success",
                  dangerMode: true
                  }).then(function (){
                     $("#s_password").modal('hide');
                  });
        }
        if(smsg == 'not_m')
        {
            swal({
                  title: "Not Matched",
                  text: "Please enter the same password in New & Re-Enter Password",
                  icon: "warning",
                  dangerMode: true
                  }); 
        }
        if(smsg == 'wrong')
        {
            swal({
                  title: "Invalid Password",
                  text: "Current Password is wrong",
                  icon: "error",
                  dangerMode: true
                  }); 
        }
    });
});
</script>