<?php session_start();
require_once 'mysql/connect.php';
$roomId = $_GET['roomId'];
$roomId = $row['roomId'];
?>
<!DOCTYPE html>
<html>
<meta charset="utf-8">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
<script src="https://kit.fontawesome.com/401736f69f.js" crossorigin="anonymous"></script>

<head>
</head>

<body>
    <?php
    // ดึงข้อมูลจากฐานข้อมูล
    $sql = "SELECT Name,Lname,Dps  FROM room WHERE roomId = :roomId";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':roomId', $roomId);
    $stmt->execute();
    $row = $stmt->fetch(PDO::FETCH_ASSOC);

    // แสดงข้อมูลในฟอร์ม
    ?>
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
                            <label for="roomId"class="col-form-label"><?php echo $roomId ?></label>
                        </div>
                        <div class="mb-3">
                            <label for="Name" class="col-form-label">ชื่อ:</label>
                            <input type="text" name="Name" value="<?php echo $row['Name'];?>">
                        </div>
                        <div class="mb-3">
                            <label for="Lname" class="col-form-label">นามสกุล:</label>
                            <input type="text" name="Lname" class="form-control" value="<?php echo $row['Lname'];?>">
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
                            <button type="submit?roomId=<?php echo $row['roomId']; ?>" name="edit" class="btn btn-primary">Save Changes</button>
                        </div>
                    </form>
                </div>
            </div>

        </div>
    </div>
    </div>
    <div class="container mt-5">
        <form>
            <div class="col-md-6 d-flex justify-content-end">
                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#usermodal">เเก้ไขข้อมูล</button>
            </div>
            <dive>
                <label for="roomId">ห้องที่:</label>
            <label type="text" name="roomId"> <?php echo $roomId; ?></label>
            </dive>
            <div>
                <label for="Name">ชื่อ:</label>
                <input type="text" id="Name" name="Name" value="<?php echo $row['Name']; ?>" readonly>
            </div>
            <div>
                <label for="Lname">นามสกุล:</label>
                <input type="text" id="Lname" name="Lname" value="<?php echo $row['Lname']; ?>" readonly>
            </div>
            <div>
                <label for="Dps">ค่ามัดจำ:</label>
                <input type="tedx" id="Dps" name="Dps" value="<?php echo $row['Dps']; ?>" readonly>
            </div>
    </div>
    </form>
</body>

</html>