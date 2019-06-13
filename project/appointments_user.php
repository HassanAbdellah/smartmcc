<!--
/**
 * Created by Hassan Abdella.
 * Date: 02/10/2019
 */-->


<?php
    include 'header.php';
    session_start();
    require 'config.php';
    $doctor_id="";
    $mmm = "SELECT * FROM userinfo WHERE email = '" . $_SESSION['loginEmail'] . "'";
    $sql_user=mysqli_query($con,$mmm);
    if(mysqli_num_rows($sql_user)){
        $row = mysqli_fetch_array($sql_user);
        $user_id = $row['id'];
}

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

	table {
	  width:100%;
	}
	table, th, td {
	  border: 1px solid black;
	  border-collapse: collapse;
	}
	th, td {
	  padding: 15px;
	  text-align: left;
	}
	table#t01 tr:nth-child(even) {
	  background-color: #eee;
	}
	table#t01 tr:nth-child(odd) {
	 background-color: #fff;
	}
	table#t01 th {
	  background-color: black;
	  color: white;
	}

</style>
<html>
    <head>
        <title></title>
    </head>
    <body>
        <center>
        <div class='userbox'>
        <H2>Appointments</H2><br>
            <?php
            if (isset($_SESSION['loginEmail'])) {
                $result = mysqli_query($con, "SELECT * FROM user_reservation 
                    WHERE user_id = '$user_id'  
                    ORDER BY doctor_id
                    ");

                // display data in table
                echo "<table border='1' cellpadding='10' id='t01'>";

                echo "<tr><th><center>Appointment ID</center></th> <th><center>User ID</center></th> <th><center>Doctor Name</center></th> <th><center>DATE</center></th> <th><center>TIME</center></th>  <th></th><th></th></tr>";


                // loop through results of database query, displaying them in the table

                while($row = mysqli_fetch_array( $result )) {


				    $res2 = mysqli_query($con, 'SELECT name from doctors WHERE id = "'.$row['doctor_id'].'"');
				    $result2=mysqli_fetch_assoc($res2);
				    $docName=$result2['name'];


                // echo out the contents of each row into a table

                echo "<tr>";

                echo '<td><center>' . $row['id'] . '</center></td>';

                echo '<td><center>' . $row['user_id'] . '</center></td>';

                echo '<td><center>' . $docName . '</center></td>';

                echo '<td><center>' . $row['date'] . '</center></td>';

                echo '<td><center>' . $row['time'] . '</center></td>';

                //echo '<td><a href="update_appointment.php?id=' . $row['id'] . '">Edit</a></td>';

                echo '<td><center><a href="delete_appointment.php?id=' . $row['id'] . '">Delete</a></center></td>';
                if($row['confirmed']==0)
                {
                	echo '<td><center><form action="https://www.paypal.com/cgi-bin/webscr" method="post" target="_top">
						<input type="hidden" name="cmd" value="_s-xclick">
						<input type="hidden" name="hosted_button_id" value="EZU8656SG67XN">
						<input type="image" src="https://www.paypalobjects.com/en_US/i/btn/btn_paynowCC_LG.gif" border="0" name="submit" alt="PayPal - The safer, easier way to pay online!">
						<img alt="" border="0" src="https://www.paypalobjects.com/en_US/i/scr/pixel.gif" width="1" height="1">
						</form></center></td>';
				}
				else {
					echo '<td><center></center></td>';
				}

                echo "</tr>";

                }

                // close table>

                echo "</table>";

            } else {
            header('location:error.php');
            }
            ?></div>
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <span class="text-center">
                        <a href="timeline/timeline.php">Home</a>&nbsp;&nbsp;|&nbsp;&nbsp;
                        <a href="logout.php">Logout</a>
                    </span>
                </div>
            </div>
        </div><center>

    </body>
</html>