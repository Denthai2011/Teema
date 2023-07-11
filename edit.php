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
        echo "Data updated successfully";
    } else {
        echo "Error updating data";
    }
} else {
    echo "Error: Edit form not submitted";
}
?>
