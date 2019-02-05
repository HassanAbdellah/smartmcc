<!--
/**
 * Created by Hassan Abdella.
 * Date: 02/05/2019
 */-->
 
<?php
    session_start();
    session_destroy();
    if(isset($_COOKIE['loginEmail']) and isset($_COOKIE['loginPassword'])){
        $loginEmail=$_COOKIE['loginEmail'];
        $loginPassword=$_COOKIE['loginPassword'];
        setcookie('loginEmail',$loginEmail, time()-1);
        setcookie('loginPassword',$loginPassword, time()-1);
    }
header('location:index.php');
?>