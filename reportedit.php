<?php
session_start();
require_once 'mysql/connect.php';
if (isset($_POST['editreport'])) {
    $ReId = $_POST['ReId'];
    $Resta = $_POST['Resta'];
    $sql = $conn->prepare("UPDATE report SET Resta = :Resta WHERE ReId = :ReId");
    $sql->bindParam(":Resta", $Resta);
    $sql->bindParam(":ReId", $ReId);
    // Execute the SQL statement
    if ($sql->execute()) {
        $_SESSION['Success']="เเก้ไขสำเร็จ";
        header("location: test4.php");
    } else {
        echo "Error updating data";
    }
} else {
    echo "Error: Edit form not submitted";
}
?>
