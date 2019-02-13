<!--
/**
 * Created by Hassan Abdella.
 * Date: 02/05/2019
 */-->
 
<?php
    include 'header.php';
?>

<style>
    .userbox {
        background: #fff none repeat scroll 0 0;
        box-shadow: 0 0 1px;
        padding: 20px;
        margin-bottom: 20px;
    }
    .img{
        height: 100px;
        width: 100px;
    }

</style>
<br>
<div class="container">
    <div class="row">
        <div class="col-sm-1"></div>
        <div class="col-sm-10">
            <img src="img/71.jpg" height="300px" width="100%">
        </div>
        <div class="col-sm-1"></div>
    </div>
</div><br>
<div class="container">
    <?php
    session_start();
    if (isset($_SESSION['loginEmail'])) {
    require 'config.php';
    $d = mysqli_query($con, "SELECT * FROM doctors");
    $num = mysqli_num_rows($d);
    while($num>0) {
        $result = mysqli_fetch_assoc($d);
        $id=$result['id'];
        $name = $result['name'];
        $specialization = $result['specialization'];
        $info = $result['info'];
        $file_name=$result['file_name'];
        $file_ext=$result['file_ext'];
        $working_time=$result['working_time'];
        $location_map=$result['location_map'];
        $location_text=$result['location_text'];
        $phones=$result['phones'];
        $fees=$result['fees'];
        $img=$file_name.'.'.$file_ext;
        


        $sql_doc=mysqli_query($con,"SELECT * FROM available_dates WHERE doctor_id = $id");
        if(mysqli_num_rows($sql_doc)){
            $select= '<select name="select">';
            while($rs=mysqli_fetch_array($sql_doc)){
            $select.='<option value="'.$rs['id'].'">'."Day: ".$rs['date']." time ".$rs['time'].'</option>';
            }
        }
        $select.='</select>';


        echo"<div class='row'>
                <div class='col-sm-2'></div>
                <div class='col-sm-12 userbox'>
                    <div class='col-sm-4'>
                        <div class='row'>
                            <div class='input-group'><span class='glyphicon glyphicon-user'></span>
                                <label>Doctor $id: <b><font color='green'> $name </font></b></label>
                            </div>
                            <div class='input-group'><span class='glyphicon glyphicon-pencil'></span>
                                <label>specialization: <b><font color='green'> $specialization </font></b></label>
                            </div>                            
                            <div class='input-group'><span class='glyphicon glyphicon-file'></span>
                                <label>informations: <b><font color='green'> $info </font></b></label>
                            </div>

                        </div>
                    </div>
                    <div class='col-sm-4'>
                        <div class='row'>
                            <div class='input-group'><span class='glyphicon glyphicon-pushpin'></span>
                                <label>Address: <b><font color='green'>$location_text</font></b></label>
                            </div>
                        </div>
                        <div class='row'>

                            <img src='img/Doctors/$img' class='img img-circle'>
                        </div>
                    </div>
                    <div class='col-sm-4'>
                        <div class='row'>
                            <div class='input-group'><span class='glyphicon glyphicon-earphone'></span>
                                <label>Mobile: <b><font color='green'> $phones </font></b></label>
                            </div>
                            <div class='input-group'><span class='glyphicon glyphicon-usd'></span>
                                <label>Fee: <b><font color='green'>$fees</font></b></label>
                            </div>
                            <div class='input-group'><span class='glyphicon glyphicon-time'></span>
                                <label>Working time: <b><font color='green'>$working_time</font></b></label>
                            </div>
                            <div class='input-group'><span class='glyphicon glyphicon-time'></span>
                                <label>available dates: </label><br>".$select."</div>
                            </div>
                    </div>   
                </div>
                <div class='col-sm-2'></div>
            </div>";
        $num--;
        $select="";
    }
    } else {
    header('location:error.php');
    }
    ?>
</div>


<div class="container">
    <div class="row">
        <div class="col-sm-12">
            <span class="text-center">
                <a href="welcome.php">Home</a>&nbsp;&nbsp;|&nbsp;&nbsp;
                <a href="logout.php">Logout</a>
            </span>
        </div>
    </div>
</div>


