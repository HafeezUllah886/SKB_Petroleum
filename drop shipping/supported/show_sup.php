
<div class="table-responsive">
                                <table class="table" width="100%">
                                    <thead>
                                        <tr>
                                            <th>Name</th>
                                            <th>Contact No.</th>
                                            <th>Account No.</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                       <?php 
                                        include("connect.php");
                                        $type = $_GET['type'];
                                        $get_sup = mysqli_query($con, "select * from $type");
                                      
                                        while($sup_data = mysqli_fetch_array($get_sup))
                                        {
                                            ?>
                                            <tr>
                                                
                                                <td><a href="acct_details.php?id=<?php echo $sup_data['acct_id'];?>"><?php echo $sup_data['name']; ?></a></td>
                                                <td><?php echo $sup_data['cont']; ?></td>
                                                <td><?php echo $sup_data['acct_no']; ?></td>
                                                <td><p style="color:skyblue;" onclick="edit(<?php echo $sup_data['acct_id']?>)">Edit</p></td>
                                            </tr>
                                            <?php
                                        }
                                       
                                       ?>
                                    </tbody>
                                </table>
                                </div>
   
   