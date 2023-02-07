<table style="width:100%;" class="table">
                            <thead>
                                <th>Name</th>
                                <th style="text-align:center;">X</th>
                            </thead>
                            <tbody>
                                <?php
                                    include("connect.php");
                                    $get_cat = mysqli_query($con, "select * from cat");
                                    while($cat = mysqli_fetch_array($get_cat))
                                    {
                                        ?>
                                            <tr>
                                                <td><?php echo $cat['name']; ?></td>
                                                <td style="text-align:center;"><p> <i class="fas fa-trash" title="Delete" onclick="delet(<?php echo $cat['id']; ?>)" style="color:tomato;"></i></p></td>
                                            </tr>
                                        <?php
                                    }
                                ?>
                            </tbody>
                        </table>