<!--
/**
 * Created by Hassan Abdella.
 * Date: 02/10/2019
 */-->

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

<?php
    include 'header.php';
    session_start();
    require 'config.php';
    $d = mysqli_query($con, "SELECT * FROM userinfo");
    $num = mysqli_num_rows($d);
    while($num>0) {
        $result = mysqli_fetch_assoc($d);
        $id=$result['id'];
        $fName = $result['fName'];
        $lName = $result['lName'];
        $n = mysqli_query($con, "SELECT * FROM user_reservation WHERE user_id = $id" );
        if(mysqli_num_rows($n)){
            $dat_res = mysqli_fetch_assoc($n);
            $id=$dat_res['id'];
            $user_id = $dat_res['user_id'];
            $doctor_id = $dat_res['doctor_id'];
            $date=$dat_res['date'];
            $time = $dat_res['time'];
            $div= '<div >';
            while($dat_res=mysqli_fetch_array($n)){
            $div.='<div class="card">'." Appointment Number : ".$dat_res['id']." Your name is : ".$result['fName'].$result['lName']." User id is ".$dat_res['user_id']." and Doctor id : ".$dat_res['doctor_id']." at ".$dat_res['date']." - ".$dat_res['time'].'</div>'."<hr>";
            }
        }
        $div.='</div>';
        echo $div;
        $num--;
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