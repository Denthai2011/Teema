<?php
session_start();
require_once 'mysql/connect.php';
if (isset($_POST['login'])){
    $username = $_POST['username'];
    $password = $_POST['password'];
    if (empty($username)) {
        $_SESSION['error'] = 'กรุณากรอก username';
        header('location: index.php');
    }
    else if (empty($password)) {
        $_SESSION['error'] = 'กรุณากรอก password';
        header('location: index.php');
    }
    else {
        $check_username = $conn->prepare("SELECT * FROM admin WHERE username = :username");
        $check_username->bindParam(":username", $username);
        $check_username->execute();
        $row = $check_username->fetch(PDO::FETCH_ASSOC);
            if ($username == $row['username']){    
                if (password_verify($password, $row['password'])){
                    echo 'ผ่าน';
                    if ($row['urold'] == 'เเอดมิน'){
                    $_SESSION['admin_login'] = $row['id'];
                    header("location: home.php");
                    }
                }
                    else {
                        echo 'รหัสผ่านไม่ถูกต้อง';
                    }
                
            }
        
    }
}
?>