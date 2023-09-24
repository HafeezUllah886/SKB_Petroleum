<div class="table-responsive">
    <table id="datatable" class="table" width="100%">
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
                    <td><a style="color:skyblue;" href="edit_hr.php?id=<?php echo $sup_data['acct_id']?>&type=<?php echo $type?>">Edit</a></td>
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
    /*  ordering: true,
     order: [[2, 'asc'], [0, 'asc']] */
     });
</script>
   
   
   