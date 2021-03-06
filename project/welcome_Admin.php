<!--
/**
 * Created by Hassan Abdella.
 * Date: 02/10/2019
 */-->
 
<?php
session_start();
require 'config.php';
if (isset($_SESSION['loginEmail'])) {
    $alt = $_SESSION['file_name'].'.'.$_SESSION['file_ext'];
} else {
    header('location:error.php');
}
include 'header.php';
?><br>
    <!-- Slider -->
<div class="container">
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-1"></div>
            <div class="col-sm-10">
                <img src="img/71.jpg" height="300px" width="100%">
            </div>
            <div class="col-sm-1"></div>
        </div>
    </div>
</div><br>
        <!-- My Account -->
<div class="container">
    <div class="container-fluid">
        <div class="row">
            <form method="post">
                <div class="col-sm-3">
                    <div class="input-group">
                        <span class="glyphicon glyphicon-user"></span>
                        <label>My Account </label>
                    </div>
                    <hr size="80%" noshade>
                    <div class="form-inline form-group input-group ">
                        <input type="search" class="form-control" name="searchText" placeholder="Search User or Doctor">
                        <div class="input-group-addon">
                            <button type="submit" name="searchUser" style="background-color:transparent; border: transparent" class="glyphicon glyphicon-search"></button>
                        </div>
                    </div>


    <!-- Reservation -->
                    <hr size="80%">
                    <div class="input-group">
                        <span class="glyphicon glyphicon-file"></span>
                        <label class="active" for="Reserve"><a href="appointments.php">Appointments</a> </label>
                    </div>


                    <hr size="80%">
                    <div class="input-group">
                        <span class="glyphicon glyphicon-eye-open"></span>
                        <label><a href="viewuser.php">View all Users</a> </label>
                    </div>
                    <hr size="80%">
                    <div class="input-group">
                        <span class="glyphicon glyphicon-eye-open"></span>
                        <label><a href="viewdoctor_admin.php">View all Doctors</a> </label>
                    </div>
                    <hr size="80%">
                    <div class="input-group">
                        <span class="glyphicon glyphicon-plus"></span>
                        <label><a href="Add_doctor.php">Add Doctor</a> </label>
                    </div>                    
                    <hr size="80%">
                    <div class="input-group">
                        <span class="glyphicon glyphicon-plus"></span>
                        <label><a href="Add_date.php">Add Available Date</a> </label>
                    </div>
                    <hr size="80%">
                    <div class="input-group">
                        <span class="glyphicon glyphicon-log-out"></span>
                        <label><a href="logout.php">Logout</a> </label>
                    </div>

                    <hr size="80%">
                </div>
                    <!-- Profile pic -->
                <div class="col-sm-5">
                    <div class="col-sm-12 img-circle" align="middle">
                        <?php echo "<img src='img/admins/".$alt."' class='img-circle' height='250px' width='250px'
                             alt='Profile pic'>"; ?>
                    </div>
                </div>
                    <!----- Info ---->
                <div class="col-sm-4">
                    <div class="input-group">
                        <span class="glyphicon glyphicon-user"></span>
                        <label><?php echo "Hello Admin: <b><font color='green'>" . $_SESSION['fName'] . " " . $_SESSION['lName'] . "</font> </b>" ?></label>
                    </div>
                    <hr size="80%" noshade>
                    <div class="input-group">
                        <span class="glyphicon glyphicon-envelope"></span>
                        <label><?php echo "Email: <b><font color='green'>" . $_SESSION['loginEmail'] . "</font></b>" ?></label>
                    </div>
                    <hr size="80%">
                    <div class="input-group">
                        <span class="glyphicon glyphicon-user"></span>
                        <label><?php echo "Gender: <b><font color='green'>" . $_SESSION['gender'] . "</font></b>" ?></label>
                    </div>
                    <hr size="80%">
                    <div class="input-group">
                        <span class="glyphicon glyphicon-earphone"></span>
                        <label><?php echo "Mobile: <b><font color='green'>" . $_SESSION['mobile'] . "</font></b>" ?></label>
                    </div>
                    <hr size="80%">
                    <div class="input-group">
                        <span class="glyphicon glyphicon-home"></span>
                        <label><?php echo "Address: <b><font color='green'>" . $_SESSION['address'] . "</font></b>" ?></label>
                    </div>
                    <hr size="80%">
                    <div class="input-group">
                        <span class="glyphicon glyphicon-time"></span>
                        <label><?php echo "Birth date: <b><font color='green'>" . $_SESSION['bdate'] . "</font></b>" ?></label>
                    </div>
                    <hr size="80%">
                </div>
            </form>
        </div>
    </div>
</div>
<?php 
include 'searchUser.php'; 
include 'searchDoctor.php';
?>
