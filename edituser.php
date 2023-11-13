<?php
session_start();
require_once 'mysql/connect.php';


if (isset($_POST['edituser'])) {
    $id = $_POST['id'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    $Name = $_POST['Name'];
    $Lname = $_POST['Lname'];
    $Tel = $_POST['Tel'];
    $Address = $_POST['Address'];
    $Weddress = $_POST['Weddress'];
    $urold = $_POST['urold'];
    $sql = $conn->prepare("UPDATE user SET username = :username, password = :password, Name = :Name, Lname = :Lname, Tel = :Tel, Address = :Address, Weddress = :Weddress, urold = :urold
    WHERE id = :id");
    $sql->bindParam(":id", $id);
    $sql->bindParam(":username", $username);
    $sql->bindParam(":password", $password);
    $sql->bindParam(":Name", $Name);
    $sql->bindParam(":Lname", $Lname);
    $sql->bindParam(":Tel", $Tel);
    $sql->bindParam(":Address", $Address);
    $sql->bindParam(":Weddress", $Weddress);
    $sql->bindParam(":urold", $urold);

    // Execute the SQL statement
    if ($sql->execute()) {
        $_SESSION['Success']="เเก้ไขสำเร็จ";
        header("location: test1.php");
    } else {
        echo "Error updating data";
    }
} else {
    echo "Error: Edit form not submitted";
}
?>