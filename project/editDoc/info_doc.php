<!--
/**
 * Created by Hassan Abdella.
 * Date: 02/05/2019
 */-->
 

<!DOCTYPE html>

<?php
session_start();
require '../config.php';

if (isset($_SESSION['loginEmail'])) {
    $id=$_GET['id'];
    $mmm = "SELECT * FROM doctors WHERE id = '" . $id . "'";
    $sql_user=mysqli_query($con,$mmm);
    if(mysqli_num_rows($sql_user)){
        $row = mysqli_fetch_array($sql_user);
        $alt = $row['file_name'].'.'.$row['file_ext'];
        $name = $row['name'];
        $specialization = $row['specialization'];
        $info = $row['info'];
        $working_time = $row['working_time'];
        $location_text = $row['location_text'];
        $phones = $row['phones'];
        $fees = $row['fees'];


    } else {
    header('location:../error.php');
}


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
                        <label><?php echo "Doctor: <b><font color='green'>" . $name . "</font> </b>" ?></label>
                        <?php echo "<a  href='editDocName.php?id=".$id."'><span class='glyphicon glyphicon-edit'></span></a>"; ?>

                    </div>
                    <hr size="80%" noshade>
                    <div class="input-group">
                        <label><?php echo "Specialization: <b><font color='green'>" . $specialization . "</font></b>" ?></label>
                        <?php echo "<a  href='editDocSpec.php?id=".$id."'><span class='glyphicon glyphicon-edit'></span></a>"; ?>

                    </div>
                    <hr size="80%">
                    <div class="input-group">
                        <label><?php echo "Informations: <b><font color='green'>" . $info . "</font></b>" ?></label>
                        <?php echo "<a  href='editDocInfo.php?id=".$id."'><span class='glyphicon glyphicon-edit'></span></a>"; ?>

                    </div>
                    <hr size="80%">
                    <div class="input-group">
                        <label><?php echo "Working Time: <b><font color='green'>" . $working_time . "</font></b>" ?></label>
                        <?php echo "<a  href='editDocWT.php?id=".$id."'><span class='glyphicon glyphicon-edit'></span></a>"; ?>
                    </div>
                    <hr size="80%">
                    <div class="input-group">
                        <label><?php echo "Location: <b><font color='green'>" . $location_text . "</font></b>" ?></label>
                        <?php echo "<a  href='editDocLoc.php?id=".$id."'><span class='glyphicon glyphicon-edit'></span></a>"; ?>
                    </div>
                    <hr size="80%">
                    <div class="input-group">
                        <label><?php echo "Phone: <b><font color='green'>" . $phones . "</font></b>" ?></label>
                        <?php echo "<a  href='editDocPho.php?id=".$id."'><span class='glyphicon glyphicon-edit'></span></a>"; ?>
                    </div>
                    <hr size="80%">
                    <div class="input-group">
                        <label><?php echo "Fees: <b><font color='green'>" . $fees . "</font></b>" ?></label>
                        <?php echo "<a  href='editDocFee.php?id=".$id."'><span class='glyphicon glyphicon-edit'></span></a>"; ?>
                    </div>
                    <hr size="80%">
                </div>
                <!-- Profile pic -->
                <div class="col-sm-5">
                    <div class="col-sm-12 img-circle" align="middle">
                        <?php echo "<a  href='editDocIMG.php?id=".$id."'><img src='../img/Doctors/". $alt ."' class='img-circle' height='250px' width='250px'
                             alt='Profile pic'>"; ?>
                             <span class='glyphicon glyphicon-edit'></span></a>

                    </div>

                </div>
</div>
<div class="container">
    <div class="row">
        <div class="col-sm-12">
            <span class="text-center">
                <a href="timeline.php">Home</a>&nbsp;&nbsp;|&nbsp;&nbsp;
                <a href="logout.php">Logout</a>
            </span>
        </div>
    </div>
</div><center>

</body>
</html>
