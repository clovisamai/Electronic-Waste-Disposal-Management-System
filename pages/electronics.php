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
                   <div class="row">
                    <div class="col-xl-6">
                        <div class="card spur-card">
                            <div class="card-header">
                                <div class="spur-card-icon">
                                    <i class="fas fa-table"></i>
                                </div>
                                <div class="spur-card-title"> Add Electronic </div>
                            </div>
                            <div class="card-body ">
                                <form method="post">
                                    <div class="form-group">
                                        <label for="exampleFormControlInput1">Electronic name</label>
                                        <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="" name="name" required="yes">
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleFormControlTextarea1">Description</label>
                                        <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="description" required="yes"></textarea>
                                    </div>
                                    <button type="submit" class="btn btn-primary" formaction="../functions/addElect.php">Add Electronic</button>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-6">
                        <div class="card spur-card">
                            <div class="card-header">
                                <div class="spur-card-icon">
                                    <i class="fas fa-table"></i>
                                </div>
                                <div class="spur-card-title"> Delete Electronic </div>
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
                                <button type="submit" class="btn btn-danger" formaction="../functions/delElect">Delete Electronic</button>
                            </form>
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