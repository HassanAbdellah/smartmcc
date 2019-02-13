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

    if (isset($_SESSION['loginEmail'])) {
    require 'config.php';
    $d = mysqli_query($con, "SELECT * FROM userinfo");
    $num = mysqli_num_rows($d);
    while($num>0) {
        $result = mysqli_fetch_assoc($d);
        $id=$result['id'];
        $fName = $result['fName'];
        $lName = $result['lName'];
        $email = $result['email'];        

        $sql_doc=mysqli_query($con,"SELECT * FROM user_reservation WHERE user_id = '".$id."' ");
        if(mysqli_num_rows($sql_doc)){
            $div= '<div name="select">';
            while($rs=mysqli_fetch_array($sql_doc)){
                $div.='<label value="'.$rs['id'].'">'."Day: ".$rs['date']." time ".$rs['time'].'</label>';
                echo $div;
            }
            echo'</div>';
        }
        $num--;
        $div="";
    }
    } else {
    header('location:error.php');
    }
    ?></div>
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