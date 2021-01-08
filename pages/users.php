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
                                    <div class="spur-card-title">All Users</div>
                                </div>
                                <div class="card-body ">
                                    <table class="table table-hover table-in-card">
                                        <thead>
                                            <tr>
                                                <th scope="col">Username</th>
                                                <th scope="col">First name</th>
                                                <th scope="col">Last name</th>
                                                <th scope="col">contact</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $query_users = mysqli_query($conn,"SELECT * FROM users");
                                                if(mysqli_num_rows($query_users)>0){
                                                    while($row = mysqli_fetch_array($query_users)){
                                            ?>
                                            <tr>
                                                <th scope="row"><?php echo $row['username']; ?></th>
                                                <td><?php echo $row['fname']; ?></td>
                                                <td><?php echo $row['lname']; ?></td>
                                                <td><?php echo $row['contact']; ?></td>
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
                                    <div class="spur-card-title"> Delete User </div>
                                </div>
                                <div class="card-body ">
                                    <form method="post" class="form-inline">
                                        <div class="form-group mx-sm-3 mb-2">
                                            <select class="form-control" id="exampleFormControlSelect1" name="username" required="yes">
                                            <?php
                                            $query_users = mysqli_query($conn,"SELECT * FROM users");
                                            if(mysqli_num_rows($query_users)>0){
                                                while($row = mysqli_fetch_array($query_users)){
                                                    ?>
                                                    <option value="<?php echo $row['username']?>"><?php echo $row['username'];?></option>
                                                    <?php
                                                }
                                            }
                                            ?>
                                        </select>
                                        </div>
                                        <button type="submit" class="btn btn-danger mb-2" formaction="../functions/userDel.php">Delete User</button>
                                    </form>
                                </div>
                            </div>
                            <div class="card spur-card">
                                <div class="card-header">
                                    <div class="spur-card-icon">
                                        <i class="fas fa-table"></i>
                                    </div>
                                    <div class="spur-card-title"> Create User </div>
                                </div>
                                <div class="card-body ">
                                    <form method="post">
                                        <div class="form-group row">
                                            <label for="inputEmail4" class="col-sm-3 col-form-label">First name</label>
                                            <div class="col-sm-9">
                                                <input class="form-control" id="inputEmail4" type="text" placeholder="First name" required="yes" name="fname">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="inputPassword4" class="col-sm-3 col-form-label">Last name</label>
                                            <div class="col-sm-9">
                                                <input class="form-control" id="inputPassword4" type="text" placeholder="Last name" required="yes" name="lname">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="inputEmail4" class="col-sm-3 col-form-label">Email</label>
                                            <div class="col-sm-9">
                                                <input class="form-control" id="inputEmail4" type="email" placeholder="Email" required="yes" name="email">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="inputPassword4" class="col-sm-3 col-form-label">Contact</label>
                                            <div class="col-sm-9">
                                                <input class="form-control" id="inputPassword4" type="text" placeholder="Contact" required="yes" name="contact">
                                            </div>
                                        </div>
                                        <hr>
                                        <div class="form-group row">
                                            <label for="exampleFormControlSelect1" class="col-sm-3 col-form-label">Role</label>
                                            <div class="col-sm-9">
                                                <select class="form-control" id="exampleFormControlSelect1" name="role" required="yes">
                                                    <option value="0">Department Employees</option>
                                                    <option value="2">E-waste Management Officer</option>
                                                    <option value="1">System Admin</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="inputEmail3" class="col-sm-3 col-form-label">Username</label>
                                            <div class="col-sm-9">
                                                <input type="text" class="form-control" id="inputEmail3" placeholder="Username" name="username" required="yes">
                                            </div>
                                        </div>
                                        <hr>
                                        <div class="form-group row">
                                            <div class="col-sm-10">
                                                <button type="submit" class="btn btn-success" formaction="../functions/userCreate.php">Create Account</button>
                                            </div>
                                        </div>
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