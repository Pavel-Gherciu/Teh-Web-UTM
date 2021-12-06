<?php
    session_start();
    require_once 'connect.php';

    $username = toCorrectString($_POST['username']);
    $password = toCorrectString($_POST['password']);
    
    $username= mysqli_real_escape_string($connect, $username);
    $password = mysqli_real_escape_string($connect, $password);
    
    $error_fields = [];

    if(strlen($username) < 3 || $username === ''){
        $error = [
            "message" => 'Loginul nu poate fi mai mic de 3 caractere!',
            "field" => 'username'
        ];
        $error_fields[] = $error;
    }

    if(strlen($password) < 8 || $password === ''){
        $error = [
            "message" => 'Parola nu poate fi mai mică decât 8!',
            "field" => 'pass'
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

    $check_user =  mysqli_query($connect, "SELECT * FROM user WHERE username='$username'");

    if(mysqli_num_rows($check_user) > 0){
        $user = mysqli_fetch_assoc($check_user);
        $password = md5($password);
        if($user['password'] === $password){
            $lastOnline = mysqli_query($connect, "SELECT last_online FROM user WHERE username = '$username'");
            $online = mysqli_fetch_assoc($lastOnline);
            $last_entry = $online['last_online'];
            $_SESSION['time'] = "Ultima dată cand a-ți intrat - '$last_entry'";
            
            mysqli_query($connect, "UPDATE user SET last_online=now() WHERE username = '$username'");

            $_SESSION['info'] = [
                "username" => $user['username'],
                "email" => $user['email']
            ];             
            $_SESSION['success'] = "Ați intrat cu succes în cont!";
            
            $response = [
                "status" => true
            ];
            echo json_encode($response);
            die();
        }
    }
    $response = [
        "status" => false,
        "message" => 'Loginul sau parola incorectă!',
        "type" => 2
    ];
    echo json_encode($response);
    //mysql_close($connect);

    function toCorrectString($str){
        $str = htmlspecialchars($str);
        $str = urldecode($str);
        $str = trim($str);
        return stripslashes($str);
    }
?>