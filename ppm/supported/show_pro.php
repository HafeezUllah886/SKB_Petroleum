
<div class="table-responsive">
                                <table class="table" width="100%">
                                    <thead>
                                        <tr>
                                            <th>Name</th>
                                            <th>Stock</th>
                                            <th>Unit</th>
                                            <th>Sale Rate</th>
                                            <th>Action</th>
                                            <th>X</th>

                                        </tr>
                                    </thead>
                                    <tbody>
                                       <?php 
                                        include("connect.php");
                                        $get_pro = mysqli_query($con, "select * from ppmpro");
                                      
                                        while($pro_data = mysqli_fetch_array($get_pro))
                                        {
                                            $pro_id = $pro_data['id'];
                                            $get2 = mysqli_query($con, "select * from ppmstock where accn = '$pro_id'");
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


                                            ?>
                                            <tr>
                                                
                                            <td><a href="stock_details.php?id=<?php echo $pro_data['id'];?>"><?php echo $pro_data['pro']; ?></a></td>
                                                <td><?php echo number_format($c_bal,1); ?></td>
                                                <td><?php echo $pro_data['unit']; ?></td>
                                                <td><?php echo $pro_data['sale']; ?></td>

                                                <td><p style="color:skyblue;" onclick="edit(<?php echo $pro_data['id']?>)">Edit</p></td>
                                                <td><p> <i class="fas fa-trash" title="Delete" onclick="delet1(<?php echo $pro_data['id']; ?>)" style="color:tomato;"></i></p></td>
                                            </tr>
                                            <?php
                                        }
                                       
                                       ?>
                                    </tbody>
                                </table>
                                </div>
   
   