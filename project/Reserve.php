<!--
/**
 * Created by Hassan Abdella.
 * Date: 02/05/2019
 */-->

<?php
include('header.php');
?>
<!DOCTYPE html>
<html>
<head>
    <title> <?php echo ($_SESSION['username']); ?> | Reserve</title> 
    <!--<link rel="icon" href="IMG/logo.png"">-->
</head>  

<body>
    <center><h1>Doctor Appointment Form</h1><center>
    <center><h2>Search Here Doctor</h2></center>
    <div class="container">
        <form action="Reserve.php" method="post">
            <div class="input-group">
                <label for="reason">Reason for the visit</label>
                <input type="text" name="reason" placeholder="Reason for the visit.." style=" width: 90%;" value="<?php echo $reason; ?>">
            </div>
            <div class="input-group">
                <label for="speci">Specializations</label><br>
                <select name="speci" style="width: 90%;" value="<?php echo $speci; ?>">
                    <option value="Dermatologist">Dermatologist</option>
                    <option value="Radiologist">Radiologist</option>
                    <option value="Oncologist">Oncologist</option>
                    <option value="Gastroenterologist">Gastroenterologist</option>
                    <option value="Ophthalmologist">Ophthalmologist</option>
                    <option value="Infectious disease/HIV physician">Infectious disease/HIV physician</option>
                    <option value="Plastic surgeon">Plastic surgeon</option>
                    <option value="Anesthesiologist">Anesthesiologist</option>
                    <option value="Orthopedic surgeon">Orthopedic surgeon</option>
                    <option value="Psychiatrist">Psychiatrist</option>
                    <option value="Rheumatologist">Rheumatologist</option>
                    <option value="Podiatrist">Podiatrist</option>
                    <option value="Emergency medicine physician">Emergency medicine physician</option>
                    <option value="Urologist">Urologist</option>
                    <option value="Cardiologist">Cardiologist</option>
                    <option value="Pediatrician">Pediatrician</option>
                    <option value="Diabetes specialist/Endocrinologist">Diabetes specialist/Endocrinologist</option>
                    <option value="Neurologist">Neurologist</option>
                    <option value="General surgeon">General surgeon</option>
                    <option value="Nephrologist">Nephrologist</option>
                    <option value="Obstetrician/Gynecologist">Obstetrician/Gynecologist</option>
                    <option value="Pulmonologist">Pulmonologist</option>
                    <option value="Primary care physician">Primary care physician</option>
                </select>
            </div>
            <div class="input-group">
                <label for="date">Date of appointment</label><br>
                <input type="date" name="dataofappo" placeholder="when?!" style="width: 90%;" value="<?php echo $dataofappo; ?>">
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
                <label for="visit">I would like to (choose one)</label><br>
                <select name="visit" style="width: 90%;" value="<?php echo $visit; ?>">
                    <option value="A new patient appointment">A new patient appointment</option>
                    <option value="A routine checkup">A routine checkup</option>
                    <option value="A comprehensive health exam">A comprehensive health exam</option>
                </select>
            </div>
            <div class="input-group">
                <button type="submit" class="btn" name="reserve">RESERVE</button><br>
            </div>
    </form>
</div>
   </body>
</html>