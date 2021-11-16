<?php

    $hostname = "localhost:3307";
    $username = "root";
    $password = "";

    try {
        $connection = new PDO("mysql:host=$hostname;dbname=contacts", $username, $password);
        $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch(PDOException $e) {
        echo "Database connection failed: " . $e->getMessage();
    }


    if(!empty($_POST["send"])) {
      $name = $_POST["name"];
      $email = $_POST["email"];
      $phone = $_POST["phone"];
      $subject = $_POST["subject"];
      $message = $_POST["message"];
      $toMail = "pavel.gherciu@iis.utm.md";
      
      $header = "From: " . $name . "<". $email .">\r\n";
          
      if(count($errors) == 0){
        $sql = $connection->query("INSERT INTO contacts_list(name, email, phone, subject, message, sent_date)
        VALUES ('{$name}', '{$email}', '{$phone}', '{$subject}', '{$message}', now())");
        
        
        if(!$sql) {
          die("MySQL query failed.");
        } else {
          $response = array(
            "status" => "alert-success",
            "message" => "Am primit mesajul dumneavoastra. Va vom contacta in curand"
          );              
        }
      }
    }  
?>

