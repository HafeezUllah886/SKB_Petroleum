
<div class="table-responsive">
                                <table class="table" width="100%">
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
                                                <td><p class="btn btn-info btn-sm" onclick="edit(<?php echo $acct_data['id']?>)">Edit</p></td>
                                            </tr>
                                            <?php
                                        }
                                       
                                       ?>
                                    </tbody>
                                </table>
                                </div>
   
   