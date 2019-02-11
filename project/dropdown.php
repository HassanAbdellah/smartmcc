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
    .card {
        background-color: white;
        box-shadow: rgba(10, 10, 10, 0.1) 0px 2px 3px, rgba(10, 10, 10, 0.1) 0px 0px 0px 1px;
        border-style: solid;
        border-width: 5px;
        color: rgb(74, 74, 74);
        max-width: 100%;
    
    }

</style>

<div class='row userbox'>
<label for="specialization" name="specialization">Doctor</label><br>
    <?php 
        session_start();
        require 'config.php';
        $n = mysqli_query($con, "SELECT * FROM available_dates " );
        if(mysqli_num_rows($n)){
            $dat_res = mysqli_fetch_assoc($n);
            $doctor_id=$dat_res['doctor_id'];
            $available_date = $dat_res['date'];
            $available_time = $dat_res['time'];
            $div= '<div >';
            while($dat_res=mysqli_fetch_array($n)){
            $div.='<div class="card" value="'.$dat_res['doctor_id'].'">'." ~~~~ ".$dat_res['doctor_id']." -".$dat_res['date']." -".$dat_res['time'].'</div>'."<hr>";
            }
        }
        $div.='</div>';
        echo $div;
    ?>
</div>
