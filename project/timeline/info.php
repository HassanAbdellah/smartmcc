<!--
/**
 * Created by Hassan Abdella.
 * Date: 02/05/2019
 */-->
 

<!DOCTYPE html>

<?php
session_start();
require '../config.php';

if ($_SESSION['gender']==0) {
    $gen = "Male";
} elseif ($_SESSION['gender']==1) { 
    $gen = "Female";
}

if (isset($_SESSION['loginEmail'])) {
    $alt = $_SESSION['file_name'].'.'.$_SESSION['file_ext'];
} else {
    header('location:../error.php');
}
include '../header.php';
?>


<html>

<head>
    <title>Welcome</title>

    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
    <script src="//netdna.bootstrapcdn.com/bootstrap/3.1.1/js/bootstrap.min.js"></script>
    <link rel="stylesheet" type="text/css" href="//netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap.min.css">

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

                    <!----- Info ---->
                <div class="col-sm-4">
                    <div class="input-group">
                        <span class="glyphicon glyphicon-user"></span>
                        <label><?php echo "Hello: <b><font color='green'>" . $_SESSION['fName'] . " " . $_SESSION['lName'] . "</font> </b>" ?></label>
                        <a  href="edit/editName.php"><span class="glyphicon glyphicon-edit"></span></a>

                    </div>
                    <hr size="80%" noshade>
                    <div class="input-group">
                        <span class="glyphicon glyphicon-envelope"></span>
                        <label><?php echo "Email: <b><font color='green'>" . $_SESSION['loginEmail'] . "</font></b>" ?></label>


                    </div>
                    <hr size="80%">
                    <div class="input-group">
                        <span class="glyphicon glyphicon-user"></span>
                        <label><?php echo "Gender: <b><font color='green'>" . $gen . "</font></b>" ?></label>
                        <a  href="edit/editGender.php"><span class="glyphicon glyphicon-edit"></span></a>

                    </div>
                    <hr size="80%">
                    <div class="input-group">
                        <span class="glyphicon glyphicon-earphone"></span>
                        <label><?php echo "Mobile: <b><font color='green'>" . $_SESSION['mobile'] . "</font></b>" ?></label>
                        <a  href="edit/editMobile.php"><span class="glyphicon glyphicon-edit"></span></a>
                    </div>
                    <hr size="80%">
                    <div class="input-group">
                        <span class="glyphicon glyphicon-home"></span>
                        <label><?php echo "Address: <b><font color='green'>" . $_SESSION['address'] . "</font></b>" ?></label>
                        <a  href="edit/editAddress.php"><span class="glyphicon glyphicon-edit"></span></a>
                    </div>
                    <hr size="80%">
                    <div class="input-group">
                        <span class="glyphicon glyphicon-time"></span>
                        <label><?php echo "Birth date: <b><font color='green'>" . $_SESSION['bdate'] . "</font></b>" ?></label>
                        <a  href="edit/editBD.php"><span class="glyphicon glyphicon-edit"></span></a>
                    </div>
                    <hr size="80%">
                    <div class="input-group">
                        <span class="glyphicon glyphicon-calendar"></span>
                        <label><?php echo "Reg. Date: <b><font color='green'>" . $_SESSION['reg_date'] . "</font></b>" ?></label>
                    </div>
                    <hr size="80%">
                    <div class="input-group">
                        <span class="glyphicon glyphicon-time"></span>
                        <label><?php echo "Last update: <b><font color='green'>" . $_SESSION['upd_date'] . "</font></b>" ?></label>
                    </div>
                    <hr size="80%">
                </div>
                <!-- Profile pic -->
                <div class="col-sm-5">
                    <div class="col-sm-12 img-circle" align="middle">
                        <a  href="edit/editPic.php"><img src="../img/uploads/<?php echo $alt ?>" class="img-circle" height="250px" width="250px"
                             alt="Profile pic">
                             <span class="glyphicon glyphicon-edit"></span></a>

                    </div>

                </div>
</div>

</body>
</html>
