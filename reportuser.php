<?php
session_start();
require_once 'mysql/connect.php';
if (isset($_POST['reportuser'])) {
    $roomId = $_POST['roomId'];
    $Name = $_POST['Name'];
    $Retype = $_POST['Retype'];
    $Resta = $_POST['Resta'];
    $Redata = $_POST['Redata'];
    $sql = $conn->prepare("INSERT INTO report SET Name = :Name , roomId = :roomId , Retype = :Retype , Resta = :Resta , Redata = :Redata");
    $sql->bindParam(":Name", $Name);
    $sql->bindParam(":roomId", $roomId);
    $sql->bindParam(":Retype", $Retype);
    $sql->bindParam(":Resta", $Resta);
    $sql->bindParam(":Redata", $Redata);
    // Execute the SQL statement
    if ($sql->execute()) {
        $_SESSION['Success']="เเก้ไขสำเร็จ";
        header("location: home.php");
    } else {
        echo "Error updating data";
    }
} else {
    echo "Error: Edit form not submitted";
}
?>
