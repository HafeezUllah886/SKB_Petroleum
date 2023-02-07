
<div class="table-responsive">
                                <table class="table" width="100%" style="min-width:700px;">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Product</th>
                                            <th>Date</th>
                                            <th>Customer</th>
                                            <th>Driver</th>
                                            <th>Veh</th>
                                            <th>Profit</th>

                                        </tr>
                                    </thead>
                                    <tbody>
                                       <?php 
                                        include("connect.php");
                                        $from = $_POST['from'];
                                        $to = $_POST['to'];
                                        $get_orders = mysqli_query($con, "select * from orders where date between '$from' and '$to'");
                                        $totalProf = 0;
                                        while($order_data = mysqli_fetch_array($get_orders))
                                        {
                                            $totalProf += $order_data['profit'];
                                            ?>
                                            <tr>
                                                <td><?php echo $order_data['id']; ?></td>
                                                <td><a href="order_details.php?id=<?php echo $order_data['id']; ?>"> <?php echo $order_data['product']; ?></a></td>
                                                <td><?php echo date("d-m-Y", strtotime($order_data['date'])); ?></td>
                                                <td><?php echo $order_data['cus']; ?></td>
                                                <td><?php echo $order_data['driver']; ?></td>
                                                <td><?php echo $order_data['veh_no']; ?></td>
                                                <td <?php if($order_data['profit'] > 0) {echo "class='text-success'"; } ?> class="text-danger"><?php echo number_format($order_data['profit']); ?></td>
                                            </tr>
                                            <?php
                                        }
                                       
                                       ?>
                                    </tbody>
                                    <tfoot>
                                        <th colspan="6" style="text-align:right;">Total Profit: </th>
                                        <th <?php if($totalProf > 0) {echo "class='text-success'"; } ?> class="text-danger"><?php echo number_format($totalProf);?></th>
                                    </tfoot>
                                </table>
                                </div>
   
   