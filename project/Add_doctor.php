<!--
/**
 * Created by Hassan Abdella.
 * Date: 02/10/2019
 */-->

<?php 
include 'header.php';
?>

<?php

require 'config.php';
if (isset($_FILES['file']['name'])) {
    $file_name = $_FILES['file']['name'];
    $file_type=$_FILES['file']['type'];
    $file_ext=end(explode('/',$file_type));
    ///$file_ext = end(explode('.', $file_name));
    $file_name = strtotime("now");
    $file_tmp_name = $_FILES['file']['tmp_name'];
    $extension = array("jpg","jpeg", "png", "gif", "svg", "bmp",);
    $file_path= $file_name.'.'.$file_ext;
if (in_array($file_ext, $extension)) {
    move_uploaded_file($file_tmp_name, "img/doctors/".$file_path);
}

if(isset($_POST["saveChange"])){
session_start();
// Create connection
// Check connection
if ($con->connect_error) {
    die("Connection failed: " . $con->connect_error);
} 

$sql = "INSERT INTO doctors (name,specialization,info,file_name, file_ext,working_time,location_text,phones,fees)
VALUES ('".$_POST["newName"]."', '".$_POST["speci"]."', '".$_POST["info"]."','$file_name', '$file_ext', '".$_POST["time"]."', '".$_POST["newAddress"]."', '".$_POST["newMobile"]."', '".$_POST["fees"]."')";

if ($con->query($sql) === TRUE) {
        header('location:welcome_Admin.php');
} else {
    echo "Error: " . $sql . "<br>" . $con->error;
}

$con->close();
}
}
?>


<html>
<body>
<div class="container">
    <div class="col-sm-2"></div>
    <div class="col-sm-8">
        <div class="row">
            <div class="text-center"><span class="lead">Add Doctor</span> </div>
            <form role="form" method="post" class="form-horizontal" enctype="multipart/form-data"><br>
                <div class="form-group">
                    <div class="row">
                        <div class="col-md-4"></div>
                        <div class="col-md-4">
                            <label for="file" class="col-sm-10 control-label">
                                <img src="img/test.jpg" style="border:2px solid darkgray; border-radius:30%; height: 100px; width:100px;"><br>
                                <label for="file" class="glyphicon glyphicon-edit">Upload pic</label>
                            </label>
                            <input type="file" class="form-control" id="file" name="file" style="display: none" value="">
                        </div>
                        <div class="col-md-4"></div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-sm-12">
                        <input type="text" class="form-control" id="newName" name="newName" placeholder="Full Name"/>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-sm-6">
                        <input type="text" class="form-control" id="speci" name="speci" placeholder="specification"/>
                    </div>
                    <div class="col-sm-6">
                        <input type="text" class="form-control" id="info" name="info" placeholder="informations"/>
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-sm-6">
                        <input type="number" class="form-control" id="newMobile" name="newMobile" placeholder="Mobile"/>
                    </div>
                    <div class="col-sm-6">
                        <input type="text" class="form-control" id="fees" name="fees" placeholder="fees"/>
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-sm-12">
                        <textarea class="form-control" id="newAddress" name="newAddress" placeholder="Location..." rows="3"></textarea>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-sm-12">
                        <input type="text" name="time" class="form-control" id="time" name="time" placeholder="Working Time..."/ >
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-12">
                        <input type="submit" id="saveChange" name="saveChange" class="btn btn-primary btn-sm btn-block" onclick="return checkUpdate()" value="Save Changes">
                    </div>
                </div>
            </form>
        </div>
    </div>
    <div class="col-sm-2"></div>
</div>
<br>
<div class="container">
    <div class="row">
        <div class="col-sm-12">
            <span class="text-center">
                <a href="welcome_Admin.php">Home</a>&nbsp;&nbsp;|&nbsp;&nbsp;
                <a href="logout.php">Logout</a>
            </span>
        </div>
    </div>
</div>

</body>
</html>









