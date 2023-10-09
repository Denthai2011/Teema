<?php
session_start();
require_once 'mysql/connect.php';


if (isset($_POST['edit'])) {
    $roomId = $_POST['roomId'];
    $Name = $_POST['Name'];
    $Lname = $_POST['Lname'];
    $staID = $_POST['staID'];
    $sql = $conn->prepare("UPDATE room SET Name = :Name, Lname = :Lname, staID = :staID WHERE roomId = :roomId");
    $sql->bindParam(":roomId", $roomId);
    $sql->bindParam(":Name", $Name);
    $sql->bindParam(":Lname", $Lname);
    $sql->bindParam(":staID", $staID);

    // Execute the SQL statement
    if ($sql->execute()) {
        $_SESSION['Success']="เเก้ไขสำเร็จ";
        header("location: hometes.php");
    } else {
        echo "Error updating data";
    }
    $udsql = $conn->prepare("UPDATE user SET roomId = :roomId WHERE Name = :Name");
    $udsql->bindParam(":roomId", $roomId);
    $udsql->bindParam(":Name", $Name);
    if ($udsql->execute()) {
        $_SESSION['Success']="เเก้ไขสำเร็จ";
        header("location: hometes.php");
    } else {
        echo "Error updating data";
    }
} else {
    echo "Error: Edit form not submitted";
}
?>
