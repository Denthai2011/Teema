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
        a {
            text-decoration: none !important;
        }

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
            background-color: #fff;
            padding: 10px;
        }

        tbody td {
            text-align: center;
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
            color: gold;
            text-shadow: 2px 2px goldenrod;
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

        .row ul li {
            width: 15%;
            text-align: center;
        }

        ul {
            list-style: none;
        }

        .icon img {
            display: block;
            margin: 20px 20px 20px 20px;
        }

        .list-item {
            background-color: #f4f4f4;
            text-align: center;
            padding: 40px 0px;
            margin: 15px 0px;
            transition: all 0.5s;
            height: 200px;
            width: 200px;

        }

        .active .list-item {
            background-color: #f2745f !important;
            color: #fff;
        }

        .icon {
            width: 90px;
            height: 90px;
            border-radius: 50%;
            display: inline-block;
            text-align: center;
            line-height: 90px;
            background-color: #fff;
        }
        section2{
        display: flex;
        align-items: center;
        flex-direction: column;
        }
    </style>
</head>

<body>
    <header>
        <h2 style="color:black;text-shadow:3px 3px gold;">ข้อมูลค่าใช้จ่ายรายจำเดือน</h2>
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
                        <a href="owner.php" class="nav-link active"><i class="fa-solid fa-user fa-fade"> รายงานทั้งหมด</i></a>
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
            <div class="row">
                <ul class="tabs clearfix" data-tabgroup="second-tab-group" style="display:flex;justify-content: space-between;padding-left: 70px;">
                    <li class="col-md-15 col-sm-12 col-xs-12">
                        <a href="#ren" class="active">
                            <div class="list-item">
                                <div class="icon">
                                    <img src="img/a1_50.jpg" height="50" width="50" alt="">
                                </div>
                                <h4>รายงานผู้เช่า</h4>
                            </div>
                        </a>
                    </li>
                    <li class="col-md-15 col-sm-12 col-xs-12">
                        <a href="#Month">
                            <div class="list-item">
                                <div class="icon">
                                    <img src="img/a2_50.jpg" height="50" width="50" alt="">
                                </div>
                                <h4>ค่าใช้จ่ายประจำเดือน</h4>
                            </div>
                        </a>
                    </li>
                    <li class="col-md-15 col-sm-12 col-xs-12">
                        <a href="#Money">
                            <div class="list-item">
                                <div class="icon">
                                    <img src="img/cus2.jpg" height="50" width="50" alt="">
                                </div>
                                <h4>ข้อมูลรายได้</h4>
                            </div>
                        </a>
                    </li>
                    <li class="col-md-15 col-sm-12 col-xs-12">
                        <a href="#report">
                            <div class="list-item">
                                <div class="icon">
                                    <img src="img/cus3.jpg" height="50" width="50" alt="">
                                </div>
                                <h4>การแจ้งซ่อม</h4>
                            </div>
                        </a>
                    </li>
                </ul>
            </div>
            <div class="container">
                <div id="second-tab-group" class="tabgroup">
                    <div id="ren">
                        <table class="table  table-bordered table-hover" style="text-align: center;">
                            <thead>
                                <tr>
                                    <td>วันเข้า</td>
                                    <td>เลขห้อง</td>
                                    <td>ชื่อ</td>
                                    <td>นามสกุล</td>
                                    <td>ค่ามัดจำ</td>
                                    <td>จ่ายค่ามัดจำ</td>
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
                                    <td><a href="detaroom copy.php?roomId=<?php echo $row['roomId']; ?>"><?php echo $row["roomId"] ?></a></td>
                                    <td style="white-space: nowrap;"><?php echo $row["Name"] ?></td>
                                    <td><?php echo $row["Lname"] ?></td>
                                    <td><?php echo $row["Deposit"] ?></td>
                                    <td><?php echo $row["Deppay"] ?></td>
                                    <td style="text-align: center;">
                                        <div>
                                            <a href="ren.php?renId=<?php echo $row['renId']; ?>"> <i class="fa-regular fa-paste fa-xl"></i></a>
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
                        <form action="testfont5.php" method="post">
                        วันเข้าตั้งเเต่<input type="date" name="datest">
                        ถึงวันที่<input type="date" name="dateed">
                        <button type="submit" class="btn btn-success" name="research">พิมพ์</button>
                        <button type="reset" class="btn btn-secondary">รีเฟรช</button>
            </form>
                    </div>
                    <div id="Month">
                        <table class="table table-bordered table-hover">
                            <thead style="text-align: center;">
                                <tr>
                                    <td>เลขห้อง</td>
                                    <td>วันที่จ่าย</td>
                                    <td>ค่าน้ำ</td>
                                    <td>ค่าไฟ</td>
                                    <td>ค่าห้อง</td>
                                    <td>ทั้งหมด</td>
                                    <td>หลักฐานการโอนเงิน</td>
                                    <td>สถานะจ่าย</td>
                                </tr>
                            </thead>
                            <tbody>
                                <?php if (empty($_POST['searchtype'])) {
                                    $searchtype = "";
                                }
                                if (empty($_POST['searchroom'])) {
                                    $searchid = "";
                                }
                                if (empty($_POST['searchdate'])) {
                                    $searchdate = "";
                                }
                                if (isset($_POST['see'])) {
                                    $searchtype = $_POST['searchtype'];
                                    $searchid = $_POST['searchid'];
                                    $searchdate = $_POST['searchdate'];
                                }
                                $sql2 = "SELECT month.roomId,month.Date_cack,month.S_EL,month.S_WA,month.Dps,month.total,month.MC_sta,imges.Date_up,imges.file_name,imges.type_img FROM month LEFT JOIN imges ON imges.roomId=month.roomId  WHERE  month.roomId LIKE :searchid AND Date_cack LIKE :searchdate AND MC_sta LIKE :searchtype ORDER by roomId";
                                $stmt2 = $conn->prepare($sql2);
                                $stmt2->bindValue(':searchtype', "%$searchtype%", PDO::PARAM_STR);
                                $stmt2->bindValue(':searchid', "%$searchid%", PDO::PARAM_STR);
                                $stmt2->bindValue(':searchdate', "%$searchdate%", PDO::PARAM_STR);
                                $stmt2->execute();
                                $result2 = $stmt2->fetchAll(PDO::FETCH_ASSOC);
                                if ($result2) {
                                    foreach ($result2 as $row2) {

                                ?>
                            <tbody>
                                <tr>
                                    <td><?php echo $row2["roomId"] ?></td>
                                    <td><?php echo $row2["Date_cack"] ?></td>
                                    <td><?php echo $row2["S_EL"] ?></td>
                                    <td><?php echo $row2["S_WA"] ?></td>
                                    <td><?php echo $row2["Dps"] ?></td>
                                    <td><?php echo $row2["total"] ?></td>

                                    <td style="width: 100px;">
                                        <a href="uploads/<?php echo $row2['file_name'] ?>" target="_blank"><img src="uploads/<?php echo $row2['file_name'] ?>" height="50" width="200"></a>
                                    </td>
                                    <td style="white-space: nowrap;"><?php echo $row2["MC_sta"] ?></td>
                                </tr>
                        <?php };
                                } ?>
                            </tbody>
                        </table>
                        <form method="post" action="Monthfont.php">
                            <label>วันที่จ่าย:</label>
                            <select class="col-form-label" name="searchdate">
                                <option value="">ทุกเดือน</option>
                                <option value="-1-">มกราคม</option>
                                <option value="-2-">กุมภาพันธ์</option>
                                <option value="-3-">มีนาคม</option>
                                <option value="-4-">เมษายน</option>
                                <option value="-5-">พฤษภาคม</option>
                                <option value="-6-">มิถุนายน</option>
                                <option value="-7-">กรกฎาคม</option>
                                <option value="-8-">สิงหาคม</option>
                                <option value="-9-">กันยายน</option>
                                <option value="-10-">ตุลาคม</option>
                                <option value="-11-">พฤศจิกายน</option>
                                <option value="-12-">ธันวาคม</option>
                            </select>
                            <input class="col-form-label" type="text" style="text-align: center;" placeholder="ห้อง" name="searchid">
                            <label>สถานะการจ่าย</label>
                            <select class="col-form-label" name="searchtype">
                                <option value="">ทั้งหมด</option>
                                <option value="ไม่ถึงกำหนด">ไม่ถึงกำหนด</option>
                                <option value="จ่ายเเล้ว">จ่ายเเล้ว</option>
                                <option value="ยังไม่จ่าย">ยังไม่จ่าย</option>
                            </select>
                            <button type="submit" class="btn btn-success" name="see">พิมพ์</button>
                            <button type="reset" class="btn btn-secondary">รีเฟรช</button>
                        </form> 
                    </div>
                    <div id="Money">
                        <table class="table table-bordered table-hover">
                            <thead style="text-align: center;">
                                <tr>
                                    <td>วันที่จ่าย</td>
                                    <td>เลขห้อง</td>
                                    <td>ราคา</td>
                                    <td>ประเภท</td>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                if (empty($_POST['searchMtype'])) {
                                    $searchMtype = "";
                                }
                                if (empty($_POST['searchMid'])) {
                                    $searchMid = "";
                                }
                                if (isset($_POST['Msee'])) {
                                    $searchMtype = $_POST['searchMtype'];
                                    $searchMid = $_POST['searchMid'];
                                } // ไม่ต้องใส่ + หรือ ''
                                $sql3 = "SELECT * FROM money WHERE typepay LIKE :searchMtype AND roomId LIKE :searchMid";
                                $stmt3 = $conn->prepare($sql3);
                                $stmt3->bindValue(':searchMtype', "%$searchMtype%", PDO::PARAM_STR);
                                $stmt3->bindValue(':searchMid', "%$searchMid%", PDO::PARAM_STR);
                                $stmt3->execute();
                                $result3 = $stmt3->fetchAll(PDO::FETCH_ASSOC);
                                if ($result3) {
                                    foreach ($result3 as $row3) {
                                        $M_id = $row3['M_id'];
                                ?>
                            <tbody>
                                <tr>
                                    <td><?php echo $row3["Datepay"] ?></td>
                                    <td><?php echo $row3["roomId"] ?></td>
                                    <td><?php echo $row3["price"] ?></td>
                                    <td style="white-space: nowrap;"><?php echo $row3["typepay"] ?></td>
                                </tr>
                        <?php };
                                } ?>
                            </tbody>
                        </table>
                        <form action="Moneyfont.php" method="post">
                        <input class="col-form-label" type="text" placeholder="ประเภท" name="searchtype">
                            <input class="col-form-label" type="text" placeholder="ห้อง" name="searchid">
                            <button type="submit" class="btn btn-success" name="research">พิมพ์</button>
                            <button type="reset" class="btn btn-secondary">รีเฟรช</button>
                        </form>
                    </div>
                    <div id="report">
                        <section2>
                        
                        
                        <table>
                            <thead>
                                <tr>
                                    <th>ลำดับ</th>
                                    <th>ชื่อผู้เเจ้ง</th>
                                    <th>ห้องที่เเจ้ง</th>
                                    <th>ประเภทของปัญหา</th>
                                    <th>สถานะเเจ้ง/ซ๋อม</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php if (empty($_POST['searchreport'])) {
                                    $report = "";
                                }
                                if (isset($_POST['searchreport'])) {
                                    $report = $_POST['searchreport'];
                                }
                                $sql4 = "SELECT * FROM report WHERE roomId LIKE :searchreport || Retype LIKE :searchreport || Resta LIKE :searchreport";
                                $stmt4 = $conn->prepare($sql4);
                                $stmt4->bindValue(':searchreport', "%$report%", PDO::PARAM_STR);
                                $stmt4->execute();
                                $result4 = $stmt4->fetchAll(PDO::FETCH_ASSOC);
                                if ($result4) {
                                    foreach ($result4 as $row4) {
                                        $ReId = $row4['ReId'];
                                ?>

                                        <tr>
                                            <td><?php echo $row4['ReId'] ?></td>
                                            <td><?php echo $row4['Name'] ?></td>
                                            <td><?php echo $row4['roomId'] ?></td>
                                            <td><?php echo $row4['Retype'] ?></td>
                                            <td><?php echo $row4['Resta'] ?></td>
                                            <td>
                                                <div class="col-md-6">
                                                    <a href="#reportdetailmodal_<?php echo $row4['ReId']; ?>" class="btn btn-warning" data-bs-toggle="modal">จัดการ</a>
                                                </div>
                                            </td>
                                            <?php include("report_detailmodal.php"); ?>
                                        </tr>
                                        </tr>
                            </tbody>
                    <?php };
                                } else {
                                    echo "ไม่พบผลลัพธ์";
                                } ?>
                        </table>
                        <form action="testfont4.php" method="post">
                            <input type="text" placeholder="ห้อง หรือ ปัญหา หรือ สถานะ" name="search">
                            <button type="submit" class="btn btn-success" name="research">พิมพ์</button>
                            <button type="reset" class="btn btn-secondary">รีเฟรช</button>
                        </form>
                        </section2>
                    </div>
                </div>
                <script>
                    // สร้างฟังก์ชันเพื่อเปลี่ยนสถานะของแท็บ
                    function changeTab(tabId) {
                        // หากมีการคลิกที่แท็บที่ยังไม่ได้เปิดให้ทำการปิดทั้งหมด
                        document.querySelectorAll('.tabs a').forEach(function(tab) {
                            tab.classList.remove('active');
                        });

                        // แท็บที่ถูกคลิกจะถูกเปลี่ยนเป็น active
                        document.querySelector(`.tabs a[href="#${tabId}"]`).classList.add('active');

                        // ซ่อนทั้งหมด
                        document.querySelectorAll('.tabgroup div').forEach(function(tabContent) {
                            tabContent.style.display = 'none';
                        });

                        // แสดงแท็บที่ถูกคลิก
                        document.getElementById(tabId).style.display = 'block';
                    }

                    // เรียกใช้ฟังก์ชันเมื่อโหลดหน้า
                    document.addEventListener('DOMContentLoaded', function() {
                        // กำหนดค่าเริ่มต้น
                        changeTab('ren');

                        // กำหนดเหตุการณ์คลิกสำหรับทุกแท็บ
                        document.querySelectorAll('.tabs a').forEach(function(tab) {
                            tab.addEventListener('click', function(e) {
                                e.preventDefault();
                                // เรียกใช้ฟังก์ชันเมื่อคลิกที่แท็บ
                                changeTab(this.getAttribute('href').substring(1));
                            });
                        });
                    });
                </script>
            </div>
        </article>

    </section>
    <footer>
        <pre>หอพักนางตีมะขำธานี 51/46 ม.4 ต.คลองหนึ่ง อ. คลองหลวง จ.ปทุมธานี้ ถนน พหลโยธิน
  โทร 025161320 โทรศัพท์ 0984610262   Gmail polamet.yingni@vru.ac.th Facebook  Nus’Den
  </pre>
    </footer>
</body>

</html>