<!--
/**
 * Created by Hassan Abdella.
 * Date: 02/05/2019
 */-->
 
<?php
include 'header.php';
session_start();
require 'config.php';
$user_id = "";
$id = "";
$specialization ="";
$date = "";
$time ="";
$doctor_id ="";
$row = "";
$resID = "";
$val = "";
date_default_timezone_set('africa/cairo');
$Resdate = date("Y-m-d H:i:s", strtotime("now"));


$mmm = "SELECT * FROM userinfo WHERE email = '" . $_SESSION['loginEmail'] . "'";
$sql_user=mysqli_query($con,$mmm);
if(mysqli_num_rows($sql_user)){
    $row = mysqli_fetch_array($sql_user);
    $user_id = $row['id'];

}


  $query = "SELECT id,name,specialization FROM doctors";
  $result = $con->query($query);

  while($row = $result->fetch_assoc()){
    $docs[] = array("id" => $row['id'], "val" => "Dr. ".$row['name']." | ".$row['specialization']);
  }

  $query = "SELECT * FROM available_dates ORDER BY date ASC, time ASC";
  $result = $con->query($query);

  while($row = $result->fetch_assoc()){
      $currDate = $row['date']." ".$row['time'];
      if($currDate>=$Resdate){
        $appo[$row['doctor_id']][] = array("id" => $row['id'], "val" => $row['date'],"val2" => $row['time']);
      }
  }

  $jsonCats = json_encode($docs);
  $jsonSubCats = json_encode($appo);




if (isset($_POST['reserve'])) {

    $doctor_id = mysqli_real_escape_string($con, $_POST['select']);

    $val = $_POST['date0'];

    $res = mysqli_query($con, 'SELECT * from available_dates WHERE id = "' . $val . '" ');
    $result1=mysqli_fetch_assoc($res);
    $date1=$result1['date'];
    $time1=$result1['time'];

/* SHOW DOCTOR NAME IF YOU WANT

    $res2 = mysqli_query($con, 'SELECT name from doctors WHERE id = "' . $_POST['select'] . '" ');
    $result2=mysqli_fetch_assoc($res2);
    $docName=$result2['name'];
*/
    $qulii = "INSERT INTO user_reservation (user_id, doctor_id, date, time, status,Resdate)
    VALUES('$user_id', '$doctor_id', '$date1', '$time1','0','$Resdate')";
          mysqli_query($con, 'DELETE from available_dates WHERE id = "' . $val . '" ');


    if(mysqli_query($con, $qulii)){
          header('location: timeline/timeline.php');
    }else{
      echo mysqli_error($con);
    }
}



?>

<!DOCTYPE html>
  <head>
    <script type='text/javascript'>
      <?php
        echo "var docs = $jsonCats; \n";
        echo "var appo = $jsonSubCats; \n";

      ?>
      function loadCategories(){
        var select = document.getElementById("categoriesSelect");
        select.onchange = updateSubCats;
        for(var i = 1; i <= docs.length; i++){
          select.options[(i)] = new Option(docs[(i-1)].val,docs[(i-1)].id);          
        }
      }
      function updateSubCats(){
        var catSelect = this;
        var catid = this.value;
        var subcatSelect = document.getElementById("subcatsSelect");
        //subcatSelect.onchange = updateSubCats2;
        subcatSelect.options.length = 0; //delete all options if any present
        subcatSelect.options[0] = new Option("Select Date","");
        document.getElementById("subcatsSelect").options[0].disabled = true;
        for(var i = 1; i <= appo[catid].length; i++){
            subcatSelect.options[i] = new Option(appo[catid][(i-1)].val +" | "+appo[catid][(i-1)].val2 ,appo[catid][(i-1)].id);
        }
      }


      function validateform(){  
          var doc=document.myform.select.value;  
          var dat=document.myform.date1.value;  
            
          if (doc==null || doc==""){  
            alert("Doctor can't be blank");  
            return false;  
          }
          else if(dat==null || dat==""){  
            alert("date can't be blank");  
            return false;  
            }  
    }  
    

    </script>
  </head>
<html>
<head>
    <title>Reserve</title> 
    <!--<link rel="icon" href="IMG/logo.png"">-->
</head>  

<body onload='loadCategories()'>

    <center><h1>Doctor Appointment Form</h1><center>
    <div class="container">
        <div class="container-fluid">
            <form name="myform" action="Reserve.php" method="post" onsubmit="required()">
                <div class="row">
                    <div class="col-sm-12">

                        <hr size="80%" noshade>
                        <div class="input-group">
                            <label for="user_id" >Your ID is : </label>
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
                        <div>
                            <select name='select' id='categoriesSelect' required>
                                <option disabled selected value>Select Doctor</option>
                            </select>

                            <div class="input-group">
                                <label for="date">Available Day</label><br>
                                <select name='date0' id='subcatsSelect' required>
                                </select>    
                            </div>
                            <!--<div class="input-group">
                                <label for="time">Best time to call you</label><br>
                                <select name='time' id='subcatsSelect2'>
                                </select> 
                            </div>-->                       
                        </div>


                        <hr size="80%" noshade>
                        <div class="input-group">
                            <button type="submit" class="btn" name="reserve" >RESERVE</button><br>
                        </div>
                </div>
            </form>
        </div>
    </div>
</div>
   <?php include 'footer.php'; ?>
   </body>
</html>

