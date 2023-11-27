<?php 
session_start();
require_once 'mysql/connect.php';

if (isset($_POST['submit'])) {
    $roomId = $_POST['roomId'];
    $Date_cack = $_POST['Date_cack'];
    $MC_sta = $_POST['MC_sta'];
    $sql = $conn->prepare("UPDATE month SET roomId = :roomId, Date_cack = :Date_cack, MC_sta =:MC_sta WHERE roomId = :roomId AND Date_cack = :Date_cack");
    $sql->bindParam(":roomId", $roomId);
    $sql->bindParam(":Date_cack", $Date_cack);
    $sql->bindParam(":MC_sta", $MC_sta);
    if ($sql->execute()) {
        $onemonth = DATE("Y-m-d", strtotime($Datein . "+1month"));
        $Date_cack = $onemonth;
        $MC_sta = "ไม่ถึงกำหนด";
        $sql4 = $conn->prepare("INSERT INTO month SET roomId =:roomId, Date_cack =:Date_cack, MC_sta = :MC_sta");
        $sql4->bindParam(":roomId", $roomId);
        $sql4->bindParam(":Date_cack", $Date_cack);
        $sql4->bindParam(":MC_sta", $MC_sta);
        if ($sql4->execute()) {
            $_SESSION['Success'] = "เพิ่มข้อมูลสำเร็จในสถานะผู้เช่า";
            header("location: test8.php");
        } else {
            echo "Error updating data in room table";
        }
    }
    else {
        echo "Error Add data";
    }
} 



?>