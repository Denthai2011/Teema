<?php
session_start();
require_once 'mysql/connect.php';

if (isset($_POST['editwater'])) {
    $W_id = $_POST['W_id'];
    $W_dsave = $_POST['W_dsave'];
    $W_bef = $_POST['W_bef'];
    $W_af = $_POST['W_af'];
    $sql = $conn->prepare("UPDATE water SET W_dsave = :W_dsave, W_bef = :W_bef, W_af = :W_af
    WHERE W_id = :W_id");
    $sql->bindParam(":W_id", $W_id);
    $sql->bindParam(":W_dsave", $W_dsave);
    $sql->bindParam(":W_bef", $W_bef);
    $sql->bindParam(":W_af", $W_af);
    // Execute the SQL statement
    if ($sql->execute()) {
        $_SESSION['Success']="เเก้ไขค่าน้ำสำเร็จ";
        header("location: test2.php");
    } else {
        echo "Error water updating data";
    }
} else {
    echo "Error: Edit form  not submitted";
}
?>