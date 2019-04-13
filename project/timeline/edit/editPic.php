<!--
/**
 * Created by Hassan Abdella.
 * Date: 04/13/2019
 */-->


<?php
    include '../../header.php';
session_start();
require '../connect.php';
if (isset($_SESSION['loginEmail'])) {
    $alt = $_SESSION['file_name'].'.'.$_SESSION['file_ext'];
///////////////////file///////////////////
if (isset($_FILES['newFile']['name'])) {
    $new_file_name = $_FILES['newFile']['name'];
    $new_file_type = $_FILES['newFile']['type'];
    $new_file_ext = end(explode('/', $new_file_type));
    $new_file_name = strtotime("now");
    $new_file_tmp_name = $_FILES['newFile']['tmp_name'];
    $new_extension = array("jpg", "jpeg", "png", "gif", "svg", "bmp",);
    $file_path = $new_file_name . '.' . $new_file_ext;
    if (in_array($new_file_ext, $new_extension)) {
        move_uploaded_file($new_file_tmp_name, "../../img/uploads/" . $file_path);
        ///////////

        $data=$_SESSION['file_name'].'.'.$_SESSION['file_ext'];
        $dir = "img/uploads";
        $dirHandle = opendir($dir);
        while ($oldFile = readdir($dirHandle)) {
            if($oldFile==$data) {
                unlink($oldFile);
            }
        }
        closedir($dirHandle);
    }
    //////////////////////update//////////////////////
    if (isset($_REQUEST['saveChange'])) {
        $email = $_SESSION['loginEmail'];

        date_default_timezone_set('africa/cairo');
        $new_upd_date = date("Y-m-d h:i:sa", strtotime("now"));
        $d = mysqli_query($con, "SELECT * FROM userinfo where email='$newEmail'");
        $num = mysqli_num_rows($d);
        if ($num > 0) {
            echo "<script>alert('Email already exists choose another email');</script>";
        } else {
            $result = mysqli_query($con, "UPDATE userinfo SET file_name='$new_file_name', file_ext='$new_file_ext' WHERE email='$email'");

            $_SESSION['file_name'] = $new_file_name;
            $_SESSION['file_ext'] = $new_file_ext;
            header('location:../timeline.php');
        }
    }
}
} else {
    header('location:../../error.php');
}
?>

            <form role="form" method="post" class="form-horizontal" enctype="multipart/form-data"><br>
                <div class="form-group">
                    <div class="row">
                        <div class="col-md-4"></div>
                        <div class="col-md-4">
                            <label for="newFile" class="col-sm-9 control-label">
                                <img src="../../img/uploads/<?php echo $alt ?>" style="border:2px solid darkgray; border-radius:30%; height: 100px; width:100px;"><br>
                                <label for="newFile" class="glyphicon glyphicon-edit">Change pic</label>
                            </label>
                            <input type="file" class="form-control" id="newFile" name="newFile" style="display: none">
                        </div>
                        <div class="col-md-4"></div>
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