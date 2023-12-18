<?php
session_start();
require_once 'mysql/connect.php';
if (isset($_POST['endren'])) {
    $renId = $_POST['renId'];
    $roomId = $_POST['roomId'];
    $Dateout = $_POST['Dateout'];
    $End_ren = $_POST['End_ren'];
    $sql = $conn->prepare("UPDATE renting SET Dateout = :Dateout, End_ren=:End_ren
    WHERE renId = :renId");
    $sql->bindParam(":renId", $renId);
    $sql->bindParam(":Dateout", $Dateout);
    $sql->bindParam(":End_ren", $End_ren);
    // Execute the SQL statement
    if ($sql->execute()) {
        $_SESSION['Success'] = "เพิ่มข้อมูลสำเร็จ";
        header("location: test7.php");
    }
    $sql1 = $conn->prepare("UPDATE room SET Name = NULL, Lname = NULL, staId = 3 WHERE roomId = :roomId");
    $sql1->bindParam(":roomId", $roomId);
    if ($sql1->execute()) {
        $sql2 = $conn->prepare("SELECT NAME, Lname FROM renting WHERE renId = :renId");
        $sql2->bindParam(":renId", $renId);
        $sql2->execute();
        $result = $sql2->fetch(PDO::FETCH_ASSOC);
            if ($result) {
                $Name = $result['NAME'];
                $Lname = $result['Lname'];
        
                $sql3 = $conn->prepare("UPDATE user SET urold = 'ออกแล้ว' WHERE Name = :Name AND Lname = :Lname");
                $sql3->bindParam(":Name", $Name);
                $sql3->bindParam(":Lname", $Lname);
                $sql3->execute();
            }
        $_SESSION['Success'] = "เพิ่มข้อมูลสำเร็จ";
        header("location: test7.php");
    } else {
        echo "Error Add data";
    }
} else {
    echo "Error: Add form not submitted";
}
