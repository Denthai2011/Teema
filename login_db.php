<?php
session_start();
require_once 'mysql/connect.php';
if (isset($_POST['login'])){
    $username = $_POST['username'];
    $password = $_POST['password'];
    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
    echo $username;
    if (empty($username)) {
        $_SESSION['error'] = 'กรุณากรอก username';
        header('location: index.php');
    }
    else if (empty($password)) {
        $_SESSION['error'] = 'กรุณากรอก password';
        header('location: index.php');
    }
    else {
        $check_username = $conn->prepare("SELECT username,password,urold FROM user WHERE username = :username AND password = :password");
        // $check_username->bindParam(":username", $username);
        $check_username->bindParam(':username', $username , PDO::PARAM_STR);
        $check_username->bindParam(':password', $password , PDO::PARAM_STR);
        $check_username->execute();
        $row = $check_username->fetch(PDO::FETCH_ASSOC);
        if (password_verify($password, $hashedPassword)) {
            if ($row['urold'] == 'เจ้าของหอพัก') {
                $_SESSION['admin_login'] = $row['id'];
                header("location: home.php");
            }
        }
        else{
            $_SESSION['error'] = 'รหัสผิดครับ';
            header('location: index.php');
        }
        
    }
}
?>