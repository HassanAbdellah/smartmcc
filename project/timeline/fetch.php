<?php
session_start();
$user_id = "";
$notifi="";
$counter=0;
include('connect.php');


date_default_timezone_set('africa/cairo');
$Currdate = date("Y-m-d h:i:sa", strtotime("now"));



$mmm = "SELECT * FROM userinfo WHERE email = '" . $_SESSION['loginEmail'] . "'";
$sql_user=mysqli_query($con,$mmm);
if(mysqli_num_rows($sql_user)){
    $row = mysqli_fetch_array($sql_user);
    $user_id = $row['id'];

}

if(isset($_POST['view'])){

// $con = mysqli_connect("localhost", "root", "", "practise");

if($_POST["view"] != '')

{
   $update_query = "UPDATE user_reservation SET status = 1 WHERE status=0";
   mysqli_query($con, $update_query);
}

$query = "SELECT * FROM user_reservation WHERE user_id = $user_id ORDER BY date ASC";
$result = mysqli_query($con, $query);

$output = '';

if(mysqli_num_rows($result) > 0)
{

while($row = mysqli_fetch_array($result))

{
  $lastDate=$row['date'];
  $diff = abs(strtotime($lastDate) - strtotime($Currdate));
  if($diff<86400){
    $notifi="very soon";
    $counter++;
  }

  $output .= '
  <li>
  <a href="#">
  <strong style="color:red;">'.$notifi.'</strong><br />
  You have an appointment : <strong>'.$row["date"].'</strong><br />
  <small><em>'.$row["time"].'</em></small>
  </a>
  </li>

  ';
    $notifi="";
}
}

else{
    $output .= '<li><a href="#" class="text-bold text-italic">No Noti Found</a></li>';
}
/*
$status_query = "SELECT * FROM user_reservation WHERE status=0";
$result_query = mysqli_query($con, $status_query);
$count = mysqli_num_rows($result_query);
*/
$data = array(
   'notification' => $output,
   'unseen_notification'  => $counter
   //'unseen_notification'  => $count
);

echo json_encode($data);

}
?>