<?php 
session_start();
include '../detsess.php';
include '../sess.php'
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
                    <div class="row">
                      <div class="col-lg-6">
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
                                                <th scope="col">ID</th>
                                                <th scope="col">Item</th>
                                                <th scope="col">Description</th>
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
                                                <th scope="row"><?php echo $row['elecid']; ?></th>
                                                <td><?php echo $row['name']; ?></td>
                                                <td><?php echo $row['description']; ?></td>
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
                            <div class="card spur-card">
                                <div class="card-header">
                                    <div class="spur-card-icon">
                                        <i class="fas fa-table"></i>
                                    </div>
                                    <div class="spur-card-title">Assigned Electronics Inventory</div>
                                </div>
                                <div class="card-body ">
                                    <table class="table table-hover table-in-card">
                                        <thead>
                                            <tr>
                                                <th scope="col">Item</th>
                                                <th scope="col">Department</th>
                                                <th scope="col">Quantity</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $query_invent = mysqli_query($conn,"SELECT * FROM electronics e, commissioned c WHERE e.elecid = c.elecid");
                                                if(mysqli_num_rows($query_invent)>0){
                                                    while($row = mysqli_fetch_array($query_invent)){
                                            ?>
                                            <tr>
                                                <td><?php echo $row['name']; ?></td>
                                                <td><?php echo $row['dept']; ?></td>
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
                    <div class="col-xl-6">
                        <div class="card spur-card">
                            <div class="card-header">
                                <div class="spur-card-icon">
                                    <i class="fas fa-table"></i>
                                </div>
                                <div class="spur-card-title"> Assign Inventory</div>
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
                                        <label for="exampleFormControlInput1">Quantity</label>
                                        <input type="numbers" class="form-control" id="exampleFormControlInput1" placeholder="" name="quantity" required="yes">
                                    </div>
                                    <button type="submit" class="btn btn-success" formaction="../functions/commElect.php">Assign</button>
                                </form>
                            </div>
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