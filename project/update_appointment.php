<!--
/**
 * Created by Hassan Abdella.
 * Date: 02/14/2019
 */-->
 
<?php
include 'header.php';
session_start();
require 'config.php';
$user_id = "";
$id = $_GET['id'];
$specialization ="";
$date = "";
$time ="";
$doctor_id ="";
$row = "";


$mmm = "SELECT * FROM userinfo WHERE email = '" . $_SESSION['loginEmail'] . "'";
$sql_user=mysqli_query($con,$mmm);
if(mysqli_num_rows($sql_user)){
    $row = mysqli_fetch_array($sql_user);
    $user_id = $row['id'];

}

if (isset($_POST['update'])) {
  // receive all input values from the form
  $date = mysqli_real_escape_string($con, $_POST['date']);
  $time = mysqli_real_escape_string($con, $_POST['time']);
  $doctor_id = mysqli_real_escape_string($con, $_POST['select']);

  // form validation: ensure that the form is correctly filled ...
  // by adding (array_push()) corresponding error unto $errors array
  if (empty($date)) { array_push($errors, "date of appointment is required"); }
  if (empty($time)) { array_push($errors, "time is required"); }
  if (empty($doctor_id)) { array_push($errors, "doctors is required"); }
  // Finally, register user if there are no errors in the form
   if (count($errors) == 0) {
    $qulii = "UPDATE user_reservation SET doctor_id = '$doctor_id', date = '$date', time = '$time'
    WHERE id = '$id'
    ";
    if(mysqli_query($con, $qulii)){
    header('location:Appointments_user.php');
    }else{
      echo mysqli_error($con);
    }
    //echo "Everything OK";
  }
}

?>

<!DOCTYPE html>
<html>
<head>
    <title>UPDATE</title> 
    <!--<link rel="icon" href="IMG/logo.png"">-->
</head>  

<body>

    <center><h1>Edit You Appointment</h1><center>
    <div class="container">
        <div class="container-fluid">
            <form method="post">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="input-group">
                            <label for="specialization" name="specialization">Doctor</label><br>
                                <?php 
                                    $sql_doc=mysqli_query($con,"SELECT id,name,specialization FROM doctors ORDER BY specialization");
                                    if(mysqli_num_rows($sql_doc)){
                                        $select= '<select name="select">';
                                        while($rs=mysqli_fetch_array($sql_doc)){
                                        $select.='<option value="'.$rs['id'].'">'."DR.".$rs['name']." -".$rs['specialization'].'</option>';
                                        }
                                    }
                                    $select.='</select>';
                                    echo $select;
                                ?>
                        </div>
                        <hr size="80%" noshade>
                        <div class="input-group">
                            <label for="user_id" >Your ID is : </label><br>
                                <?php 
                                    $mmm = "SELECT * FROM userinfo WHERE email = '" . $_SESSION['loginEmail'] . "'";
                                    $sql_user=mysqli_query($con,$mmm);
                                    if(mysqli_num_rows($sql_user)){
                                        $row = mysqli_fetch_array($sql_user);
                                        $user_id = $row['id'];
                                        echo ($user_id);

                                    }

                                ?>
                        </div>
                        <hr size="80%" noshade>
                        <div class="input-group">
                            <label for="date">Date of appointment</label><br>
                            <input type="date" name="date" placeholder="when?!" style="width: 90%;" value="<?php echo $date; ?>">
                        </div>
                        <hr size="80%" noshade>
                        <div class="input-group">
                            <label for="time">Best time to call you</label><br>
                            <input type="time" name="time" style="width: 90%;" value="<?php echo $time; ?>">
                            <!--<select name="time" style="width: 90%;" value="">
                                <option value="Morning">Morning</option>
                                <option value="Afternoon">Afternoon</option>
                                <option value="Evening">Evening</option>
                            </select>-->
                        </div>
                        <hr size="80%" noshade>
                        <div class="input-group">
                            <button type="submit" class="btn" name="update">Update</button><br>
                        </div>
                </div>
            </form>
        </div>
    </div>
</div>
   <?php include 'footer.php'; ?>
   </body>
</html>

