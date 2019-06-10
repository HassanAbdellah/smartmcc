<!--
/**
 * Created by Hassan Abdella.
 * Date: 02/10/2019
 */-->


<?php
    include 'header.php';
    session_start();
    require 'config.php';
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
            if (isset($_SESSION['loginEmail'])) {
                $result = mysqli_query($con, "SELECT * FROM user_reservation 
                    WHERE user_id = '$user_id'  
                    ORDER BY doctor_id
                    ");



                // display data in table
                echo "<table border='1' cellpadding='10'>";

                echo "<tr> <th>ID</th> <th>USER ID</th> <th>DOCTOR ID</th> <th>DATE</th> <th>TIME</th> <th></th> <th></th></tr>";


                // loop through results of database query, displaying them in the table

                while($row = mysqli_fetch_array( $result )) {



                // echo out the contents of each row into a table

                echo "<tr>";

                echo '<td>' . $row['id'] . '</td>';

                echo '<td>' . $row['user_id'] . '</td>';

                echo '<td>' . $row['doctor_id'] . '</td>';

                echo '<td>' . $row['date'] . '</td>';

                echo '<td>' . $row['time'] . '</td>';

                echo '<td><a href="update_appointment.php?id=' . $row['id'] . '">Edit</a></td>';

                echo '<td><a href="delete_appointment.php?id=' . $row['id'] . '">Delete</a></td>';

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