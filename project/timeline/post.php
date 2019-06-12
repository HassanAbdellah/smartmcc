<!doctype html>

<?php
session_start();
require 'connect.php';
//$notif="False";
if (isset($_SESSION['loginEmail'])) {
    $alt = $_SESSION['file_name'].'.'.$_SESSION['file_ext'];
} else {
    header('../location:error.php');
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
	

		<ul class="timeline">
			<li>
				<div class="avatar">
          		<img src="../img/uploads/<?php echo $alt ?>">

				</div>
				<div class="bubble-container">
					<div class="bubble">

						<h3><?php echo ($_SESSION['fName'].$_SESSION['lName']); ?></h3> Bla Bla Bla <h3>Reserve</h3><br/>
					Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ea, iusto, maxime, ullam autem a voluptate rem quos repudiandae.

					</div>
					
					<div class="arrow"></div>
				</div>
			</li>
			
		</ul>

	</div>
</body>
</html>