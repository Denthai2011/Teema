<?php session_start();
require_once 'mysql/connect.php';
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

        td {
            border: 50px;
        }
    </style>
</head>

<body>
    <header>
        <ul class="nav nav-tabs bg-dark">
            <li class="nav-item">
                <a class="nav-link" aria-current="page" href="home.php"><i class="fa-solid fa-house fa-fade fa-xl"></i></a>
            </li>
            <li class="nav-item">
                <a class="nav-link active" href="usermang.php">ข้อมูลผู้ใช้</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="waterdata.php">ค่าน้ำ</a>
            </li>
            <li class="nav-item">
            <a class="nav-link" href="electdata.php">ค่าไฟ</a>
            </li>
            <li class="nav-item">
                <a class="nav-link " href="login.php"><i class="fa-solid fa-bed-front"></i></a>
            </li>
        </ul>
        </ul>
    </header>
    <section>
        <button type="button" class="btn btn-success " data-bs-toggle="modal" data-bs-target="#Add">Add</button>
        <div class="container">
            <table class="table table-striped table-bordered table-hover">
                <thead>
                    <tr>
                        <td>id</td>
                        <td>ชื่อผู้ใช้</td>
                        <td>รหัสผู้ใช้</td>
                        <td>ชื่อ</td>
                        <td>นามสกุล</td>
                        <td>เบอร์โทร</td>
                        <td>ที่อยู่บ้าน</td>
                        <td>ที่อยุ่ทำงาน</td>
                        <td>ตำเเหน่ง</td>
                        <td>วันเข้า</td>
                        <td>วันออก</td>
                    </tr>
                </thead>
                <tbody>
                    <?php $sql = "SELECT * FROM user";
                    $stmt = $conn->prepare($sql);
                    $stmt->execute();
                    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
                    if ($result) {
                        foreach ($result as $row) {
                            $id = $row['id'];

                    ?>
                <tbody>
                    <tr>
                        <td><?php echo $row["id"] ?></td>
                        <td><?php echo $row["username"] ?></td>
                        <td><?php echo $row["password"] ?></td>
                        <td><?php echo $row["Name"] ?></td>
                        <td><?php echo $row["Lname"] ?></td>
                        <td><?php echo $row["Tel"] ?></td>
                        <td><?php echo $row["Address"] ?></td>
                        <td><?php echo $row["Weddress"] ?></td>
                        <td><?php echo $row["urold"] ?></td>
                        <td><?php echo $row["Datein"] ?></td>
                        <td><?php echo $row["Dateout"] ?></td>
                        <td>
                            <div class="col-md-6">
                                <a href="#editmodal_<?php echo $row['id']; ?>" class="btn btn-warning" data-bs-toggle="modal">edit </a>
                            </div>
                        <td>
                            <div class="col-md-6">
                                <a href="#deletemodal_<?php echo $row['id']; ?>" class="btn btn-danger" data-bs-toggle="modal">delete</a>
                            </div>

                        </td>
                        <?php include("edit-delete_usermodal.php"); ?>
                    </tr>

                </tbody>
        <?php   }
                    } ?>
        </tbody>
            </table>
        </div>

    </section>
    <div class="modal fade" id="Add" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header bg-success">
                    <h5 class="modal-title" id="exampleModalLabel">เพิ่ม</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="adduser.php" method="post">
                        <div class="mb-3">
                            <label for="Name" class="col-form-label">ชื่อผู้ใช้:</label>
                            <input type="text" name="username" class="form-control w-50" value="">
                        </div>
                        <div class="mb-3">
                            <label for="Lname" class="col-form-label">รหัสผู้ใช้:</label>
                            <input type="text" name="password" class="form-control w-50" value="">
                        </div>
                        <div class="mb-3">
                            <label for="Lname" class="col-form-label">ชื่อ:</label>
                            <input type="text" name="Name" class="form-control" value="">
                        </div>
                        <div class="mb-3">
                            <label for="Lname" class="col-form-label">นามสกุล:</label>
                            <input type="text" name="Lname" class="form-control" value="">
                        </div>
                        <div class="mb-3">
                            <label for="Lname" class="col-form-label">เบอร์โทร:</label>
                            <input type="text" name="Tel" class="form-control" value="">
                        </div>
                        <div class="mb-3">
                            <label for="Lname" class="col-form-label">ที่อยู่บ้าน:</label>
                            <input type="text" name="Address" class="form-control" value="">
                        </div>
                        <div class="mb-3">
                            <label for="Lname" class="col-form-label">ที่อยุ่ทำงาน:</label>
                            <input type="text" name="Weddress" class="form-control" value="">
                        </div>
                        <div class="mb-3">
                            <label for="Lname" class="col-form-label">ตำเเหน่ง:</label>
                            <input type="text" name="urold" class="form-control" value="">
                        </div>
                        <div class="mb-3">
                            <label for="Lname" class="col-form-label">วันเข้า:</label>
                            <input type="Date" name="Datein" class="form-control" value="">
                        </div>
                        <div class="mb-3">
                            <label for="Lname" class="col-form-label">วันออก:</label>
                            <input type="Date" name="Dateout" class="form-control" value="">
                        </div>

                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="submit" name="add" class="btn btn-primary">Save Changes</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    
</body>

</html>