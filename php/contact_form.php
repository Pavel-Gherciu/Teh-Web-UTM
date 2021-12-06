<?php
    session_start();
    require_once 'connect_contact.php';
    
    $name = toCorrectString($_POST['name']);
    $email = toCorrectString($_POST['email']);
    $phone = toCorrectString($_POST['phone']);
    $subject = toCorrectString($_POST['subject']);
    $message = toCorrectString($_POST['message']);

    $name= mysqli_real_escape_string($connect, $name);
    $email = mysqli_real_escape_string($connect, $email);
    $phone= mysqli_real_escape_string($connect, $phone);
    $subject = mysqli_real_escape_string($connect, $subject);
    $message = mysqli_real_escape_string($connect, $message);

    $to = "pavel.gherciu@iis.utm.md";
    
    $error_fields = [];

    if($email === '' || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $error = [
            "message" => 'Introduceti corect emailul!',
            "field" => 'email'
        ];
        $error_fields[] = $error;
    }

    if($name === ''){
        $error = [
            "message" => 'Introduceți numele!',
            "field" => 'name'
        ];
        $error_fields[] = $error;     
    }

    if($phone === '' || !is_numeric($phone)) {
      $error = [
        "message" => 'Introduceti un nr. de telefon valid',
        "field" => 'phone'
      ];
      $error_fields[] = $error; 
    }

    if($subject === ''){
        $error = [
            "message" => 'Introduceți subiectul!',
            "field" => 'subject'
        ];
        $error_fields[] = $error;
    }

    if(!empty($error_fields)){
        $response = [
            "status" => false, 
            "type" => 1,
            "fields" => $error_fields
        ];
        echo json_encode($response);
        die();
    }

    $headers = "From: $email" . "\r\n" . 
        "Reply-To: $email" . "\r\n" . 
        "X-Mailer: PHP/" . phpversion();

    if($message){
        mysqli_query($connect, "INSERT INTO `contacts_list` (`name`, `email`, `phone`, `subject`, `message`, `sent_date`) VALUES ('{$name}', '{$email}', '{$phone}', '{$subject}', '{$message}', now())");
        //@mail($email_to, $email_subject, $email_message, $headers);
        $response = [
            "status" => true,
            "message" => 'Mesajul a fost trimis cu success!'   
        ];
        echo json_encode($response);
    }else{
        $response = [
            "status" => false,
            "message" => 'Eroare de trimitere a mesajului!',
            "type" => 2
        ];
        echo json_encode($response);
    } 

    function toCorrectString($str){
        $str = htmlspecialchars($str);
        $str = urldecode($str);
        $str = trim($str);
        return stripslashes($str);
    }
?>