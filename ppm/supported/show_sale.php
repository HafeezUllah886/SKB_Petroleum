
<div class="table-responsive">
                                <table class="table" width="100%" style="min-width:700px;">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Product</th>
                                            <th>Customer</th>
                                            <th>Date</th>
                                            <th>rate</th>
                                            <th>qty</th>
                                            <th>amount</th>
                                            <th>X</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                       <?php 
                                        include("connect.php");
                                        $from = $_POST['from'];
                                        $to = $_POST['to'];
                                        $get_orders = mysqli_query($con, "select * from ppmsale where date between '$from' and '$to'");
                                        $total = 0;
                                        while($order_data = mysqli_fetch_array($get_orders))
                                        {
                                            $total += $order_data['amount'];
                                            $pro_id = $order_data['pro'];
                                            $get_pro = mysqli_fetch_array(mysqli_query($con, "select * from ppmpro where id = '$pro_id'"));
                                            $name = $get_pro['pro'];
                                            ?>
                                            <tr>
                                                <td><?php echo $order_data['id']; ?></td>
                                                <td><?php echo $name; ?></td>
                                                <td><?php echo $order_data['cust']; ?></td>
                                                <td><?php echo date("d-m-Y", strtotime($order_data['date'])); ?></td>
                                                <td><?php echo $order_data['rate']; ?></td>
                                                <td><?php echo $order_data['qty']; ?></td>
                                                <td><?php echo $order_data['amount']; ?></td>
                                                <td><p> <i class="fas fa-trash" title="Delete" onclick="delet1(<?php echo $order_data['tr_no']?>)" style="color:tomato;"></i></p></td>
                                            </tr>
                                            <?php
                                        }
                                       
                                       ?>
                                    </tbody>
                                    <tfoot>
                                        <th colspan="6" style="text-align:right;">Total Sale: </th>
                                        <th><?php echo number_format($total);?></th>
                                    </tfoot>
                                </table>
                                </div>
   
   