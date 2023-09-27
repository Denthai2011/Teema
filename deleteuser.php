<?php
session_start();
require_once 'mysql/connect.php';


if (isset($_POST['deleteuser'])) {
    $id = $_POST['id'];

    $sql = $conn->prepare("DELETE From user  WHERE id = ".$_POST['id']."");

    // Execute the SQL statement
    if ($sql->execute()) {
        $_SESSION['Success']="ลบสำเร็จ";
        header("location: test1.php");
    } else {
        echo "Error Delete data";
    }
} else {
    echo "Error: delete form not submitted";
}
?>