<?php
include("connect.php");
$acct_id = $_GET['id'];

$from = $_POST['from'];
$to = $_POST['to'];
$get1 = mysqli_query($con, "select * from ppmstock where date < '$from' and accn = '$acct_id'");
$get_unit = mysqli_fetch_array(mysqli_query($con, "select * from ppmpro where id = '$acct_id'"));
$p_bal = 0;
while($data1 = mysqli_fetch_array($get1))
{
    $p_cr = $data1['cr'];
    $p_dt = $data1['dt'];
    if($p_cr > 0)
    {
        $p_bal += $p_cr;
    }
    if($p_dt > 0)
    {
        $p_bal -= $p_dt;
    }
}

$get2 = mysqli_query($con, "select * from ppmstock where accn = '$acct_id'");
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
<div class="row">
                        <div class="col-sm-6 mb-4">
                            <div class="card border-left-primary shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                                Opening</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $p_bal . ' ' . $get_unit['unit']; ?></div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-calendar fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6 mb-4">
                            <div class="card border-left-success shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                                Closing</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $c_bal . ' ' . $get_unit['unit'];; ?></div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-calendar fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        </div>
<div class="table-responsive">
    
<table style="border:1px;min-width:600px;" class="table">
    <thead>
        <th>Date</th>
        <th width="40%">Description</th>
        <th>Credit</th>
        <th>Dabit</th>
        <th>Balance</th>
    </thead>
    <tbody>
<?php
$get = mysqli_query($con, "select * from ppmstock where date between '$from' and '$to' and accn = '$acct_id'");
$bal = $p_bal;
while($data = mysqli_fetch_array($get))
{
    $date = $data['date'];
    $rem = $data['rem'];
    $cr = $data['cr'];
    $dt = $data['dt'];
    
    ?>
    <tr>
        <td><?php echo date("d-m-Y", strtotime($date));?></td>
        <td><?php echo $rem; ?></td>
        <td><?php if($cr > 0){echo $cr; $bal += $cr; } else{ echo 0; }?></td>
        <td><?php if($dt > 0){echo $dt; $bal -= $dt;} else{ echo 0; }?></td>
        <td><?php echo $bal; ?></td>
    </tr>
    <?php
}
?>
 </tbody>
</table>
</div>