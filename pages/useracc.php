<?php 
session_start();
include '../detsess.php';
include ('../sess.php');
?>
<!doctype html>
<html lang="en">
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
                        <div class="col-xl-12">
                            <div class="card spur-card">
                                <div class="card-header">
                                    <div class="spur-card-icon">
                                        <i class="fas fa-table"></i>
                                    </div>
                                    <div class="spur-card-title"> User Account Settings </div>
                                </div>
                                <div class="card-body ">
                                    <form method="post">
                                        <div class="form-row">
                                            <div class="form-group col-md-6">
                                                <label for="inputEmail4" class="col-form-label">First name</label>
                                                <input class="form-control" id="inputEmail4" type="text" placeholder="First name" required="yes" name="fname">
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label for="inputPassword4" class="col-form-label">Last name</label>
                                                <input class="form-control" id="inputPassword4" type="text" placeholder="Last name" required="yes" name="lname">
                                            </div>
                                        </div>
                                        <div class="form-row">
                                            <div class="form-group col-md-8">
                                                <label for="inputEmail4" class="col-form-label">Email</label>
                                                <input class="form-control" id="inputEmail4" type="email" placeholder="Email" required="yes" name="email">
                                            </div>
                                            <div class="form-group col-md-4">
                                                <label for="inputPassword4" class="col-form-label">Contact</label>
                                                <input class="form-control" id="inputPassword4" type="text" placeholder="Contact" required="yes" name="contact">
                                            </div>
                                        </div>
                                        <hr>
                                        <div class="form-group row">
                                            <label for="inputEmail3" class="col-sm-2 col-form-label">Username</label>
                                            <div class="col-sm-10">
                                                <input type="text" class="form-control" id="inputEmail3" placeholder="Username" name="username" required="yes">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="inputPassword3" class="col-sm-2 col-form-label">Password</label>
                                            <div class="col-sm-10">
                                                <input type="password" class="form-control" id="inputPassword3" placeholder="Password" name="password" required="yes">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="inputPassword3" class="col-sm-2 col-form-label">Confirm Password</label>
                                            <div class="col-sm-10">
                                                <input type="password" class="form-control" id="inputPassword3" placeholder="Confirm Password" name="conpassword" required="yes">
                                            </div>
                                        </div>
                                        <hr>
                                        <div class="form-group row">
                                            <div class="col-sm-10">
                                                <button type="submit" class="btn btn-primary" formaction="../functions/userUpt.php">Update Account</button>
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
    <?php include '../scripts.php'?></body>

</html>