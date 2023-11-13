<?php
session_start();
require_once 'mysql/connect.php';


if (isset($_POST['editren'])) {
    $renId = $_POST['renId'];
    $Datein = $_POST['Datein'];
    $Dateout = $_POST['Dateout'];
    $Name = $_POST['Name'];
    $Lname = $_POST['Lname'];
    $roomId = $_POST['roomId'];
    $Deposit = $_POST['Deposit'];
    $sql = $conn->prepare("UPDATE renting SET Datein = :Datein, Dateout = :Dateout,Name = :Name, Lname = :Lname, roomId = :roomId, Deposit = :Deposit
    WHERE renId = :renId");
    $sql1 = $conn->prepare("UPDATE room SET Name = :Name, Lname = :Lname WHERE roomId = :roomId");
    $sql->bindParam(":renId", $renId);
    $sql->bindParam(":Datein", $Datein);
    $sql->bindParam(":Dateout", $Dateout);
    $sql->bindParam(":Name", $Name);
    $sql->bindParam(":Lname", $Lname);
    $sql->bindParam(":roomId", $roomId);
    $sql->bindParam(":Deposit", $Deposit);
    // Execute the SQL statement
    if ($sql->execute()) {
        $_SESSION['Success']="เพิ่มข้อมูลสำเร็จ";
        header("location: test5.php");
    } 
    $sql1 = $conn->prepare("UPDATE room SET Name = :Name, Lname = :Lname WHERE roomId = :roomId");
    $sql1->bindParam(":roomId", $roomId);
    $sql1->bindParam(":Name", $Name);
    $sql1->bindParam(":Lname", $Lname);
    if ($sql1->execute()) {
        $_SESSION['Success']="เพิ่มข้อมูลสำเร็จ";
        header("location: test5.php");
    }
    else {
        echo "Error Add data";
    }
} else {
    echo "Error: Add form not submitted";
}
?>