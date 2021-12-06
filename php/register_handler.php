<?php
    session_start();
    require_once 'connect.php';
    
    $username = toCorrectString($_POST['username']);
    $password_1 = toCorrectString($_POST['password_1']);
    $password_2 = toCorrectString($_POST['password_2']);
    $email = toCorrectString($_POST['email']);
    
    $username = mysqli_real_escape_string($connect, $username);
    $password_1 = mysqli_real_escape_string($connect, $password_1);
    $password_2 = mysqli_real_escape_string($connect, $password_2);
    $email = mysqli_real_escape_string($connect, $email);

    $error_fields = [];

    if($email === '' || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $error = [
            "message" => 'Introduceti corect emailul!',
            "field" => 'email'
        ];
        $error_fields[] = $error;
    }

    if(strlen($username) < 3 || $username === ''){
        $error = [
            "message" => 'Usernameul trebuie să fie mai lung de 3 caractere!',
            "field" => 'username'
        ];
        $error_fields[] = $error;
    }

    if(strlen($password_1) < 8 || $password_1 === ''){
        $error = [
            "message" => 'Parola nu poate fi mai mică decât 8!',
            "field" => 'password_1'
        ];
        $error_fields[] = $error;
    }

    if($password_2 === '' || $password_2!== $password_1){
        $error = [
            "message" => 'Parolele nu se aseamănă!',
            "field" => 'password_2'
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

    $check_login =  mysqli_query($connect, "SELECT * FROM user WHERE username = '$username' OR email = '$email'");
    

    if(mysqli_num_rows($check_login) > 0){
        $error = [
            "message" => 'Utilizatorul cu acest login deja există!',
            "field" => 'username'
        ];
        $error_fields[] = $error;
        
        $response = [
            "status" => false,
            "type" => 1,
            "fields" => $error_fields
        ];
        echo json_encode($response);
    }else{
        $password_1 = md5($password_1);
        mysqli_query($connect, "INSERT INTO `user`(`username`,`email`, `password`) VALUES ('$username', '$email', '$password_1')");
        $_SESSION["register-success"] = 'Registrarea a avut loc cu success!';
        
        $response = [
            "status" => true, 
            "message" => 'Registrarea a avut loc cu success!'
        ];
        echo json_encode($response);
    }
    //mysql_close($connect);

    function toCorrectString($str){
        $str = htmlspecialchars($str);
        $str = urldecode($str);
        $str = trim($str);
        return stripslashes($str);
    }
?>
