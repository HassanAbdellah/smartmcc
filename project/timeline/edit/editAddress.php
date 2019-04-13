<!--
/**
 * Created by Hassan Abdella.
 * Date: 02/05/2019
 */-->

<script>
    function checkUpdate() {
        var newAddress=document.getElementById('newAddress').value;


        if(newAddress=="" ){
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
        $newAddress = $_REQUEST['newAddress'];

        $d = mysqli_query($con, "SELECT * FROM userinfo where email='$newEmail'");
        $num = mysqli_num_rows($d);

        $result = mysqli_query($con, "UPDATE userinfo SET address='$newAddress' WHERE email='$email'");
        $_SESSION['address'] = $newAddress;
        header('location:../timeline.php');

    }
}
    else {
        header('location:../../error.php');
    }
?>

            <form role="form" method="post" class="form-horizontal" enctype="multipart/form-data"><br>

                <div class="form-group">
                    <div class="col-sm-12">
                        <textarea class="form-control" id="newAddress" name="newAddress" placeholder="Enter your address here..."
                                  rows="3"></textarea>
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