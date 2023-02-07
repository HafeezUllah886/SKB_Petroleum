
<div class="table-responsive">
                                <table class="table" width="100%">
                                    <thead>
                                        <tr>
                                            <th>Name</th>
                                            <th>Contact No.</th>
                                            <th>Vehicle</th>
                                            <th>Paid</th>
                                            <th>Action</th>

                                        </tr>
                                    </thead>
                                    <tbody>
                                       <?php 
                                        include("connect.php");
                                        $get_driv = mysqli_query($con, "select * from drivers");
                                      
                                        while($driv_data = mysqli_fetch_array($get_driv))
                                        {
                                            $d_id = $driv_data['id'];
                                            $pay = 0;
                                            $get_amount = mysqli_query($con, "select * from drive_pay where d_id = '$d_id'");
                                            while($d_pay = mysqli_fetch_array($get_amount))
                                            {
                                                $pay += $d_pay['amount'];
                                            }
                                            ?>
                                            <tr>
                                                
                                                <td><?php echo $driv_data['name']; ?></td>
                                                <td><?php echo $driv_data['cont']; ?></td>
                                                <td><?php echo $driv_data['veh']; ?></td>
                                                <td><?php echo $pay; ?></td>

                                                <td><p style="color:skyblue;" onclick="edit(<?php echo $driv_data['id']?>)">Edit</p></td>
                                            </tr>
                                            <?php
                                        }
                                       
                                       ?>
                                    </tbody>
                                </table>
                                </div>
   
   