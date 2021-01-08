<?php 
session_start();
include '../detsess.php';
include '../sess.php';
?>
<!doctype html>
<html lang="en">
<?php include '../functions/database-config.php'?>
<?php include '../header.php'?>
<body>
    <div class="dash">
        <div class="dash-nav dash-nav-dark">
            <?php include '../top.php'?>
            <?php include '../sidenav.php'?>
        </div>
        <div class="dash-app">
            <?php include '../topnav.php'?>
            <main class="dash-content">
                <div class="container-fluid">
                    <?php
                    if ($ROLE == 1) {
                        ?>
                        <div class="row dash-row">       
                            <div class="col-xl-6">
                                <div class="stats stats-success">
                                    <h3 class="stats-title"> Users </h3>
                                    <div class="stats-content">
                                        <div class="stats-icon">
                                            <i class="fas fa-users"></i>
                                        </div>
                                        <div class="stats-data">
                                            <?php
                                            $result = mysqli_query($conn,"SELECT * FROM users");
                                            $countUsers = mysqli_num_rows($result);
                                            ?>
                                            <div class="stats-number"><?php echo $countUsers; ?></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-6">
                                <div class="stats stats-info">
                                    <h3 class="stats-title">Electronics Inventory</h3>
                                    <div class="stats-content">
                                        <div class="stats-icon">
                                            <i class="fas fa-truck-loading"></i>
                                        </div>
                                        <div class="stats-data">
                                            <?php
                                            $result = mysqli_query($conn,"SELECT SUM(qty_in) AS value_sum FROM inventory");
                                            $row = mysqli_fetch_assoc($result);
                                            $qty = $row['value_sum'];
                                            ?>
                                            <div class="stats-number"><?php echo $qty; ?></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                           <div class="col-lg-8">
                            <div class="card spur-card">
                                <div class="card-header">
                                    <div class="spur-card-icon">
                                        <i class="fas fa-table"></i>
                                    </div>
                                    <div class="spur-card-title">User Types Summary</div>
                                </div>
                                <div class="card-body ">
                                    <table class="table table-hover table-in-card">
                                        <thead>
                                            <tr>
                                                <th scope="col">System Administrators</th>
                                                <th scope="col">E-waste Management Officers</th>
                                                <th scope="col">Department Employees</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $qry = mysqli_query($conn,"SELECT * FROM users WHERE AccType = 0");
                                            $emp = mysqli_num_rows($qry);

                                            $qry1 = mysqli_query($conn,"SELECT * FROM users WHERE AccType = 1");
                                            $admin = mysqli_num_rows($qry1);

                                            $qry3 = mysqli_query($conn,"SELECT * FROM users WHERE AccType = 2");
                                            $ewmo = mysqli_num_rows($qry3);
                                            ?>
                                            <tr>
                                                <td><?php echo $admin;?></td>
                                                <td><?php echo $ewmo;?></td>
                                                <td><?php echo $emp;?></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <div class="card spur-card">
                                <div class="card-header">
                                    <div class="spur-card-icon">
                                        <i class="fas fa-table"></i>
                                    </div>
                                    <div class="spur-card-title">Electronics Types</div>
                                </div>
                                <div class="card-body ">
                                    <table class="table table-hover table-in-card">
                                        <tbody>
                                            <?php
                                            $query_invent = mysqli_query($conn,"SELECT * FROM electronics");
                                                if(mysqli_num_rows($query_invent)>0){
                                                    while($row = mysqli_fetch_array($query_invent)){
                                            ?>
                                            <tr>
                                                <td><?php echo $row['name']; ?></td>
                                            </tr>
                                            <?php
                                                    }
                                                }
                                            ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            </div>
                            <div class="col-lg-4">
                            <div class="card spur-card">
                                <div class="card-header">
                                    <div class="spur-card-icon">
                                        <i class="fas fa-table"></i>
                                    </div>
                                    <div class="spur-card-title">Electronics Inventory</div>
                                </div>
                                <div class="card-body ">
                                    <table class="table table-hover table-in-card">
                                        <thead>
                                            <tr>
                                                <th scope="col">Item</th>
                                                <th scope="col">Quantity</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $query_invent = mysqli_query($conn,"SELECT * FROM electronics e, inventory i WHERE e.elecid = i.elecid");
                                                if(mysqli_num_rows($query_invent)>0){
                                                    while($row = mysqli_fetch_array($query_invent)){
                                            ?>
                                            <tr>
                                                <td><?php echo $row['name']; ?></td>
                                                <td><?php echo $row['qty_in']; ?></td>
                                            </tr>
                                            <?php
                                                    }
                                                }
                                            ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <?php
                    }
                    //second user
                    if ($ROLE == 2) {
                        ?>
                        <div class="row dash-row">       
                            <div class="col-xl-3">
                                <div class="stats stats-info">
                                    <h3 class="stats-title">Electronics Inventory</h3>
                                    <div class="stats-content">
                                        <div class="stats-icon">
                                            <i class="fas fa-truck-loading"></i>
                                        </div>
                                        <div class="stats-data">
                                            <?php
                                            $result = mysqli_query($conn,"SELECT SUM(qty_in) AS value_sum FROM inventory");
                                            $row = mysqli_fetch_assoc($result);
                                            $qty = $row['value_sum'];
                                            ?>
                                            <div class="stats-number"><?php echo $qty; ?></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3">
                                <div class="stats stats-success">
                                    <h3 class="stats-title">Electronics given to Departments</h3>
                                    <div class="stats-content">
                                        <div class="stats-icon">
                                            <i class="fas fa-thumbs-up"></i>
                                        </div>
                                        <div class="stats-data">
                                            <?php
                                            $result = mysqli_query($conn,"SELECT SUM(qty) AS value_sum FROM commissioned");
                                            $row = mysqli_fetch_assoc($result);
                                            $qty = $row['value_sum'];
                                            ?>
                                            <div class="stats-number"><?php echo $qty; ?></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3">
                                <div class="stats stats-danger">
                                    <h3 class="stats-title"> E-Waste </h3>
                                    <div class="stats-content">
                                        <div class="stats-icon">
                                            <i class="fas fa-thumbs-down"></i>
                                        </div>
                                        <div class="stats-data">
                                            <?php
                                            $result = mysqli_query($conn,"SELECT * FROM reported WHERE status = 'disposed'");
                                            $dec = mysqli_num_rows($result);
                                            ?>
                                            <div class="stats-number"><?php echo $dec; ?></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3">
                                <div class="stats stats">
                                    <h3 class="stats-title"> Recycled </h3>
                                    <div class="stats-content">
                                        <div class="stats-icon">
                                            <i class="fas fa-recycle"></i>
                                        </div>
                                        <div class="stats-data">
                                            <?php
                                            $result = mysqli_query($conn,"SELECT * FROM reported WHERE status = 'recycled'");
                                            $dec = mysqli_num_rows($result);
                                            ?>
                                            <div class="stats-number"><?php echo $dec; ?></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-8">
                                <div class="row">
                                    <!--div class="col-lg-6">
                                        <div class="card spur-card">
                                            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                                <h6 class="m-0 font-weight-bold">Chart showing E-waste</h6>
                                            </div>
                                            <div class="card-body">
                                                <div class="chart-area">
                                                    <canvas id="input-chart"></canvas>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="card spur-card">
                                            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                                <h6 class="m-0 font-weight-bold">Chart showing Recycled</h6>
                                            </div>
                                            <div class="card-body">
                                                <div class="chart-area">
                                                    <canvas id="input-chart"></canvas>
                                                </div>
                                            </div>
                                        </div>
                                    </div-->
                                </div>
                                <div class="row">
                                    <div class="col-lg-6">
                                    <div class="card spur-card">
                                <div class="card-header">
                                    <div class="spur-card-icon">
                                        <i class="fas fa-table"></i>
                                    </div>
                                    <div class="spur-card-title">E-Waste</div>
                                </div>
                                <div class="card-body ">
                                    <table class="table table-hover table-in-card">
                                        <thead>
                                            <tr>
                                                <th scope="col">Item</th>
                                                <th scope="col">Quantity</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $query_invent = mysqli_query($conn,"SELECT * FROM electronics e, decomm d WHERE e.elecid = d.elecid");
                                                if(mysqli_num_rows($query_invent)>0){
                                                    while($row = mysqli_fetch_array($query_invent)){
                                            ?>
                                            <tr>
                                                <td><?php echo $row['name']; ?></td>
                                                <td><?php echo $row['qty']; ?></td>
                                            </tr>
                                            <?php
                                                    }
                                                }
                                            ?>
                                        </tbody>
                                    </table>
                                </div>
                                    </div>
                                    </div>
                                    <div class="col-lg-6">
                                    <div class="card spur-card">
                                        <div class="card-header">
                                            <div class="spur-card-icon">
                                                <i class="fas fa-table"></i>
                                            </div>
                                            <div class="spur-card-title">Recycled</div>
                                        </div>
                                        <div class="card-body ">
                                            <table class="table table-hover table-in-card">
                                                <thead>
                                                    <tr>
                                                        <th scope="col">Item</th>
                                                        <th scope="col">Quantity</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php
                                                    $query_invent = mysqli_query($conn,"SELECT * FROM electronics e, recycled r WHERE e.elecid = r.elecid");
                                                        if(mysqli_num_rows($query_invent)>0){
                                                            while($row = mysqli_fetch_array($query_invent)){
                                                        ?>
                                                        <tr>
                                                            <td><?php echo $row['name']; ?></td>
                                                            <td><?php echo $row['qty']; ?></td>
                                                        </tr>
                                                    <?php
                                                            }
                                                        }
                                                    ?>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                    </div> 
                                </div>
                            </div>
                            <div class="col-lg-4">
                            <div class="card spur-card">
                                <div class="card-header">
                                    <div class="spur-card-icon">
                                        <i class="fas fa-table"></i>
                                    </div>
                                    <div class="spur-card-title">Reported E-Waste Issue Summary</div>
                                </div>
                                <div class="card-body ">
                                    <table class="table table-hover table-in-card">
                                        <thead>
                                            <tr>
                                                <th scope="col">Issue</th>
                                                <th scope="col">No of times reported</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $qry = mysqli_query($conn,"SELECT * FROM reported WHERE issue = 'Faulty'");
                                            $fault = mysqli_num_rows($qry);

                                            $qry1 = mysqli_query($conn,"SELECT * FROM reported WHERE issue = 'Cracked'");
                                            $crack = mysqli_num_rows($qry1);

                                            $qry3 = mysqli_query($conn,"SELECT * FROM reported WHERE issue = 'Not Working'");
                                            $not = mysqli_num_rows($qry3);
                                            
                                            $qry4 = mysqli_query($conn,"SELECT * FROM reported WHERE issue = 'Too Old'");
                                            $old = mysqli_num_rows($qry4);

                                            ?>
                                            <tr>
                                                <td>Faulty</td>
                                                <td><?php echo $fault;?></td>
                                            </tr>
                                            <tr>
                                                <td>Cracked</td>
                                                <td><?php echo $crack;?></td>
                                            </tr>
                                            <tr>
                                                <td>Not Working</td>
                                                <td><?php echo $not;?></td>
                                            </tr>
                                            <tr>
                                                <td>Too old</td>
                                                <td><?php echo $old;?></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <div class="card spur-card">
                                <div class="card-header">
                                    <div class="spur-card-icon">
                                        <i class="fas fa-table"></i>
                                    </div>
                                    <div class="spur-card-title">Electronics Inventory</div>
                                </div>
                                <div class="card-body ">
                                    <table class="table table-hover table-in-card">
                                        <thead>
                                            <tr>
                                                <th scope="col">Item</th>
                                                <th scope="col">Quantity</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $query_invent = mysqli_query($conn,"SELECT * FROM electronics e, inventory i WHERE e.elecid = i.elecid");
                                                if(mysqli_num_rows($query_invent)>0){
                                                    while($row = mysqli_fetch_array($query_invent)){
                                            ?>
                                            <tr>
                                                <td><?php echo $row['name']; ?></td>
                                                <td><?php echo $row['qty_in']; ?></td>
                                            </tr>
                                            <?php
                                                    }
                                                }
                                            ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                    </div>
                        </div>
                        <?php
                    }
                    //other user
                    if ($ROLE == 0) {
                        ?>
                        <?php include '../message.php'?> 
                        <div class="row">
                            <div class="col-xl-9">
                        <div class="card spur-card">
                            <div class="card-header">
                                <div class="spur-card-icon">
                                    <i class="fas fa-table"></i>
                                </div>
                                <div class="spur-card-title">Report E-Waste</div>
                            </div>
                            <div class="card-body ">
                                <form method="post">
                                    <div class="form-group">
                                        <label for="exampleFormControlSelect1">Select Electronic</label>
                                        <select class="form-control" id="exampleFormControlSelect1" name="selectElec" required="yes">
                                            <?php
                                            $query_electronics = mysqli_query($conn,"SELECT * FROM electronics");
                                            if(mysqli_num_rows($query_electronics)>0){
                                                while($row = mysqli_fetch_array($query_electronics)){
                                                    ?>
                                                    <option value="<?php echo $row['elecid']?>"><?php echo $row['name'];?></option>
                                                    <?php
                                                }
                                            }
                                            ?>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleFormControlSelect1">Select Department</label>
                                        <select class="form-control" id="exampleFormControlSelect1" name="selectDept" required="yes">
                                            <option value="Admin">Admin</option>
                                            <option value="Accounts">Accounts</option>
                                            <option value="Academic Registrar">Academic Registrar</option>
                                            <option value="Computing Faculty">Computing Faculty</option>
                                            <option value="Business Faculty">Business Faculty</option>
                                            <option value="Law Faculty">Law Faculty</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleFormControlInput1">Enter Electronic Department Code</label>
                                        <input type="numbers" class="form-control" id="exampleFormControlInput1" placeholder="" name="serial" required="yes">
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleFormControlSelect1">Select Issue</label>
                                        <select class="form-control" id="exampleFormControlSelect1" name="selectIssue" required="yes">
                                            <option value="Faulty">Faulty</option>
                                            <option value="Cracked">Cracked</option>
                                            <option value="Not Working">Not Working</option>
                                            <option value="Too Old">Too Old</option>
                                        </select>
                                    </div>
                                    
                                    <button type="submit" class="btn btn-success" formaction="../functions/issue.php">Submit Issue</button>
                                </form>
                            </div>
                        </div>
                    </div>
                            <div class="col-lg-3">
                                <div class="card spur-card">
                                    <div class="card-header">
                                        <div class="spur-card-icon">
                                            <i class="fas fa-table"></i>
                                        </div>
                                        <div class="spur-card-title">Reported</div>
                                    </div>
                                    <div class="card-body ">
                                        <table class="table table-hover table-in-card">
                                            <thead>
                                                <tr>
                                                    <th scope="col">Id</th>
                                                    <th scope="col">Status</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                $query_invent = mysqli_query($conn,"SELECT * FROM reported WHERE userid = '$ID' ORDER BY `rid` DESC LIMIT 10 ");
                                                if(mysqli_num_rows($query_invent)>0){
                                                    while($row = mysqli_fetch_array($query_invent)){
                                                        ?>
                                                        <tr>
                                                            <th scope="row"><?php ?>BSU/ISS/0<?php echo $row['rid']; ?></th>
                                                            <td><?php echo $row['status']; ?></td>
                                                        </tr>
                                                        <?php
                                                    }
                                                }
                                                ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php
                    }
                    ?>                  
                </div>
            </main>
        </div>
    </div>
    <?php include '../scripts.php'?>
</body>

</html>