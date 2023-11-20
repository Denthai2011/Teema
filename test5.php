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
            background-repeat: round;
        }

        /* Style the header */
        header {
            padding: 30px;
            text-align: center;
            font-size: 35px;
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
            background-color: black;
            box-shadow: 3px 3px 5px 5px black;
            font-size: 30px;
            color: greenyellow;
            text-shadow: 2px 2px white;
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

        <h2 style="color:black;text-shadow:3px 3px gold;">การเช่า</h2>
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
                        <a href="test1.php" class="nav-link"><i class="fa-solid fa-user fa-fade"> ผู้ใช้งาน</i></a>
                    </li>
                    <li class="li1 nav-item">
                        <a href="test5.php" class="nav-link active"><i class="fa-solid fa-user fa-fade"> การเช่า</i></a>
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
                    <li class="li1 nav-item">
                        <a class="nav-link" href="test6.php"><i class="fa-solid fa-money-bill" ></i>รายได้ทั้งหมด</a>
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
                    <input type="text" class="col-form-label" placeholder="ชื่อผู้เช่า หรือ ห้องที่เช่า" name="search">
                    <button type="reset" class="btn btn-secondary">รีเฟรช</button>
                </form>
                <table class="table  table-bordered table-hover">
                    <thead style="text-align: center;">
                        <tr>
                            <td>วันเข้า</td>
                            <td>วันออก</td>
                            <td>เลขห้อง</td>
                            <td>ชื่อ</td>
                            <td>นามสกุล</td>
                            <td>ค่ามัดจำ</td>
                            <td>สถานะค่ามัดจำ</td>
                            <td colspan="2">จัดการ</td>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if (empty($_POST['search'])) {
                            $home = "";
                        }
                        if (isset($_POST['search'])) {
                            $home = $_POST['search'];
                        }  // ไม่ต้องใส่ + หรือ ''
                        $sql = "SELECT * FROM renting WHERE Name || roomId LIKE :search ORDER BY Datein;";
                        $stmt = $conn->prepare($sql);
                        $stmt->bindValue(':search', "%$home%", PDO::PARAM_STR);
                        $stmt->execute();
                        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
                        if ($result) {
                            foreach ($result as $row) {
                                $renId = $row['renId'];
                        ?>
                    <tbody>
                        <tr>
                            <td style="white-space: nowrap;"><?php echo $row["Datein"] ?></td>
                            <td style="white-space: nowrap;"><?php echo $row["Dateout"] ?></td>
                            <td><a href="detaroom copy.php?roomId=<?php echo $row['roomId']; ?>"><?php echo $row["roomId"] ?></a></td>
                            <td style="white-space: nowrap;"><?php echo $row["Name"] ?></td>
                            <td><?php echo $row["Lname"] ?></td>
                            <td><?php echo $row["Deposit"] ?></td>
                            <td><?php echo $row["staDep"] ?></td>
                            <td rowspan="2">
                                <div class="col-md-6">
                                    <a href="#editmodal_<?php echo $row['renId']; ?>" class="btn btn-warning" data-bs-toggle="modal">edit</a>
                                </div>
                            <td>
                                <div class="col-md-6">
                                    <a href="#deletemodal_<?php echo $row['renId']; ?>" class="btn btn-danger" data-bs-toggle="modal">delete</a>
                                </div>

                            </td>
                            <?php include("edit-delete_renting.php"); ?>
                        </tr>
                <?php   }
                        } else {
                            echo "ไม่พบผลลัพธ์";
                        } ?>
                    </tbody>
                </table>

            </div>

            <form action="testfont5.php" method="post">
                วันเข้าตั้งเเต่<input type="date" name="datest">
                ถึงวันที่<input type="date" name="dateed">
                <button type="submit" class="btn btn-success" name="research">พิมพ์</button>
                <button type="reset" class="btn btn-secondary">รีเฟรช</button>
            </form>
        </article>
    </section>
    <div class="modal fade" id="Add" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header bg-success">
                    <h5 class="modal-title" id="exampleModalLabel">เพิ่มการเช่า</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="addrenting.php" method="post">
                        <div class="mb-3">
                            <label for="Name" class="col-form-label">ชื่อ:</label>
                            <select name="Name" id="selectName">
                                <?php
                                if ($row !== false) {
                                    $nameselect = $conn->prepare("SELECT Name, Lname FROM user");
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
                            <label for="Lname" class="col-form-label">วันเข้า:</label>
                            <input type="Date" name="Datein" class="form-control" value="">
                        </div>
                        <div class="mb-3">
                            <label for="Lname" class="col-form-label">วันออก:</label>
                            <input type="Date" name="Dateout" class="form-control" value="">
                        </div>
                        <div class="mb-3">
                            <label for="roomId" class="col-form-label">ห้องที่เช่า:</label>
                            <input type="Text" name="roomId" class="form-control" value="">
                        </div>
                        <div class="mb-3">
                            <label for="Deposit" class="col-form-label">ค่ามัดจำ:</label>
                            <select name="Deposit">
                                <option value=1500>1500</option>
                                <option value=2000>2000</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="staDep" class="col-form-label">สถานะค่ามัดจำ:</label>
                            <select name="staDep">
                                <option value="จ่ายเเล้ว">จ่ายเเล้ว</option>
                                <option value="ยังไม่จ่าย">ยังไม่จ่าย</option>
                            </select>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="submit" name="addren" class="btn btn-primary">Save Changes</button>
                        </div>
                    </form>
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
    </div>
    <footer>
        <pre>หอพักนางตีมะขำธานี 51/46 ม.4 ต.คลองหนึ่ง อ. คลองหลวง จ.ปทุมธานี้ ถนน พหลโยธิน
  โทร 025161320 โทรศัพท์ 0984610262   Gmail polamet.yingni@vru.ac.th Facebook  Nus’Den
  </pre>
    </footer>
</body>

</html>