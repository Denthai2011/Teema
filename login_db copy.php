<?php session_start();
require_once 'mysql/connect.php';

if (isset($_POST['login'])){
    $username = $_POST['username'];
    $password = $_POST['password'];
    if (empty($username)) {
        $_SESSION['error'] = 'กรุณากรอก username';
    }
    else if (empty($password)) {
        $_SESSION['error'] = 'กรุณากรอก password';
    }
    else {
        $check_username = $conn->prepare("SELECT username FROM admin where username = :username");
        $check_username->bindParam(":username",$username);
        $check_username->execute();
        $row = $check_username->fetch(PDO::FETCH_ASSOC);
        if ($check_username -> rowCount()>0){
            if (password_verify($password, $row['password'])){
                if ($row['urold']=='เจ้าหน้าที่'|| $row['urold']=='เเอดมิน'){
                    $_SESSION['admin_login'] =$row['id'];
                    header("location: index.php");
                }
            }
        }
    }
}
?>