<!--
/**
 * Created by Hassan Abdella.
 * Date: 02/05/2019
 */-->

<?php
session_start();
    if(isset($_SESSION['loginEmail'])){
        header('location:../info.php');
    }
    else{
        header('location:home.php');
    }
?>