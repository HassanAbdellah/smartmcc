<!--
/**
 * Created by Hassan Abdella.
 * Date: 04/13/2019
 */-->

<script>
    function checkUpdate() {
        var newMobile=document.getElementById('newMobile').value;


        if(newMobile==""){
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
        $email = $_SESSION['loginEmail'];
        $newMobile = $_REQUEST['newMobile'];


        $d = mysqli_query($con, "SELECT * FROM userinfo where email='$newEmail'");
        $num = mysqli_num_rows($d);

        $result = mysqli_query($con, "UPDATE userinfo SET mobile='$newMobile' WHERE email='$email'");
        $_SESSION['mobile'] = $newMobile;

        header('location:../timeline.php');

    }
}
    else {
        header('location:../../error.php');
    }
?>

            <form role="form" method="post" class="form-horizontal" enctype="multipart/form-data"><br>

                <div class="form-group">
                    <div class="col-sm-6">
                        <input type="number" class="form-control" id="newMobile" name="newMobile" placeholder="Mobile"/>
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
<a href="index.php">Home</a>