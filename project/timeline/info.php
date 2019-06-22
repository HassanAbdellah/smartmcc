<!--
/**
 * Created by Hassan Abdella.
 * Date: 02/05/2019
 */-->
 

<!DOCTYPE html>

<?php
session_start();
require '../config.php';

if ($_SESSION['gender']==0) {
    $gen = "Male";
} elseif ($_SESSION['gender']==1) { 
    $gen = "Female";
}

if (isset($_SESSION['loginEmail'])) {
    $alt = $_SESSION['file_name'].'.'.$_SESSION['file_ext'];
} else {
    header('location:../error.php');
}
include '../header.php';
?>


<html>

<head>
    <title>Welcome</title>

    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
    <script src="//netdna.bootstrapcdn.com/bootstrap/3.1.1/js/bootstrap.min.js"></script>
    <link rel="stylesheet" type="text/css" href="//netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap.min.css">


</head>




<body>
 <br /><br />

 <div class="container">

                    <!----- Info ---->
                <div class="col-sm-4">
                    <div class="input-group">
                        <span class="glyphicon glyphicon-user"></span>
                        <label><?php echo "Hello: <b><font color='green'>" . $_SESSION['fName'] . " " . $_SESSION['lName'] . "</font> </b>" ?></label>
                        <a  href="edit/editName.php"><span class="glyphicon glyphicon-edit"></span></a>

                    </div>
                    <hr size="80%" noshade>
                    <div class="input-group">
                        <span class="glyphicon glyphicon-envelope"></span>
                        <label><?php echo "Email: <b><font color='green'>" . $_SESSION['loginEmail'] . "</font></b>" ?></label>


                    </div>
                    <hr size="80%">
                    <div class="input-group">
                        <span class="glyphicon glyphicon-user"></span>
                        <label><?php echo "Gender: <b><font color='green'>" . $gen . "</font></b>" ?></label>
                        <a  href="edit/editGender.php"><span class="glyphicon glyphicon-edit"></span></a>

                    </div>
                    <hr size="80%">
                    <div class="input-group">
                        <span class="glyphicon glyphicon-earphone"></span>
                        <label><?php echo "Mobile: <b><font color='green'>" . $_SESSION['mobile'] . "</font></b>" ?></label>
                        <a  href="edit/editMobile.php"><span class="glyphicon glyphicon-edit"></span></a>
                    </div>
                    <hr size="80%">
                    <div class="input-group">
                        <span class="glyphicon glyphicon-home"></span>
                        <label><?php echo "Address: <b><font color='green'>" . $_SESSION['address'] . "</font></b>" ?></label>
                        <a  href="edit/editAddress.php"><span class="glyphicon glyphicon-edit"></span></a>
                    </div>
                    <hr size="80%">
                    <div class="input-group">
                        <span class="glyphicon glyphicon-time"></span>
                        <label><?php echo "Birth date: <b><font color='green'>" . $_SESSION['bdate'] . "</font></b>" ?></label>
                        <a  href="edit/editBD.php"><span class="glyphicon glyphicon-edit"></span></a>
                    </div>
                    <hr size="80%">
                    <div class="input-group">
                        <span class="glyphicon glyphicon-calendar"></span>
                        <label><?php echo "Reg. Date: <b><font color='green'>" . $_SESSION['reg_date'] . "</font></b>" ?></label>
                    </div>
                    <!--<hr size="80%">
                    <div class="input-group">
                        <span class="glyphicon glyphicon-time"></span>
                        <label><?php echo "Last update: <b><font color='green'>" . $_SESSION['upd_date'] . "</font></b>" ?></label>
                    </div>-->
                    <hr size="80%">
                </div>
                <!-- Profile pic -->
                <div class="col-sm-5">
                    <div class="col-sm-12 img-circle" align="middle">
                        <a  href="edit/editPic.php"><img src="../img/uploads/<?php echo $alt ?>" class="img-circle" height="250px" width="250px"
                             alt="Profile pic">
                             <span class="glyphicon glyphicon-edit"></span></a>

                    </div>

                </div>
</div>
<div class="container">
    <div class="row">
        <center><div class="col-sm-12">
            <span class="text-center">
                <a href="timeline.php">Home</a>&nbsp;&nbsp;|&nbsp;&nbsp;
                <a href="logout.php">Logout</a>
            </span>
        </div></center><br>
    </div>
</div>

</body>
</html>
