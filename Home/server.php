<?php
session_start();

// initializing variables
$username = "";
$email    = "";
$id = "";
$firstname = "";
$lastname = "";
$gender = "";
$phone = "";
$birthdate = "";
$address = "";
$governorate = "";
$Diseases = "";
$reason = "";
$speci = "";
$dataofappo = "";
$time = "";
$visit = "";
$errors = array(); 

// connect to the database
$db = mysqli_connect('localhost', 'root', '', 'authentication');

// REGISTER USER
if (isset($_POST['reg_user'])) {
  // receive all input values from the form
  $username = mysqli_real_escape_string($db, $_POST['username']);
  $username = strtolower($username);
  $username = ucwords($username);
  $email = mysqli_real_escape_string($db, $_POST['email']);
  $password_1 = mysqli_real_escape_string($db, $_POST['password_1']);
  $password_2 = mysqli_real_escape_string($db, $_POST['password_2']);

  // form validation: ensure that the form is correctly filled ...
  // by adding (array_push()) corresponding error unto $errors array
  if (empty($username)) { array_push($errors, "Username is required"); }
  if (empty($email)) { array_push($errors, "Email is required"); }
  if (empty($password_1)) { array_push($errors, "Password is required"); }
  if ($password_1 != $password_2) {
	array_push($errors, "The two passwords do not match");
  }

  // first check the database to make sure 
  // a user does not already exist with the same username and/or email
  $user_check_query = "SELECT * FROM reg_users WHERE username='$username' OR email='$email' LIMIT 1";
  $result = mysqli_query($db, $user_check_query);
  $user = mysqli_fetch_assoc($result);
  
  if ($user) { // if user exists
    if ($user['username'] === $username) {
      array_push($errors, "Username already exists");
    }

    if ($user['email'] === $email) {
      array_push($errors, "email already exists");
    }
  }

  // Finally, register user if there are no errors in the form
  if (count($errors) == 0) {
  	$password = md5($password_1);//encrypt the password before saving in the database

  	$query = "INSERT INTO reg_users (username, email, password) 
  			  VALUES('$username', '$email', '$password')";
  	mysqli_query($db, $query);


    //Add an empty row in profile_data and reservation with the same id
    $sql = "SELECT id FROM reg_users";
    $_result = mysqli_query($db, $sql);

    if (mysqli_num_rows($_result) > 0) {
        // output data of each row
        while($row = mysqli_fetch_assoc($_result)) {
          $id = $row["id"];
        }
    }

    $qry = "INSERT INTO profile_data (id) VALUES('$id')";
    $qry2 = "INSERT INTO reservation (id) VALUES('$id')";
    mysqli_query($db, $qry);
    mysqli_query($db, $qry2);





    //mysqli_query($db, "INSERT INTO `profile_data` (`id`) VALUES ('session_id()')");
  	$_SESSION['username'] = $username;
  	$_SESSION['success'] = "You are now logged in";
    header('location: data.php');
  }

}

// ... 


//select id to update after that
$sql = "SELECT id FROM reg_users";
$_result = mysqli_query($db, $sql);

if (mysqli_num_rows($_result) > 0) {
    // output data of each row
    while($row = mysqli_fetch_assoc($_result)) {
      $id = $row["id"];
    }
}


// LOGIN USER
if (isset($_POST['login_user'])) {
  $username = mysqli_real_escape_string($db, $_POST['username']);
  $password = mysqli_real_escape_string($db, $_POST['password']);

  if (empty($username)) {
    array_push($errors, "Username is required");
  }
  if (empty($password)) {
    array_push($errors, "Password is required");
  }

  if (count($errors) == 0) {
    $password = md5($password);
    $query = "SELECT * FROM reg_users WHERE username='$username' AND password='$password'";
    $results = mysqli_query($db, $query);
    if (mysqli_num_rows($results) == 1) {
      $_SESSION['username'] = $username;
      $_SESSION['success'] = "You are now logged in";
      header('location: index.php');
    }else {
      array_push($errors, "Wrong username/password combination");
    }
  }

}

//...


//server2 for data.php

if (isset($_POST['enter'])) {
  // receive all input values from the form
  $firstname = mysqli_real_escape_string($db, $_POST['firstname']);
  $lastname = mysqli_real_escape_string($db, $_POST['lastname']);
  $gender = mysqli_real_escape_string($db, $_POST['gender']);
  $phone = mysqli_real_escape_string($db, $_POST['phone']);
  $birthdate = mysqli_real_escape_string($db, $_POST['birthdate']);
  $address = mysqli_real_escape_string($db, $_POST['address']);
  $governorate = mysqli_real_escape_string($db, $_POST['governorate']);
  $Diseases = mysqli_real_escape_string($db, $_POST['diseases']);
}
// REGISTER profile_data
if (isset($_POST['enter'])) {
  // receive all input values from the form
  $firstname = mysqli_real_escape_string($db, $_POST['firstname']);
  $lastname = mysqli_real_escape_string($db, $_POST['lastname']);
  $gender = mysqli_real_escape_string($db, $_POST['gender']);
  $phone = mysqli_real_escape_string($db, $_POST['phone']);
  $birthdate = mysqli_real_escape_string($db, $_POST['birthdate']);
  $address = mysqli_real_escape_string($db, $_POST['address']);
  $governorate = mysqli_real_escape_string($db, $_POST['governorate']);
  $Diseases = mysqli_real_escape_string($db, $_POST['diseases']);

  // form validation: ensure that the form is correctly filled ...
  // by adding (array_push()) corresponding error unto $errors array
  if (empty($firstname)) { array_push($errors, "first name is required"); }
  if (empty($lastname)) { array_push($errors, "last name is required"); }
  if (empty($gender)) { array_push($errors, "your gender is required"); }
  if (empty($phone)) { array_push($errors, "phone number is required"); }
  if (empty($birthdate)) { array_push($errors, "date is required"); }


  // Finally, register user if there are no errors in the form
   if (count($errors) == 0) {
    $sqli = "UPDATE profile_data SET firstname = '$firstname', lastname = '$lastname', gender = '$gender', phone = '$phone', birthdate = '$birthdate', address = '$address', governorate = '$governorate', diseases = '$Diseases' WHERE profile_data.id = $id";
    mysqli_query($db, $sqli);
    header('location: index.php');
    //echo "Everything OK";
  }
}

//...


//server3 for reserve.php

if (isset($_POST['reserve'])) {
  // receive all input values from the form
  $reason = mysqli_real_escape_string($db, $_POST['reason']);
  $speci = mysqli_real_escape_string($db, $_POST['speci']);
  $dataofappo = mysqli_real_escape_string($db, $_POST['dataofappo']);
  $time = mysqli_real_escape_string($db, $_POST['time']);
  $visit = mysqli_real_escape_string($db, $_POST['visit']);

}
// REGISTER reservation
if (isset($_POST['reserve'])) {

  // receive all input values from the form
  $reason = mysqli_real_escape_string($db, $_POST['reason']);
  $speci = mysqli_real_escape_string($db, $_POST['speci']);
  $dataofappo = mysqli_real_escape_string($db, $_POST['dataofappo']);
  $time = mysqli_real_escape_string($db, $_POST['time']);
  $visit = mysqli_real_escape_string($db, $_POST['visit']);


  // form validation: ensure that the form is correctly filled ...
  // by adding (array_push()) corresponding error unto $errors array
  if (empty($reason)) { array_push($errors, "reason is required"); }
  if (empty($speci)) { array_push($errors, "specification is required"); }
  if (empty($dataofappo)) { array_push($errors, "date of appointment is required"); }
  if (empty($time)) { array_push($errors, "time is required"); }
  if (empty($visit)) { array_push($errors, "visit is required"); }

  // Finally, register user if there are no errors in the form
   if (count($errors) == 0) {
    $sqlii = "UPDATE reservation SET reason = '$reason', speci = '$speci', dataofappo = '$dataofappo', time = '$time', visit = '$visit' WHERE reservation.id = $id";
    mysqli_query($db, $sqlii);
    header('location: index.php');
    //echo "Everything OK";
  }
}
