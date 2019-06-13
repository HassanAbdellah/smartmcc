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
    table, th, td {
        border: 3px solid black;
        background-color: lightgrey;
        margin: 5px;
        padding: 5px;
}

</style>
<html>
    <head>
        <title></title>
    </head>
    <body>
        <center>
        <div class='userbox'>
        <H3>Appointment</H3><br>
            <?php
            session_start();

            if (isset($_SESSION['loginEmail'])) {
                require 'config.php';
                $result = mysqli_query($con, "SELECT * FROM user_reservation 
                    WHERE user_id IN 
                    (SELECT id FROM userinfo) ORDER BY doctor_id")
                or die(mysqli_error());



                // display data in table
                echo "<table border='1' cellpadding='10'>";

                echo "<tr> <th>Appointmetn ID</th> <th>User Name</th> <th>Doctor Name</th> <th>Date</th> <th>Time</th>  <th></th></tr>";


                // loop through results of database query, displaying them in the table

                while($row = mysqli_fetch_array( $result )) {

                    $res2 = mysqli_query($con, 'SELECT name from doctors WHERE id = "'.$row['doctor_id'].'"');
                    $result2=mysqli_fetch_assoc($res2);
                    $docName=$result2['name'];

                    $res3 = mysqli_query($con, 'SELECT * from userinfo WHERE id = "'.$row['user_id'].'"');
                    $result3=mysqli_fetch_assoc($res3);
                    $patientName=$result3['fName']." ".$result3['lName'];


                // echo out the contents of each row into a table

                echo "<tr>";

                echo '<td>' . $row['id'] . '</td>';

                echo '<td>' . $patientName . '</td>';

                echo '<td>' . $docName . '</td>';

                echo '<td>' . $row['date'] . '</td>';

                echo '<td>' . $row['time'] . '</td>';

                //echo '<td><a href="update_appointment.php?id=' . $row['id'] . '">Edit</a></td>';

                echo '<td><a href="delete.php?id=' . $row['id'] . '">Delete</a></td>';

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
                        <a href="welcome_admin.php">Home</a>&nbsp;&nbsp;|&nbsp;&nbsp;
                        <a href="logout.php">Logout</a>
                    </span>
                </div>
            </div>
        </div><center>
            
    </body>
</html>