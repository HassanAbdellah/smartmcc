<style>
    div{
        display: block;
    }
    input{
        width: 257px;
    }
</style>

<?php
    include 'header.php';
?>

<?php
require 'config.php';
if(isset($_POST["saveChange"])){
session_start();
// Create connection
// Check connection
if ($con->connect_error) {
    die("Connection failed: " . $con->connect_error);
} 

$sql = "INSERT INTO available_dates (doctor_id,date,time)
VALUES ('".$_POST["id"]."', '".$_POST["date"]."', '".$_POST["time"]."')";

if ($con->query($sql) === TRUE) {
        header('location:Add_date.php');
} else {
    echo "Error: " . $sql . "<br>" . $con->error;
}

$con->close();
}
?>

<html>
<body>

            <center><form role='form' method='post' class='form-horizontal' enctype='multipart/form-data'><br>
                Doctor: <br>
                        <?php 
                            $sql_doc=mysqli_query($con,"SELECT id,name,specialization FROM doctors ORDER BY id");
                            if(mysqli_num_rows($sql_doc)){
                                $select= '<select name="id" id="id">';
                                while($rs=mysqli_fetch_array($sql_doc)){
                                $select.='<option value="'.$rs['id'].'">'."DR.".$rs['name']." -".$rs['specialization'].'</option>';
                                }
                            }
                            $select.='</select>';
                            echo $select;
                            ?>
                            <br> Date: <br>
                                <input type='date'  id='date' name='date' placeholder='date'/>
                            <br> Time: <br>
                                <input type='time'  id='time' name='time' placeholder='time'/>
                            <div class='row'>
                            <br>
                                    <input type='submit' id='saveChange' name='saveChange' class='' onclick='return checkUpdate()' value='Save Changes'>
                            </div>
            </form>
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
</div></center>

</body>
</html>


