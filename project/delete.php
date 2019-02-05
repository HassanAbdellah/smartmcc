<!--
/**
 * Created by Hassan Abdella.
 * Date: 02/05/2019
 */-->
 
<?php
include 'config.php';
session_start();
if (isset($_SESSION['loginEmail'])) {
    $email = $_SESSION['loginEmail'];
    $d = mysqli_query($con, "DELETE FROM userinfo WHERE email='$email'");
    session_destroy();
    if(isset($_COOKIE['loginEmail']) and isset($_COOKIE['loginPassword'])){
        $loginEmail=$_COOKIE['loginEmail'];
        $loginPassword=$_COOKIE['loginPassword'];
        setcookie('loginEmail',$loginEmail, time()-1);
        setcookie('loginPassword',$loginPassword, time()-1);
    }
    header('location:index.php');
}