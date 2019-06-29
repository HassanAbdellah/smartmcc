<!--
/**
 * Created by Hassan Abdella.
 * Date: 02/10/2019
 */-->
<style type="text/css">
table {
  width:30%;
}
table, th, td {
  border: 1px solid black;
  border-collapse: collapse;
}
th, td {
  padding: 15px;
  text-align: left;
}
</style>

<?php 
include 'header.php';
?>


<?php
require 'config.php';
$email="";
$password="";
session_start();
// Create connection
// Check connection
if ($con->connect_error) {
    die("Connection failed: " . $con->connect_error);
} 


$mmm = "SELECT * FROM doctors_accounts WHERE doctor_id = '" . $_GET['id'] . "'";
$sql_user=mysqli_query($con,$mmm);
if(mysqli_num_rows($sql_user)){
    $row = mysqli_fetch_array($sql_user);
    $doctor_id = $row['doctor_id'];
    $email = $row['email'];
    $password = $row['password'];
}



$con->close();

?>
<br>

<center>
<table>
    <tr>
        <th>Email</th>
        <th>Password</th>
    </tr>
    <tr>
        <td><label><?php echo $email; ?></label></td>
        <td><label><?php echo $password; ?></label></td>
</tr>
</table>
</center>
<br>
<div class="container">
    <center><div class="row">
        <div class="col-sm-12">
            <span class="text-center">
                <a href="welcome_Admin.php">Home</a>&nbsp;&nbsp;|&nbsp;&nbsp;
                <a href="logout.php">Logout</a>
            </span>
        </div>
    </div></center><br>
</div>

</body>
</html>









