<?php
session_start();
require_once 'mysql/connect.php';


if (isset($_POST['deleteren'])) {
    $renId = $_POST['renId'];

    $sql = $conn->prepare("DELETE From renting  WHERE renId = ".$_POST['renId']."");

    // Execute the SQL statement
    if ($sql->execute()) {
        $_SESSION['Success']="ลบสำเร็จ";
        header("location: test5.php");
    } else {
        echo "Error Delete data";
    }
} else {
    echo "Error: delete form not submitted";
}
?>