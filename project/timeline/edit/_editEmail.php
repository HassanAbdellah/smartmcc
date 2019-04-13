<!--
/**
 * Created by Hassan Abdella.
 * Date: 02/05/2019
 */-->

<script>
    function checkUpdate() {
        var newEmail=document.getElementById('newEmail').value;


        if(newEmail==""){
            alert("Fill all field values");
            return false;
        }

        return true;
    }
</script>
<?php
include '../../header.php';
session_start();
require '../connect.php';
if (isset($_SESSION['loginEmail'])) {

    //////////////////////update//////////////////////
    if (isset($_REQUEST['saveChange'])) {
        $email = $_SESSION['email'];
        $newEmail = $_REQUEST['newEmail'];


        $d = mysqli_query($con, "SELECT * FROM userinfo where email='$newEmail'");
        $num = mysqli_num_rows($d);
        if ($num > 0) {
            echo "<script>alert('Email already exists choose another email');</script>";
        } else {
            $result = mysqli_query($con, "UPDATE userinfo SET email='$newEmail' WHERE email='$email'");
            $_SESSION['email'] = $newEmail;

            header('location:../timeline.php');
        }
    }
}
 else {
    header('location:../../error.php');
}
?>

            <form role="form" method="post" class="form-horizontal" enctype="multipart/form-data"><br>

                <div class="form-group">
                    <div class="col-sm-6">
                        <input type="email" class="form-control" id="newEmail" name="newEmail" placeholder="Email"/>
                    </div>
                </div>

                <div class="row">
                    <div class="col-sm-12">
                        <input type="submit" id="saveChange" name="saveChange" class="btn btn-primary btn-sm btn-block" onclick="return checkUpdate()" value="Save Changes">
                    </div>
                </div>
            </form>

<br>
<a href="index.php">Home</a>