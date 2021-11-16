<?php
session_start();

$username = "";
$email = "";

$errors = array();

$db = mysqli_connect('localhost:3307','root','', 'registration') or die("Could not connect to database");

if (isset($_POST['reg_user'])) {

  $username = mysqli_real_escape_string($db, $_POST['username']);
  $email = mysqli_real_escape_string($db, $_POST['email']);
  $password_1 = mysqli_real_escape_string($db, $_POST['password_1']);
  $password_2 = mysqli_real_escape_string($db, $_POST['password_2']);



// check db for existing user with same username


  $user_check_query = "SELECT * FROM user WHERE username = '$username' OR email = '$email' LIMIT 1";

  $results = mysqli_query($db, $user_check_query);
  $user = mysqli_fetch_assoc($results);

  if($user) {
    if($user['username'] == $username){
      array_push($errors, "Numele deja exista");
    }
    if($user['email'] == $email){
      array_push($errors, "Acest email deja este inregistrat");
    }
  }


// register user if no error

  if(count($errors) == 0){

    $password = md5($password_1); // for encryption
    $query = "INSERT INTO user (username, email, password) VALUES ('$username', '$email','$password')";


    mysqli_query($db, $query);
    $_SESSION['username'] = $username;
    $_SESSION['success'] = "Acum esti logat";


    header("location: index.php");
  }
}


// login user

if (isset($_POST['login_user'])) {
  $username = mysqli_real_escape_string($db, $_POST['username']);
  $password = mysqli_real_escape_string($db, $_POST['password']);


  if (count($errors) == 0) {
  	$password = md5($password);
  	$query = "SELECT * FROM user WHERE username='$username' AND password='$password'";
  	$results = mysqli_query($db, $query);
  	if (mysqli_num_rows($results) == 1) {
  	  $_SESSION['username'] = $username;
  	  $_SESSION['success'] = "Acum esti logat";
  	  header('location: index.php');
  	}else {
  		array_push($errors, "Username sau parola gresita");
  	}
  }
}


?>