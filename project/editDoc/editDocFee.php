<!--
/**
 * Created by Hassan Abdella.
 * Date: 04/13/2019
 */-->

<script>
    function checkUpdate() {
        var newFee=document.getElementById('newFee').value;


        if(newFee=="" ){
            alert("Fill all field values");
            return false;
        }

        return true;
    }
</script>
<?php
    include '../header.php';
session_start();
require '../config.php';
if (isset($_SESSION['loginEmail'])) {

    //////////////////////update//////////////////////
    if (isset($_REQUEST['saveChange'])) {
        $id = $_GET['id'];
        $newFee = $_REQUEST['newFee'];

        $d = mysqli_query($con, "SELECT * FROM doctors where id='$id'");
        $num = mysqli_num_rows($d);

        $result = mysqli_query($con, "UPDATE doctors SET fees='$newFee' WHERE id='$id'");
        $_SESSION['fees'] = $newSpec;
        header('location:../viewdoctor_admin.php');

    }
}
    else {
        header('location:../error.php');
    }
?>

            <form role="form" method="post" class="form-horizontal" enctype="multipart/form-data"><br>

                <div class="form-group">
                    <div class="col-sm-12">
                        <input type="number" class="form-control" id="newFee" name="newFee" placeholder="Enter Doctor's Name here...">
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
<a href="../welcome_Admin.php">Home</a>