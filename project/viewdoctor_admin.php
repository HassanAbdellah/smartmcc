<!--
/**
 * Created by Hassan Abdella.
 * Date: 13/06/2019
 */-->
 
<?php
    include 'header.php';
?>

<style>
	html *
	{
	   font-size: 15px !important;
	   /*color: #000 !important;*/
	   font-family: Arial !important;
	}
    .userbox {
        background: #fff none repeat scroll 0 0;
        box-shadow: 0 0 1px;
        padding: 20px;
        margin-bottom: 20px;
    }
    .img{
    	border-radius: 50%;
        height: 150px;
        width: 150px;
    }
	.grid-container {
		border: 2px solid red;
  		border-radius: 5px;
	  display: grid;
	  grid-template-columns: auto auto auto auto auto auto;
	  grid-gap: 10px;
	  padding: 10px;
	  margin: 10px;
	}

	.grid-container > div {

	  /*text-align: center;*/
	  padding: 20px 0;
	}

	.item1 {
	  grid-column: 1 / 3;
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
        $select="";
        


        $sql_doc=mysqli_query($con,"SELECT * FROM available_dates WHERE doctor_id = $id ORDER BY date ASC, time ASC");
        if(mysqli_num_rows($sql_doc)){
            $select= '<select name="select">';
            while($rs=mysqli_fetch_array($sql_doc)){
            $select.='<option value="'.$rs['id'].'">'."Day: ".$rs['date']." time ".$rs['time'].'</option>';
            }
        }
        $select.='</select>';


        echo"<div class='grid-container'>
               <div class='item1'>
        			<img src='img/Doctors/$img' class='img'>
        		</div><br>
        		<div>
        			<div><span style=' font-weight:bold'> Doctor: </span>".$name."</div>
        			<div><span style=' font-weight:bold'>Specialization: </span>".$specialization."</div>
        			<div><span style=' font-weight:bold'>Informations: </span>".$info."</div>
        		</div>
        		<div class='column'>
        			<div><span style=' font-weight:bold'>Location: </span>".$location_text."</div>
        			<div><span style=' font-weight:bold'>Phone: </span>".$phones."</div>
        			<div><span style=' font-weight:bold'>Fees: </span>".$fees."</div>
        		</div>
        		<div class='column'>
        			<div><span style=' font-weight:bold'>Working Time : </span>".$working_time."</div>
        			<div><span style=' font-weight:bold'>Available Dates: </span>".$select."</div>
        			<div><span style=' font-weight:bold'><a href=#>Edit</a></span></div>
        		</div>
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
    <center><div class="row">
        <div class="col-sm-12">
            <span class="text-center">
                <a href="welcome_admin.php">Home</a>&nbsp;&nbsp;|&nbsp;&nbsp;
                <a href="logout.php">Logout</a>
            </span>
        </div>
    </div></center><br>
</div>


