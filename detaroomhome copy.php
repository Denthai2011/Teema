<?php session_start();
require_once 'mysql/connect.php';
$roomId = $_GET['roomId'];
if (isset($_POST['logout'])) {
    session_destroy();
    header('location: index.php');
    exit();
}

?>
<!DOCTYPE html>
<html>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
<script src="https://kit.fontawesome.com/401736f69f.js" crossorigin="anonymous"></script>
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Oswald:wght@600&family=Pattaya&display=swap" rel="stylesheet">

<head>
    <style>
        label {
            font-size: 20px;
        }

        tr {
            border-bottom: 2px solid #c4c2bc;
        }

        th {
            color: #8B4513;
            font-size: 18px;
            text-shadow: 1px 1px black;
        }

        td {
            color: white;
            font-size: 16px;
            color: #993300
        }

        .table2 {
            border-collapse: collapse;
            font-size: 16px;
            margin-right: 20px;
        }

        /* สไตล์สำหรับแถวหัวของตาราง */
        .table2 th {
            text-align: left;
            padding: 8px;
        }

        /* สไตล์สำหรับแถวของตาราง */
        .table2 td {
            padding: 8px;
            border-bottom: 1px solid #ddd;
        }

        /* สไตล์สำหรับแถวเลขคี่ */

        /* สไตล์สำหรับแถวเมื่อเลื่อนเมาส์เข้า */
        .table2 tr:hover {
            background-color: #f0e68c;
        }

        .table3 tr:hover {
            background-color: #f0e68c;
        }

        .form1 {

            padding: 20px;
            border-radius: 10px;
            box-shadow: 2px 2px 2px 2px #663333;
            justify-content: center;
            margin-top: 20px;
        }

        .container {
            display: flex;
            flex-direction: column;
            border-radius: 10px 10px 0px 0px;
            box-shadow: 2px 2px 2px 2px wheat;
            background-color: #FFFAF0;
            padding: 20px;

        }

        .container2 {
            display: flex;
            flex-direction: row;
            justify-content: space-around;

        }

        .table1 {
            width: 100%;
        }

        .table1 td,
        .table1 th {
            padding: 10px;
        }

        .input-value {
            display: inline-block;
            padding: 5px 10px;
            background-color: #ffffff;
            border: 1px solid #ccc;
            border-radius: 5px;
            font-weight: bold;
        }

        ul h4 {
            color: #f2f2f2;
            padding: 2px;
            padding-left: 20px;
        }

        body {
            background-image: url('img/ก่อน.png');
            background-repeat: no-repeat;
            background-attachment: fixed;
            background-size: 100% 100%;
        }

        .headdiv {
            align-self: center;
            margin-left: 10%;
            font-size: 30px;
            color: #FFD700;
            text-shadow: 2px 2px black;
        }
    </style>
</head>

<body>
    <header>
        <ul class="nav nav-tabs bg-dark" style="opacity: 70%;">
            <?php if (!isset($_SESSION['admin_login'])) {
                echo "
            <li class='nav-item'>
                <a class='nav-link active' aria-current='page' href='hometes.php'><i class='fa-solid fa-house fa-fade fa-xl'></i></a>
            </li>
            <h4> ห้องที่ $roomId </h4>
            <li>
            <form method='post' action=''>
            <input type='submit' name='logout' value='ออกจากระบบ'>
            </form>
            </li>
            ";
            } else {
                echo "
            <li class='nav-item'>
                <a class='nav-link active' aria-current='page' href='hometes.php'><i class='fa-solid fa-house fa-fade fa-xl'></i></a>
            </li>
            <li class='nav-item'>
                <a class='nav-link'  href='test1.php'>ข้อมูลผู้ใช้</a>
            </li>
            <li class='nav-item'>
                <a class='nav-link'  href='test2.php'>ค่าน้ำ</a>
            </li>
            <li class='nav-item'>
                <a class='nav-link'  href='test3.php'>ค่าไฟ</a>
            </li>
            <li class='nav-item'>
                <a class='nav-link' href='test4.php'><i class='fa-solid fa-bed-front'></i></a>
            </li>
            ";
            } ?>
        </ul>
    </header>
    <?php if (isset($_SESSION['Success'])) { ?>
        <div class="alert alert-success">
            <?php
                    echo $_SESSION['Success'];
                    unset($_SESSION['Success']);
            ?>
        </div>
    <?php } ?>
    <?php
    // ดึงข้อมูลจากฐานข้อมูล

    $sql = "SELECT Name,Lname,Dps,E_dsave ,E_bef ,E_af,W_dsave ,W_bef ,W_af  FROM room Left join elect on room.roomId = elect.roomId Left join water on room.roomId = water.roomId 
    WHERE room.roomId = :roomId";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':roomId', $roomId);
    $stmt->execute();
    $row = $stmt->fetch(PDO::FETCH_ASSOC);

    // แสดงข้อมูลในฟอร์ม
    ?><?php if (!isset($_SESSION['admin_login'])) {
            echo "
    <div>
        <button type='button' hidden data-bs-target='#usermodal' class='btn btn-warning' data-bs-toggle='modal'>edit </a>
    </div>";
        } else {
            echo "
            <div>
        <button type='button' data-bs-target='#usermodal' class='btn btn-warning' data-bs-toggle='modal'>edit </a>
    </div>";
        } ?>
    <div class="headdiv">ข้อมูลห้อง</div>
    <div class="container">
        <form class="form1">
            <table class="table1">
                <tr>
                    <dive>
                        <th>
                            <label for="roomId">ห้องที่:</label>
                        </th>
                        <td><label type="text" name="roomId"> <?php echo $roomId; ?></label></td>
                    </dive>
                </tr>
                <div>
                    <tr>
                        <th>
                            <label for="Name">ชื่อ: </label>
                        </th>
                        <td><label type="text" id="Name" name="Name"> <?php echo $row['Name']; ?> </label></td>
                </div>
                <div>
                    <th>
                        <label for="Name">นามสกุล: </label>
                    </th>
                    <td><label type="text" id="Lname" name="Lname"><?php echo $row['Lname']; ?></label></td>
                </div>
                </tr>
                <tr>
                    <div>
                        <th>
                            <label for="Dps">ค่าห้อง:</label>
                        </th>
                        <td><label type="tedx" id="Dps" name="Dps"><?php echo $row['Dps']; ?></label></td>
                    </div>
                </tr>
            </table>
        </form>
        <br>
        <div class="container2">
            <table class="table2">
                <thead>
                    <tr>
                        <th>ค่ามิเตอร์ไฟเดือนก่อน</th>
                        <td><?php echo $row["E_bef"] ?></td>

                    </tr>
                    <tr>
                        <th>ค่ามิเตอร์ไฟเดือนนี้</th>
                        <td><?php echo $row["E_af"] ?></td>
                    </tr>
                    <tr>
                        <th>ค่าต่างมิเตอร์</th>
                        <td><?php echo $Eitp = $row["E_af"] - $row["E_bef"]  ?></td>
                    </tr>
            </table>
            <br>
            <table class="table3">
                <thead>
                    <tr>
                        <th>ค่ามิเตอร์น้ำเดือนก่อน</th>
                        <td><?php echo $row["W_bef"] ?></td>
                    </tr>
                    <tr>
                        <th>ค่ามิเตอร์น้ำเดือนนี้</th>
                        <td><?php echo $row["W_af"] ?></td>
                    </tr>
                    <tr>
                        <th>ค่าต่างมิเตอร์</th>
                        <td><?php echo $Witp = $row["W_af"] - $row["W_bef"]  ?></td>
                    </tr>
            </table>
        </div>
        <br>
        <table class="table4">
            <tr>
                <th>ค่าไฟ</th>
                <th>ค่าน้ำ</th>
                <th>ค่าห้อง</th>
                <th>รวม</th>
            </tr>
            <tr>
                <td><?php echo $Witp = $Witp * 10  ?></td>
                <td><?php echo $Eitp = $Eitp * 10  ?></td>
                <td><?php echo $row['Dps'] ?></td>
                <td><?php echo $Sum = $Eitp + $Witp + $row['Dps'] ?></td>
            </tr>
            </tr>
        </table>
    </div>
    <div class="modal fade" id="usermodal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Edit User</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="edit.php" method="post">
                        <div class="mb-3">
                            <input type="hidden" name="roomId" value="<?php echo $roomId ?>">
                        </div>
                        <div class="mb-3">
                            <label for="Name" class="col-form-label">ชื่อ:</label>
                            <select name="Name" id="selectName">
                                <?php
                                if ($row !== false) {
                                    $nameselect = $conn->prepare("SELECT Name, Lname FROM user");
                                    $nameselect->bindParam(':Name', $Name);
                                    $nameselect->execute();
                                    $result = $nameselect->fetchAll(PDO::FETCH_ASSOC);
                                    if ($result) {
                                        foreach ($result as $row_name) {
                                ?>
                                            <option value="<?php echo $row_name['Name']; ?>"><?php echo $row_name['Name']; ?></option>
                                <?php
                                        }
                                    }
                                }
                                ?>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="Lname" class="col-form-label">นามสกุล:</label>
                            <input type="text" name="Lname" id="inputLname" class="form-control" value="">
                        </div>
                        <div class="mb-3">
                            <label for="staID">สถานะห้อง:</label>
                            <select name="staID">
                                <option value="1">จองแล้ว</option>
                                <option value="2">เช่า</option>
                                <option value="3">ว่าง</option>
                            </select>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="submit" name="edit" class="btn btn-primary">Save Changes</button>
                        </div>
                    </form>
                    <script>
        document.getElementById('selectName').addEventListener('change', function() {
            var selectedName = this.value;
            var result = <?php echo json_encode($result); ?>;
            var selectedLname = result.find(function(item) {
                return item.Name === selectedName;
            }).Lname;
            document.getElementById('inputLname').value = selectedLname;
        });
</script>
                </div>
            </div>
        </div>
    </div>
    <h2 style="text-align: center;color:gold;text-shadow:2px 2px black;">เเจ้งซ่อม <i class="fa-regular fa-flag fa-bounce" style="color: #f6ee04;text-align:center;"></i></h2>
    <div>
        <?php $Name = $row['Name'];
        echo "<a href='#reportusermodal_$roomId' class='btn btn-danger' style='margin:auto;display:block;width: 50px;'  class='btn btn-warning' data-bs-toggle='modal'><i class='fa-solid fa-plus'></i> </a>";
        include("reportuser_modal.php"); ?>
    </div>
    <div class="container">
        <?php
        if ($row !== false) {
            if ($row_name !== false) {
                $userreport = $conn->prepare("SELECT * FROM report WHERE roomId = :roomId");
                $userreport->bindParam(':roomId', $roomId);
                $userreport->execute();
                $result = $userreport->fetchAll(PDO::FETCH_ASSOC);

                if ($result) {
                    echo "<table>";
                    echo "<thead>";
                    echo "<tr>";
                    echo "<th>ชื่อ</th>";
                    echo "<th>เลขห้อง</th>";
                    echo "<th>ประเภทปัญหา</th>";
                    echo "<th>ข้อมูลปัญหา</th>";
                    echo "<th>สถานะปัญหา</th>";
                    echo "</tr>";
                    echo "</thead>";
                    echo "<tbody>";

                    foreach ($result as $row_report) {
                        if ($row_report['Resta'] == "เเจ้งปัญหา") {
                            $string =  'btn btn-danger';
                        } else if ($row_report['Resta'] == "กำลังดำเนิน") {
                            $string =  'btn btn-info';
                        } else {
                            $string = 'btn btn-success';
                        }
                        echo "<tr>";
                        echo "<td>" . $row_report['Name'] . "</td>";
                        echo "<td>" . $row_report['roomId'] . "</td>";
                        echo "<td>" . $row_report['Retype'] . "</td>";
                        echo "<td style='max-width: 10ch; overflow: hidden; text-overflow: ellipsis;'>" . $row_report['Redata'] . "</td>";
                        echo "<td class='$string'>" . $row_report['Resta'] . "</td>";
                        echo "</tr>";
                    }

                    echo "</tbody>";
                    echo "</table>";
                };
            };
        }
        ?>
    </div>
</body>

</html>