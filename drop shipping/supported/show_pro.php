
<div class="table-responsive">
                                <table class="table" width="100%">
                                    <thead>
                                        <tr>
                                            <th>Name</th>
                                            <th>Purchase Rate</th>
                                            <th>Sale Rate</th>
                                            <th>Action</th>

                                        </tr>
                                    </thead>
                                    <tbody>
                                       <?php 
                                        include("connect.php");
                                        $get_pro = mysqli_query($con, "select * from pro");
                                      
                                        while($pro_data = mysqli_fetch_array($get_pro))
                                        {
                                            ?>
                                            <tr>
                                                
                                                <td><?php echo $pro_data['pro']; ?></td>
                                                <td><?php echo $pro_data['pur']; ?></td>
                                                <td><?php echo $pro_data['sale']; ?></td>

                                                <td><p style="color:skyblue;" onclick="edit(<?php echo $pro_data['id']?>)">Edit</p></td>
                                            </tr>
                                            <?php
                                        }
                                       
                                       ?>
                                    </tbody>
                                </table>
                                </div>
   
   