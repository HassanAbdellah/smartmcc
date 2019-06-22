<!doctype html>

<?php
session_start();
require 'connect.php';
$user_id = "";
//$notif="False";
if (isset($_SESSION['loginEmail'])) {
    $alt = $_SESSION['file_name'].'.'.$_SESSION['file_ext'];
} else {
    header('../location:error.php');
}

$mmm = "SELECT * FROM userinfo WHERE email = '" . $_SESSION['loginEmail'] . "'";
$sql_user=mysqli_query($con,$mmm);
if(mysqli_num_rows($sql_user)){
    $row = mysqli_fetch_array($sql_user);
    $user_id = $row['id'];
}




$query2 = "SELECT * FROM receipts WHERE user_id = $user_id ORDER BY date ASC";
$result2 = mysqli_query($con, $query2);
if(mysqli_num_rows($result2)){
    $row2 = mysqli_fetch_array($result2);
    $doctor_id2 = $row2['doctor_id'];
    $receipt = $row2['receipt'];
    $date2 = $row2['date'];
    $time2 = $row2['time'];

}


/*
date_default_timezone_set('africa/cairo');
$Currdate = date("Y-m-d h:i:sa", strtotime("now"));
$lastDate = "2019-06-10 15:44:00";
$diff = abs(strtotime($Currdate) - strtotime($lastDate));
if($diff<86400){
	$notif = "True";
}

$query = "SELECT id, ResDate from user_reservation ORDER BY ResDate DESC";
$result = $con->query($query);

while($row = $result->fetch_assoc()){
$appo[$row['id']][] = array("id" => $row['id'], "val" => $row['ResDate']);
}
*/
?>

<html lang="en">
<head>
   	<link href='https://fonts.googleapis.com/css?family=Quicksand:300,400' rel='stylesheet' type='text/css'>
	<link href='https://fonts.googleapis.com/css?family=Lato:400,300' rel='stylesheet' type='text/css'>
	<link href="https://netdna.bootstrapcdn.com/font-awesome/3.1.1/css/font-awesome.css" rel="stylesheet">
	<link rel="stylesheet" href="post.css">
    
</head>
<body>
	
            <?php
            if (isset($_SESSION['loginEmail'])) {
                $result = mysqli_query($con, "SELECT * FROM user_reservation 
                    WHERE user_id = '$user_id'  
                    ORDER BY ResDate DESC
                    ");


                $result_ = mysqli_query($con, "SELECT * FROM receipts 
                	WHERE user_id = $user_id 
                	ORDER BY date ASC
                	");
                // display data in table

                while($row = mysqli_fetch_array( $result )) {

                echo "
						<ul class='timeline'>
							<li>
								<div class='bubble-container'>
									<div class='bubble'><h3>".$_SESSION['fName'].$_SESSION['lName']."</h3> Reserves an appointment with DR. ";
				    $res2 = mysqli_query($con, 'SELECT name from doctors WHERE id = "'.$row['doctor_id'].'"');
				    $result2=mysqli_fetch_assoc($res2);
				    $docName=$result2['name'];

				    echo $docName ." at <span style='color:blue'>". $row['date']." ".$row['time']."</span>";

				echo"
			    	</div>
			    	<!--<div class='arrow'></div>-->
			    	</div>
			    	</li>
					</ul>";	
				}

                while($row_ = mysqli_fetch_array( $result_ )) {

                echo "
						<ul class='timeline'>
							<li>
								<div class='bubble-container'>
									<div class='bubble'>";
				    $res2 = mysqli_query($con, 'SELECT name from doctors WHERE id = "'.$row_['doctor_id'].'"');
				    $result2=mysqli_fetch_assoc($res2);
				    $docName=$result2['name'];

				    echo "DR. ".$docName ."";
				    echo "<img src='../img/receipts/".$row_['receipt']."' width='350px' height='400px'>";

				echo"
			    	</div>
			    	<!--<div class='arrow'></div>-->
			    	</div>
			    	</li>
					</ul>";	
				}

			}





            ?>



</body>
</html>