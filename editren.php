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
    $staDep = $_POST['staDep'];
    $sql = $conn->prepare("UPDATE renting SET Datein = :Datein, Dateout = :Dateout,Name = :Name, Lname = :Lname, roomId = :roomId, Deposit = :Deposit,staDep=:staDep
    WHERE renId = :renId");
    $sql1 = $conn->prepare("UPDATE room SET Name = :Name, Lname = :Lname WHERE roomId = :roomId");
    $sql->bindParam(":renId", $renId);
    $sql->bindParam(":Datein", $Datein);
    $sql->bindParam(":Dateout", $Dateout);
    $sql->bindParam(":Name", $Name);
    $sql->bindParam(":Lname", $Lname);
    $sql->bindParam(":roomId", $roomId);
    $sql->bindParam(":Deposit", $Deposit);
    $sql->bindParam(":staDep", $staDep);
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
    if ($staDep == "จ่ายเเล้ว") {
        $Datepay = $Datein;  // Set tจe correct value for Datepay
        $typepay = 'ค่ามัดจำ';  // Set the correct value for typepay

        $sql2 = $conn->prepare("INSERT INTO money SET Datepay = :Datepay, roomId = :roomId, price = :Deposit, typepay = :typepay");
        $sql2->bindParam(":Datepay", $Datepay);
        $sql2->bindParam(":roomId", $roomId);
        $sql2->bindParam(":Deposit", $Deposit);
        $sql2->bindParam(":typepay", $typepay);
        $sql2->execute();
    }
    else {
        echo "Error Add data";
    }
} else {
    echo "Error: Add form not submitted";
}
?>