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
    $s = mysqli_query($con, "SELECT * FROM user_reservation WHERE id='$id'");
    $result=mysqli_fetch_assoc($s);
    $doctor1=$result['doctor_id'];
    $date1=$result['date'];
    $time1=$result['time'];
    $i = mysqli_query($con, "INSERT  INTO available_dates (doctor_id, date, time) VALUES ('$doctor1', '$date1', '$time1')");
    $d = mysqli_query($con, "DELETE FROM user_reservation WHERE id='$id'");
    header('location:appointments_user.php');
}