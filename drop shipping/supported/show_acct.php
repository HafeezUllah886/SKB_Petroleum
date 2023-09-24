<div class="table-responsive">
                                <table id="datatable" class="table" width="100%">
                                    <thead>
                                        <tr>
                                            <th>Title</th>
                                            <th>Account No.</th>
                                            <th>Status</th>
                                            <th>Balance</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                       <?php 
                                        include("connect.php");
                                        $type = $_GET['type'];
                                        $get_acct = mysqli_query($con, "select * from accounts where type = '$type'");
                                      
                                        while($acct_data = mysqli_fetch_array($get_acct))
                                        {
                                            $acct_id = $acct_data['id'];
                                            $get2 = mysqli_query($con, "select * from trans where accn = '$acct_id'");
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
                                            $acct_name = $acct_data['name'];
                                            ?>
                                            <tr>
                                                <td><a href="acct_details.php?id=<?php echo $acct_data['id'];?>"><?php echo $acct_data['name']; ?></a></td>
                                                <td><?php echo $acct_data['acct_no']; ?></td>
                                                <td><?php echo $acct_data['status']; ?></td>
                                                <td><?php echo $c_bal; ?></td>
                                                <td><a class="btn btn-info btn-sm" href="edit_acct.php?id=<?php echo $acct_data['id']; ?>&type=<?php echo $_GET['type']; ?>">Edit</a></td>
                                            </tr>
                                            <?php
                                        }
                                       
                                       ?>
                                    </tbody>
                                </table>
                                </div>
                                <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css">
                                <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/dataTables.bootstrap4.min.css">
                                <script src="vendor/jquery/jquery.min.js"></script>
                                <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
                                <script src="https://cdn.datatables.net/1.13.6/js/dataTables.bootstrap4.min.js"></script>
   
                                <script>
                                    new DataTable('#datatable', {
                                    ordering: true,
                                    order: [[2, 'asc'], [0, 'asc']]
                                    });
                                </script>
   