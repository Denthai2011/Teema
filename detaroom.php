<?php session_start();
require_once 'mysql/connect.php';
$roomId = $_GET['roomId'];

?>
<!DOCTYPE html>
<html>
<meta charset="utf-8">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
<script src="https://kit.fontawesome.com/401736f69f.js" crossorigin="anonymous"></script>

<head>
    <style>
        label {
            font-size: 20px;
        }

        .table2 {
            border-collapse: collapse;
            width: 100%;
            font-size: 16px;
        }

        /* สไตล์สำหรับแถวหัวของตาราง */
        .table2 th {
            background-color: #f2f2f2;
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



        .table-container {
            display: flex;
            gap: 1px;
            /* ระยะห่างระหว่างตาราง */
        }

        .form1 {
            border: 3px solid black;
            padding: 20px;
            background-color: #f5f5f5;
            border-radius: 10px;
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
    </style>
</head>

<body>
    <header>
        <ul class="nav nav-tabs bg-dark">
        <?php if (!isset($_SESSION['admin_login'])) {
            echo "
            <li class='nav-item'>
                <a class='nav-link active' aria-current='page' href='home.php'><i class='fa-solid fa-house fa-fade fa-xl'></i></a>
            </li>
            ";}
            else{
                echo "
            <li class='nav-item'>
                <a class='nav-link active' aria-current='page' href='home.php'><i class='fa-solid fa-house fa-fade fa-xl'></i></a>
            </li>
            <li class='nav-item'>
                <a class='nav-link'  href='usermang.php'>ข้อมูลผู้ใช้</a>
            </li>
            <li class='nav-item'>
                <a class='nav-link'  href='waterdata.php'>ค่าน้ำ</a>
            </li>
            <li class='nav-item'>
                <a class='nav-link'  href='electdata.php'>ค่าไฟ</a>
            </li>
            <li class='nav-item'>
                <a class='nav-link' href='index.php'><i class='fa-solid fa-bed-front'></i></a>
            </li>"
            ;} ?>
        </ul>
    </header>
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
    <div class="container mt-5 d-flex justify-content-center">
        <form class="form1" style="border: 3px solid black; padding:20px;">
            <table class="table1">
                <tr>
                    <dive>
                        <td>
                            <label for="roomId">ห้องที่:</label>
                        </td>
                        <td><label type="text" name="roomId"> <?php echo $roomId; ?></label></td>
                    </dive>
                </tr>
                <div>
                    <tr>
                        <td>
                            <label for="Name">ชื่อ: </label>
                        </td>
                        <td><label type="text" id="Name" name="Name"> <?php echo $row['Name']; ?> </label></td>
                </div>
                <div>
                    <td><label type="text" id="Lname" name="Lname"><?php echo $row['Lname']; ?></label></td>
                </div>
                </tr>
                <tr>
                    <div>
                        <td>
                            <label for="Dps">ค่าห้อง:</label>
                        </td>
                        <td><label type="tedx" id="Dps" name="Dps"><?php echo $row['Dps']; ?></label></td>
                    </div>
                </tr>
            </table>
    </div>
    </form>
    <br>
    <div style="height: 200px;" class="table-container">
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
                <tr>
                    <th>ค่าไฟ</th>
                    <td><?php echo $Eitp = $Eitp * 10  ?></td>
                </tr>
        </table>

        <table class="table2">
            <thead>
                <tr>
                    <th>ค่ามิเตอร์ไฟเดือนก่อน</th>
                    <td><?php echo $row["W_bef"] ?></td>

                </tr>
                <tr>
                    <th>ค่ามิเตอร์ไฟเดือนนี้</th>
                    <td><?php echo $row["W_af"] ?></td>
                </tr>
                <tr>
                    <th>ค่าต่างมิเตอร์</th>
                    <td><?php echo $Witp = $row["W_af"] - $row["W_bef"]  ?></td>
                    <th>ค่าห้อง</th>
                    <th>รวม</th>
                </tr>
                <tr>
                    <th>ค่าไฟ</th>
                    <td><?php echo $Witp = $Witp * 10  ?></td>

                    <td><?php echo $row['Dps'] ?></td>
                    <td><?php echo $Sum = $Eitp + $Witp + $row['Dps'] ?></td>
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
                </div>
            </div>
        </div>
    </div>
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

</body>

</html>