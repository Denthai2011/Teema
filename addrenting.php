<?php
session_start();
require_once 'mysql/connect.php';


if (isset($_POST['addren'])) {
    $Datein = $_POST['Datein'];
    $Name = $_POST['Name'];
    $Lname = $_POST['Lname'];
    $roomId = $_POST['roomId'];
    $Deposit = $_POST['Deposit'];
    $Deppay = $_POST['Deppay'];
    $sql = $conn->prepare("INSERT INTO renting SET Datein = :Datein, Name = :Name, Lname = :Lname,roomId = :roomId, Deposit = :Deposit,Deppay =:Deppay");
    $sql->bindParam(":Datein", $Datein);
    $sql->bindParam(":Name", $Name);
    $sql->bindParam(":Lname", $Lname);
    $sql->bindParam(":roomId", $roomId);
    $sql->bindParam(":Deposit", $Deposit);
    $sql->bindParam(":Deppay", $Deppay);

    // Execute the SQL statement
    if ($sql->execute()) {
        $_SESSION['Success'] = "เพิ่มข้อมูลสำเร็จ";
        header("location: test5.php");
    }
    if ($Deppay >= 500 and $Deposit - $Deppay != 0) {
        $staId = 1;
        $sql1 = $conn->prepare("UPDATE room SET Name = :Name, Lname = :Lname, staId = :staId WHERE roomId = :roomId");
        $sql1->bindParam(":roomId", $roomId);
        $sql1->bindParam(":Name", $Name);
        $sql1->bindParam(":Lname", $Lname);
        $sql1->bindParam(":staId", $staId);
        if ($sql1->execute()) {
            $_SESSION['Success'] = "เพิ่มข้อมูลสำเร็จในสถานะผู้จอง";
            header("location: test5.php");
        }
    }
    if ($Deposit - $Deppay == 0) {
        $staId = 2;
        $sql5 = $conn->prepare("UPDATE room SET Name = :Name, Lname = :Lname, staId = :staId WHERE roomId = :roomId");
        $sql5->bindParam(":roomId", $roomId);
        $sql5->bindParam(":Name", $Name);
        $sql5->bindParam(":Lname", $Lname);
        $sql5->bindParam(":staId", $staId);
        $sql5->execute();
    } else {
        echo "Error updating data in room table";
    }
    $Datepay = $Datein;  // Set tจe correct value for Datepay
    $typepay = 'ค่ามัดจำ';  // Set the correct value for typepay

    if ($Deposit - $Deppay == 0) {
        $sql2 = $conn->prepare("INSERT INTO money SET Datepay = :Datepay, roomId = :roomId, price = :Deposit, typepay = :typepay");
        $sql2->bindParam(":Datepay", $Datepay);
        $sql2->bindParam(":roomId", $roomId);
        $sql2->bindParam(":Deposit", $Deposit);
        $sql2->bindParam(":typepay", $typepay);
        if ($sql2->execute()) {
            $onemonth = DATE("Y-m-d", strtotime($Datein . "+1month"));
            $Date_cack = $onemonth;
            $MC_sta = "ไม่ถึงกำหนด";
            $sql4 = $conn->prepare("INSERT INTO month SET roomId =:roomId, Date_cack =:Date_cack, MC_sta = :MC_sta");
            $sql4->bindParam(":roomId", $roomId);
            $sql4->bindParam(":Date_cack", $Date_cack);
            $sql4->bindParam(":MC_sta", $MC_sta);
            if ($sql4->execute()) {
                $_SESSION['Success'] = "เพิ่มข้อมูลสำเร็จในสถานะผู้เช่า";
                header("location: test5.php");
            } else {
                echo "Error updating data in room table";
            }
        }
    } else {
        echo "Error Add data";
    }
} else {
    echo "Error: Add form not submitted";
}
