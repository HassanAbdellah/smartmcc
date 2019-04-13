<!DOCTYPE html>

<?php
session_start();
require 'connect.php';
if (isset($_SESSION['loginEmail'])) {
    $alt = $_SESSION['file_name'].'.'.$_SESSION['file_ext'];
} else {
    header('../location:error.php');
}
include '../header.php';
?>

<html>

<head>

     <title>Welcome</title>

     <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>

     <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />

     <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

    <script>
        $(document).ready(function(){
        // updating the view with notifications using ajax
        function load_unseen_notification(view = '')
        {
            $.ajax({
                url:"fetch.php",
                method:"POST",
                data:{view:view},
                dataType:"json",
                success:function(data)
                {
                    $('.dropdown-menu').html(data.notification);
                    if(data.unseen_notification > 0)
                    {
                        $('.count').html(data.unseen_notification);
                    }
                }
            });
        }
        load_unseen_notification();
        
        // load new notifications
        $(document).on('click', '.dropdown-toggle', function(){
        $('.count').html('');
        load_unseen_notification('yes');
        });
        setInterval(function(){
        load_unseen_notification();;
        }, 5000);
        });
    </script>
</head>

<body>

 <br /><br />

 <div class="container">

  <nav class="navbar navbar-inverse">

   <div class="container-fluid">

    <div class="navbar-header">

    <a class="navbar-brand" href="#"><?PHP echo"WELCOME ".($_SESSION['fName'] . " " . $_SESSION['lName']); ?>                    <div class="img-circle" align="middle">
                            <img style="height: 65px;width: 65px;" src="../img/uploads/<?php echo $alt ?>" class="img-circle" alt="Profile pic">
                        </div>
    </a>

    </div>

    <ul class="nav navbar-nav navbar-right">

     <li class="dropdown">

      <a href="#" class="dropdown-toggle" data-toggle="dropdown"><span class="label label-pill label-danger count" style="border-radius:10px;"></span> <span class="glyphicon glyphicon-bell" style="font-size:18px;"></span></a>

      <ul class="dropdown-menu"></ul>

     </li>

    </ul>

   </div>

  </nav>

  <br />
 </div>
         <!-- My Account -->
<div class="container">
    <div class="container-fluid">
        <div class="row">
            <form method="post">
                <div class="col-sm-3">
                    <div class="input-group">
                        <span class="glyphicon glyphicon-user"></span>
                        <label>My Account </label>
                    </div>
                    <hr size="80%" noshade>
                    <div class="form-inline form-group input-group ">
                        <input type="search" class="form-control" name="searchText" placeholder="Search user by Email">
                        <div class="input-group-addon">
                            <button type="submit" name="searchUser" style="background-color:transparent; border: transparent" class="glyphicon glyphicon-search"></button>
                        </div>
                    </div> 
                    <hr size="80%">
                    <div class="input-group">
                        <span class="glyphicon glyphicon-edit"></span>
                        <label><a href="info.php">Edit Profile</a> </label>
                    </div>
    <!-- Reservation -->
                    <hr size="80%">
                    <div class="input-group">
                        <span class="glyphicon glyphicon-pencil"></span>
                        <label class="active" for="Reserve"><a href="../Reserve.php">Reserve an appointment</a> </label>
                    </div>

                    <hr size="80%">
                    <div class="input-group">
                        <span class="glyphicon glyphicon-file"></span>
                        <label><a href="../Appointments_user.php">My Appointments</a> </label>
                    </div>

                    <hr size="80%">
                    <div class="input-group">
                        <span class="glyphicon glyphicon-eye-open"></span>
                        <label><a href="../viewdoctor.php">View all Doctors</a> </label>
                    </div>
                    <hr size="80%">
                    <div class="input-group">
                        <span class="glyphicon glyphicon-log-out"></span>
                        <label><a href="../logout.php">Logout</a> </label>
                    </div>
                    <hr size="80%">
                    <div class="input-group">
                        <span class="glyphicon glyphicon-trash"></span>
                        <label><a href="../delete.php">Deactivate Account</a> </label>
                    </div>
                    <hr size="80%">
                </div>

              </form>
            </div>
          </div>
        </div>

</body>

</html>