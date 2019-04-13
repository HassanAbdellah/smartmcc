<!--
/**
 * Created by Hassan Abdella.
 * Date: 04/13/2019
 */-->

<script>
    function checkUpdate() {
        var newfName=document.getElementById('newfName').value;
        var newlName=document.getElementById('newlName').value;


        if(newfName=="" || newlName=="" ){
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
        $newfName = $_REQUEST['newfName'];
        $newlName = $_REQUEST['newlName'];

        $d = mysqli_query($con, "SELECT * FROM userinfo where email='$newEmail'");
        $num = mysqli_num_rows($d);

        $result = mysqli_query($con, "UPDATE userinfo SET fName='$newfName', lName='$newlName' WHERE email='$email'");
        $_SESSION['fName'] = $newfName;
        $_SESSION['lName'] = $newlName;
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
                        <input type="text" class="form-control" id="newfName" name="newfName" placeholder="First Name"/>
                    
                        <input type="text" class="form-control" id="newlName" name="newlName" placeholder="Last Name"/>
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