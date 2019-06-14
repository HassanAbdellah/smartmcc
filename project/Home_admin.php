<!--
/**
 * Created by Hassan Abdella.
 * Date: 02/10/2019
 */-->


<div class="col-md-3"></div>
<div class="col-md-6">
    <div class="modal-content container-fluid">
        <div class="modal-body">
            <div class="row">
                <!--Nav tabs-->
                <ul class="nav nav-tabs">
                    <li class="active"><a href="#Login" data-toggle="tab"> Login</a></li>
                </ul>
                <!--Tab panes-->
                <div class="tab-content">
                    <div class="tab-pane active" id="Login">
                        <form role="form" method="post" class="form-horizontal"><br>
                            <div class="form-group">
<?php

require 'config.php';
////////  Login validation ///////////
if(isset($_REQUEST['login'])){
    session_start();
    $loginEmail=$_REQUEST['loginEmail'];
    $loginPassword=$_REQUEST['loginPassword'];
    $loginResult=mysqli_query($con,"SELECT * FROM admininfo WHERE email='$loginEmail' AND password='$loginPassword'");
    if(mysqli_num_rows($loginResult)==1){
        if($_REQUEST['remember']){
            setcookie('loginEmail',$loginEmail, time()+60*60*7);
            setcookie('loginPassword',$loginPassword, time()+60*60*7);
        }
            $result=mysqli_fetch_assoc($loginResult);
            $fName=$result['fName'];
            $lName=$result['lName'];
            $gender=$result['gender'];
            $mobile=$result['mobile'];
            $address=$result['address'];
            $bdate=$result['bdate'];
            $file_name=$result['file_name'];
            $file_ext=$result['file_ext'];

        $_SESSION['loginEmail']=$loginEmail;
        $_SESSION['fName']=$fName;
        $_SESSION['lName']=$lName;
        $_SESSION['gender']=$gender;
        $_SESSION['mobile']=$mobile;
        $_SESSION['address']=$address;
        $_SESSION['bdate']=$bdate;
        $_SESSION['file_name']=$file_name;
        $_SESSION['file_ext']=$file_ext;

        header('location:welcome_Admin.php');
    }
    else{
        echo"<div class='alert alert-danger' role='alert'>
                <span class='glyphicon glyphicon-exclamation-sign' aria-hidden='true'></span>
                <span class='sr-only'>Error:</span>Email or Password is not valid. 
             </div>";
    }
}
///////////////////file///////////////////
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
        move_uploaded_file($file_tmp_name, "img/admins/".$file_path);
    }

}
include 'header.php';
?>

                                <!-----Remaining Login form --------->
                                <label for="loginEmail" class="col-sm-2 control-label">Email</label>
                                <div class="col-sm-10">
                                    <input type="email" class="form-control" id="loginEmail" name="loginEmail" placeholder="Email"/>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="loginPassword" class="col-sm-2 control-label">Password</label>
                                <div class="col-sm-10">
                                    <input type="password" class="form-control" id="loginPassword" name="loginPassword" placeholder="Password"/>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-sm-offset-2 col-sm-10">
                                    <div class="checkbox">
                                        <label>
                                            <input type="checkbox" name="remember" value="1"> Remember me
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-2">
                                </div>
                                <div class="col-sm-10">
                                    <input type="submit" id="login" name="login" class="btn btn-primary btn-sm" value="Login">
                                </div>
                            </div>
                            <center><label><span>Log in as</span></label><a href="home.php"> user</a></center>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="col-md-3"></div>

<?php
if(isset($_COOKIE['loginEmail']) and isset($_COOKIE['loginPassword'])){
    $loginEmail=$_COOKIE['loginEmail'];
    $loginPassword=$_COOKIE['loginPassword'];
    echo "<script>
              document.getElementById('loginEmail').value='$loginEmail';
              document.getElementById('loginPassword').value='$loginPassword';
                </script>";
}
?>