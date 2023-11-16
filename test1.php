<?php session_start();
require_once 'mysql/connect.php';
if (!isset($_SESSION['admin_login'])) {
    $_SESSION['error'] = 'กรุณาเข้าสู่ระบบ';
    header('location: index.php');
}
if (isset($_POST['logout'])) {
    session_destroy();
    header('location: index.php');
    exit();
} ?>
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
        * {
            box-sizing: border-box;
        }

        body {
            font-family: Arial, Helvetica, sans-serif;
            background-image: url('img/ท้องฟ้า.jpg');
            background-size: cover;
            background-repeat:round;
        }

        /* Style the header */
        header {
            padding: 30px;
            text-align: center;
            font-size: 35px;
            color: white;
        }

        /* Container for flexboxes */
        section {
            display: -webkit-flex;
            display: flex;
        }

        /* Style the navigation menu */
        nav {
            -webkit-flex: 1;
            -ms-flex: 1;
            flex: 1;
            padding: 20px;
            width: 50px;
            font-family: 'Pattaya', sans-serif;
        }

        /* Style the list inside the menu */
        nav ul {
            list-style-type: none;
            padding: 0;
        }

        /* Style the content */
        article {
            -webkit-flex: 3;
            -ms-flex: 3;
            flex: 3;
            background-color: #f1f1f1;
            padding: 10px;
        }
        tbody td{text-align: center;}
        /* Style the footer */
        footer {
            padding: 10px;
            text-align: center;
            color: white;
            background-color: darkblue;
        }

        .nav {
            display: flex;
            flex-direction: column;
            text-align: center;
            margin: auto;
            width: 80%;
        }

        .li1 {

            margin-top: 10px;
            font-size: 30px;

        }
        .li1:active {
            background-color: #696969;
            box-shadow: 3px 3px 5px 5px black;
            font-size: 30px;
        }

        .li2 {

            margin-top: 15px;

        }

        .nav-link.active {
            background-color: #696969;
            box-shadow: 3px 3px 5px 5px black;
            font-size: 30px;
            color: #ffffff;
        }

        .nav-link.active i {
            color: #ffffff;
        }

        .li1:hover {
            background-color: orange;
            box-shadow: 2px 2px 2px 2px black;
        }

        .li2 input:hover {
            background-color: orange;
            box-shadow: 2px 2px 2px 2px black;
            color: white;
            background-color: black;
        }

        /* Responsive layout - makes the menu and the content (inside the section) sit on top of each other instead of next to each other */
        @media (max-width: 600px) {
            section {
                -webkit-flex-direction: column;
                flex-direction: column;
            }
        }
    </style>
</head>

<body>
    <header>
        <h2 style="color:black;text-shadow:3px 3px gold;">ผู้เช่า</h2>
    </header>
    <?php if (isset($_SESSION['Success'])) { ?>
        <div class="alert alert-success">
            <?php
            echo $_SESSION['Success'];
            unset($_SESSION['Success']);
            ?>
        </div><?php } ?>
    <section>
        
        <nav class="nav1">
            <form>
                <ul class="nav">
                    <li class="li1 nav-item">
                        <a class="nav-link" aria-current="page" href="hometes.php"><i class="fa-solid fa-house fa-fade fa-lg"> ห้องเช่า</i></a>
                    </li>
                    <li class="li1 nav-item">
                        <a href="test1.php" class="nav-link active"><i class="fa-solid fa-user fa-fade"> ผู้ใช้งาน</i></a>
                    </li>
                    <li class="li1 nav-item">
                        <a href="test5.php" class="nav-link"><i class="fa-solid fa-user fa-fade"> การเช่า</i></a>
                    </li>
                    <li class="li1 nav-item">
                        <a class="nav-link " href="test2.php"><i class="fa-solid fa-water fa-fade"> ค่าน้ำ</i></a>
                    </li>
                    <li class="li1 nav-item">
                        <a class="nav-link" href="test3.php"><i class="fa-solid fa-bolt fa-fade"> ค่าไฟ</i></a>
                    </li>
                    <li class="li1 nav-item">
                        <a class="nav-link" href="test4.php"><i class="fa-regular fa-flag fa-fade"> เเจ้งปัญหา</i></a>
                    </li>
            </form>
            <li class="li2">
                <form method="post" action="">
                    <input type="submit" name="logout" value="ออกจากระบบ">
                </form>
            </li>
            </ul>
        </nav>
        <article>
            <button type="button" class="btn btn-success " data-bs-toggle="modal" data-bs-target="#Add">Add</button>
            <div class="container">
                <form method="post">
                    <input type="text" class="col-form-label" placeholder="ชื่อผู้ใช้ หรือ ไอดี" name="search">
                    <button type="reset">รีเฟรช</button>
                </form>
                <table class="table table-bordered table-hover">
                    <thead style="text-align: center;">
                        <tr>
                            <td>ชื่อผู้ใช้</td>
                            <td>รหัสผู้ใช้</td>
                            <td>ชื่อ</td>
                            <td>นามสกุล</td>
                            <td>เบอร์โทร</td>
                            <td>ที่อยู่บ้าน</td>
                            <td>ที่อยุ่ทำงาน</td>
                            <td>ตำเเหน่ง</td>
                            <td colspan="2">จัดการ</td>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if (empty($_POST['search'])) {
                                $home = "";
                                }
                        if (isset($_POST['search'])){
                            $home = $_POST['search'];}  // ไม่ต้องใส่ + หรือ ''
                            $sql = "SELECT * FROM user WHERE Name LIKE :search";
                            $stmt = $conn->prepare($sql);
                            $stmt->bindValue(':search', "%$home%", PDO::PARAM_STR);
                            $stmt->execute();
                            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
                        if ($result) {
                            foreach ($result as $row) {
                                $id = $row['id'];
                        ?>
                    <tbody>
                        <tr>
                            <td><?php echo $row["username"] ?></td>
                            <td><?php echo $row["password"] ?></td>
                            <td style="white-space: nowrap;"><?php echo $row["Name"] ?></td>
                            <td><?php echo $row["Lname"] ?></td>
                            <td><?php echo $row["Tel"] ?></td>
                            <td><?php echo $row["Address"] ?></td>
                            <td><?php echo $row["Weddress"] ?></td>
                            <td><?php echo $row["urold"] ?></td>
                            <td rowspan="2">
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
                <?php   }
                        }
                     else {
                        echo "ไม่พบผลลัพธ์";
                    } ?>
                    </tbody>
                </table>
                
            </div>

            <form action="testfont1.php" method="post">
                    วันเข้าตั้งเเต่<input type="date"  name="datest">
                    ถึงวันที่<input type="date"  name="dateed">
                    <button type="submit" name="research">พิมพ์</button>
                    <button type="reset" class="btn btn-secondary">รีเฟรช</button>
                </form>
        </article>
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
                            <select name="urold">
                                <option value="ผู้เช่า">ผู้เช่า</option>
                                <option value="เจ้าหน้าที่">เจ้าหน้าที่</option>
                                <option value="เจ้าของหอพัก">เจ้าของหอพัก</option>
                            </select>
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
    <footer>
        <pre>หอพักนางตีมะขำธานี 51/46 ม.4 ต.คลองหนึ่ง อ. คลองหลวง จ.ปทุมธานี้ ถนน พหลโยธิน
  โทร 025161320 โทรศัพท์ 0984610262   Gmail polamet.yingni@vru.ac.th Facebook  Nus’Den
  </pre>
    </footer>
</body>

</html>