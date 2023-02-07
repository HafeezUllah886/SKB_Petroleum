<?php
include("connect.php");
$r_id = $_GET['id'];
$get = mysqli_query($con, "select * from route_char where order_id = '$r_id'");
?>

<table class="table" width="100%">
                                            <thead>
                                                <th>Check Post</th>
                                                <th>Amount</th>
                                                <th>Paid By</th>
                                                <th>Is Paid</th>
                                                <th>X</th>
                                            </thead>
                                            <tbody>
                                                <?php 
                                                $total = 0;
                                                while($rout = mysqli_fetch_array($get))
                                                {
                                                    $post_id = $rout['acct_id'];
                                                    $p_amount = $rout['amount'];
                                                    $total += $p_amount;
                                                    $get_post_name = mysqli_query($con, "select * from posts where acct_id = '$post_id'");
                                                    $get_post = mysqli_fetch_array($get_post_name);
                                                    $post = $get_post['name'];

                                                    ?>
                                                        <tr>
                                                            <td><?php echo $post;?></td>
                                                            <td><?php echo $rout['amount'];?></td>
                                                            <td><?php echo $rout['paid_by'];?></td>
                                                            <td><?php if($rout['is_paid'] == 1) {echo "Yes"; } else{ echo "No"; }?></td>
                                                            <td><p> <i class="fas fa-trash" title="Delete" onclick="delet(<?php echo $rout['id']?>)" style="color:tomato;"></i></p></td>
                                                        </tr>
                                                    <?php
                                                }
                                                
                                                ?>
                                                
                                                
                                                
                                            </tbody>
                                            <tfoot>
                                                <th>Total</th>
                                                <th><?php echo $total; ?></th>
                                            </tfoot>
                                        </table>