<?php
session_start();
require_once 'mysql/connect.php';
if (isset($_POST['login'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
    if (empty($username)) {
        $_SESSION['error'] = 'กรุณากรอก username';
        header('location: index.php');
    } else if (empty($password)) {
        $_SESSION['error'] = 'กรุณากรอก password';
        header('location: index.php');
    } else {
        $check_username = $conn->prepare("SELECT id,username,password,urold FROM user WHERE username = :username AND password = :password");
        // $check_username->bindParam(":username", $username);
        $check_username->bindParam(':username', $username, PDO::PARAM_STR);
        $check_username->bindParam(':password', $password, PDO::PARAM_STR);
        $check_username->execute();
        $row = $check_username->fetch(PDO::FETCH_ASSOC);
        if (password_verify($password, $hashedPassword)) {
            if ($row['urold'] == 'เจ้าหน้าที่') {
                $_SESSION['admin_login'] = $row['id'];
                header("location: hometes.php");
            } else if ($row['urold'] == 'เจ้าของหอพัก') {
                $_SESSION['Superadmin_login'] = $row['id'];
                header("location: owner.php");
            } else if ($row !== false && $row['urold'] == 'ผู้เช่า') {
                $check_userroom = $conn->prepare("SELECT room.roomId, user.Name, user.username FROM user LEFT JOIN room ON user.Name = room.Name WHERE user.username = :username");
                $check_userroom->bindParam(':username', $username, PDO::PARAM_STR);
                $check_userroom->execute();
                $row_user = $check_userroom->fetch(PDO::FETCH_ASSOC);
                $roomId = $row_user['roomId'];
                $_SESSION['user_login'] = $row['id'];
                header("Location: detaroomhome.php?roomId=$roomId");
                exit;
            }     
            else {
                $_SESSION['error'] = 'รหัสผิดครับ หรือ ไม่ใช่สถานะผู้เช่าเเล้ว';
                header('location: index.php');
            }
        } else {
            $_SESSION['error'] = 'รหัสผิดครับ';
            header('location: index.php');
        }
    }
}
