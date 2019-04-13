<?php
session_start();
$user_id = "";

include('connect.php');


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

$query = "SELECT * FROM user_reservation WHERE user_id = $user_id ORDER BY id DESC";
$result = mysqli_query($con, $query);
$output = '';

if(mysqli_num_rows($result) > 0)
{

while($row = mysqli_fetch_array($result))

{

  $output .= '
  <li>
  <a href="#">
  <strong>R: '.$row["date"].'</strong><br />
  <small><em>'.$row["time"].'</em></small>
  </a>
  </li>

  ';
}
}

else{
    $output .= '<li><a href="#" class="text-bold text-italic">No Noti Found</a></li>';
}

$status_query = "SELECT * FROM user_reservation WHERE status=0";
$result_query = mysqli_query($con, $status_query);
$count = mysqli_num_rows($result_query);

$data = array(
   'notification' => $output,
   'unseen_notification'  => $count
);

echo json_encode($data);
}
?>