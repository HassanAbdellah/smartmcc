<!--
/**
 * Created by Hassan Abdella.
 * Date: 02/14/2019
 */-->
 
<?php
include 'config.php';
$id = $_GET['id'];
session_start();
if (isset($_SESSION['loginEmail'])) {
    $email = $_SESSION['loginEmail'];
    $d = mysqli_query($con, "DELETE FROM user_reservation WHERE id='$id'");
    header('location:appointments_user.php');
}