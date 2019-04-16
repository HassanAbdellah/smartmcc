<!doctype html>

<?php
session_start();
require 'connect.php';
if (isset($_SESSION['loginEmail'])) {
    $alt = $_SESSION['file_name'].'.'.$_SESSION['file_ext'];
} else {
    header('../location:error.php');
}
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