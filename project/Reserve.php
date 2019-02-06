<!--
/**
 * Created by Hassan Abdella.
 * Date: 02/05/2019
 */-->
 
<?php
session_start();
require 'config.php';
$user_id = "";
$id = "";
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
    //echo ($user_id);
    //$sel= '<select name="sel">';
    //while($us=mysqli_fetch_array($sql_user)){
    //$sel.='<option value="'.$us['id'].'">'.$us['id'].'</option>';
    //}
}

if (isset($_POST['reserve'])) {
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
    $qulii = "INSERT INTO user_reservation (user_id, doctor_id, date, time)
    VALUES('$user_id', '$doctor_id', '$date', '$time')";
    if(mysqli_query($con, $qulii)){
    header('location: index.php');
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
    <title>Reserve</title> 
    <!--<link rel="icon" href="IMG/logo.png"">-->
</head>  

<body>
    <center><h1>Doctor Appointment Form</h1><center>
    <div class="container">
        <form action="Reserve.php" method="post">

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


            <div class="input-group">
                <label for="user_id" >Your ID is : </label><br>
                    <?php 
                        $mmm = "SELECT * FROM userinfo WHERE email = '" . $_SESSION['loginEmail'] . "'";
                        $sql_user=mysqli_query($con,$mmm);
                        if(mysqli_num_rows($sql_user)){
                            $row = mysqli_fetch_array($sql_user);
                            $user_id = $row['id'];
                            echo ($user_id);
                            //$sel= '<select name="sel">';
                            //while($us=mysqli_fetch_array($sql_user)){
                            //$sel.='<option value="'.$us['id'].'">'.$us['id'].'</option>';
                            //}
                        }
                        //$sel.='</select>';
                        //echo $sel;
                    ?>
            </div>

            <div class="input-group">
                <label for="date">Date of appointment</label><br>
                <input type="date" name="date" placeholder="when?!" style="width: 90%;" value="<?php echo $date; ?>">
            </div>



            <div class="input-group">
                <label for="time">Best time to call you</label><br>
                <select name="time" style="width: 90%;" value="<?php echo $time; ?>">
                    <option value="Morning">Morning</option>
                    <option value="Afternoon">Afternoon</option>
                    <option value="Evening">Evening</option>
                </select>
            </div>


            <div class="input-group">
                <button type="submit" class="btn" name="reserve" >RESERVE</button><br>
            </div>
    </form>
</div>
   </body>
</html>




