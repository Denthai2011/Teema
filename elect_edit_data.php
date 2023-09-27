<?php
session_start();
require_once 'mysql/connect.php';


if (isset($_POST['editelect'])) {
    $E_id = $_POST['E_id'];
    $E_dsave = $_POST['E_dsave'];
    $E_bef = $_POST['E_bef'];
    $E_af = $_POST['E_af'];
    $sql = $conn->prepare("UPDATE elect SET E_dsave = :E_dsave, E_bef = :E_bef, E_af = :E_af
    WHERE E_id = :E_id");
    $sql->bindParam(":E_id", $E_id);
    $sql->bindParam(":E_dsave", $E_dsave);
    $sql->bindParam(":E_bef", $E_bef);
    $sql->bindParam(":E_af", $E_af);
    // Execute the SQL statement
    if ($sql->execute()) {
        $_SESSION['Success']="เเก้ไขค่าไฟสำเร็จ";
        header("location: test3.php");
    } else {
        echo "Error elect updating data";
    }
} else {
    echo "Error: Edit form  not submitted";
}
?>