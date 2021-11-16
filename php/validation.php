<?php 

 $errors = array();
 $errors2 = array();

if(isset($_POST['send'])) {


  $name = $_POST['name'];
  $email = $_POST["email"];
  $phone = $_POST["phone"];
  $subject = $_POST["subject"];
  $message = $_POST["message"];

  if(empty($name)){
    $name_error = "Introduceti un nume";
    array_push($errors, 1);
  }

  if(empty($email)){
    $email_error = "Introduceti un e-mail";
    array_push($errors, 1);
  }

  if(empty($phone)){
    $phone_error = "Introduceti un nr. de telefon";
    array_push($errors, 1);
  }

  if(empty($subject)){
    $subject_error = "Introduceti un subiect";
    array_push($errors, 1);
  }

  if(empty($message)){
    $message_error = "Introduceti un mesaj";
    array_push($errors, 1);
  }



  if(!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    $email_error = "Introduceti un e-mail valid";
    array_push($errors, 1);
  }

  if(!is_numeric($phone)) {
    $phone_error = "Introduceti un nr. de telefon valid";
    array_push($errors, 1);
  }

  if(mb_strlen($phone) < 10){
    $phone_error = "Nr. de telefon trebuie sa aiba cel putin 10 cifre";
    array_push($errors, 1);
  }
}


if(isset($_POST['reg_user'])) {


  $username = $_POST['username'];
  $email = $_POST["email"];
  $password_1 = $_POST["password_1"];
  $password_2 = $_POST["password_2"];

  if(empty($username)){
    $username_error = "Introduceti un username";
    array_push($errors2, 1);
  }

  if(empty($email)){
    $email_error = "Introduceti un e-mail";
    array_push($errors2, 1);
  }

  if(empty($password_1)){
    $password_error_1 = "Introduceti o parola";
    array_push($errors2, 1);
  }

  if(empty($password_2)){
    $password_error_2 = "Confirmati parola";
    array_push($errors2, 1);
  }



  if(!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    $email_error = "Introduceti un e-mail valid";
    array_push($errors2, 1);
  }

  $uppercase = preg_match('@[A-Z]@', $password_1);
  $lowercase = preg_match('@[a-z]@', $password_1);
  $number = preg_match('@[0-9]@', $password_1);

  if(!$uppercase || !$lowercase || !$number || strlen($password_1) < 3){
    $password_error_1 = "Parola este prea simpla";
    array_push($errors2, 1);
  }
  if($password_2 != $password_1){
    $password_error_2 = "Parolele nu se potrivesc";
    array_push($errors2, 1);
  }

}


if(isset($_POST['login_user'])) {


  $username = $_POST['username'];
  $password = $_POST["password"];

  if(empty($username)){
    $username_error = "Introduceti un username";
    array_push($errors2, 1);
  }

  if(empty($password)){
    $password_error = "Introduceti o parola";
    array_push($errors2, 1);
  }

}

?>