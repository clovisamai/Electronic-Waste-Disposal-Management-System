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
                <?php include '../message.php'?> 
                <div class="col-lg-12">
                            <div class="card spur-card">
                                <div class="card-header">
                                    <div class="spur-card-icon">
                                        <i class="fas fa-table"></i>
                                    </div>
                                    <div class="spur-card-title">Reported Spoilt Electronics</div>
                                </div>
                                <div class="card-body ">
                                    <table class="table table-hover table-in-card">
                                        <thead>
                                            <tr>
                                                <th scope="col">ID</th>
                                                <th scope="col">Item</th>
                                                <th scope="col">Department</th>
                                                <th scope="col">E-Code</th>
                                                <th scope="col">Issue</th>
                                                <th scope="col">Status</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $query_invent = mysqli_query($conn,"SELECT * FROM reported r, electronics e WHERE r.elecid = e.elecid AND status = 'pending' ");
                                                if(mysqli_num_rows($query_invent)>0){
                                                    while($row = mysqli_fetch_array($query_invent)){
                                            ?>
                                            <tr>
                                                <th scope="row"><?php ?>BSU/ISS/0<?php echo $row['rid']; ?></th>
                                                <td><?php echo $row['name']; ?></td>
                                                <td><?php echo $row['dept']; ?></td>
                                                <td><?php echo $row['code']; ?></td>
                                                <td><?php echo $row['issue']; ?></td>
                                                <td><form method="post"><button name="exe" value="<?php echo $row['rid']; ?>" type="submit" class="btn btn-danger" formaction="../functions/decomm.php">Despose</button>&nbsp<button name="exe" value="<?php echo $row['rid']; ?>" type="submit" class="btn btn-success" formaction="../functions/recycle.php">Recycle</button></form></td>
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
        </main>
    </div>
</div>
<?php include '../scripts.php'?>
</body>

</html>