<!--
/**
 * Created by Hassan Abdella.
 * Date: 02/10/2019
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

    .card {
        background-color: white;
        box-shadow: rgba(10, 10, 10, 0.1) 0px 2px 3px, rgba(10, 10, 10, 0.1) 0px 0px 0px 1px;
        border-style: solid;
        border-width: 5px;
        color: rgb(74, 74, 74);
        max-width: 100%;
    
    }

</style>

<div class='userbox'>
<label>Appointment</label><br>
    <?php 
        session_start();
        require 'config.php';
        $n = mysqli_query($con, "SELECT * FROM user_reservation ORDER BY doctor_id" );
        if(mysqli_num_rows($n)){
            $dat_res = mysqli_fetch_assoc($n);
            $id=$dat_res['id'];
            $user_id = $dat_res['user_id'];
            $doctor_id = $dat_res['doctor_id'];
            $date=$dat_res['date'];
            $time = $dat_res['time'];
            $div= '<div >';
            while($dat_res=mysqli_fetch_array($n)){
            $div.='<div class="card" value="'.$dat_res['id'].'">'." Appointment Number : ".$dat_res['id']." User id is ".$dat_res['user_id']." and Doctor id : ".$dat_res['doctor_id']." at ".$dat_res['date']." - ".$dat_res['time'].'</div>'."<hr>";
            }
        }
        $div.='</div>';
        echo $div;
    ?>
</div>
<div class="container">
    <div class="row">
        <div class="col-sm-12">
            <span class="text-center">
                <a href="welcome_Admin.php">Home</a>&nbsp;&nbsp;|&nbsp;&nbsp;
                <a href="logout.php">Logout</a>
            </span>
        </div>
    </div>
</div>