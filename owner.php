<?php session_start();
require_once 'mysql/connect.php';
if (!isset($_SESSION['Superadmin_login'])) {
    $_SESSION['error'] = 'กรุณาเข้าสู่ระบบ';
    header('location: index.php');
}
if (isset($_POST['logout'])) {
    session_destroy();
    header('location: index.php');
    exit();
}
$id = $_SESSION['Superadmin_login']; ?>
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

<!-- Custom styles for this template-->
<link href="css/sb-admin-2.min.css" rel="stylesheet">
<style>
    article {
        padding: 10px;
    }

    h5 {
        color: #fff;
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
        .col-sm-12 {
            flex: 0 0 0;
        }
</style>
</head>

<body id="page-top">
    <?php if (isset($_SESSION['Success'])) { ?>
        <div class="alert alert-success">
        <?php
        echo $_SESSION['Success'];
        unset($_SESSION['Success']);
    }
        ?>
        <!-- Page Wrapper -->
        <div id="wrapper">

            <!-- Sidebar -->
            <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

                <!-- Sidebar - Brand -->
                <a class="sidebar-brand d-flex align-items-center justify-content-center" href="hometes.php">
                    <div class="sidebar-brand-icon rotate-n-15">
                        <img src="img/logo.png" width="70" height="70">
                    </div>
                    <div class="sidebar-brand-text mx-3">หอพักนางตีมะขำธานี </div>
                </a>

                <!-- Divider -->
                <hr class="sidebar-divider my-0">

                <!-- Nav Item - Dashboard -->
                <li class="nav-item active">
                    <a class="nav-link" href="test1.php">
                        <i class="fa-solid fa-user fa-fade"></i>
                        <span>ข้อมูลผู้ใช้</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
                        <i class="fa-solid fa-user fa-fade"></i>
                        <span>การเช่า</span>
                    </a>
                    <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                        <div class="bg-white py-2 collapse-inner rounded">
                            <h6 class="collapse-header">เกี่ยวกับการเช่า:</h6>
                            <a class="collapse-item" href="test5.php">การเช่า</a>
                            <a class="collapse-item" href="test7.php">การยกเลิกการเช่า</a>
                        </div>
                    </div>
                </li>

                <!-- Divider -->
                <hr class="sidebar-divider">

                <!-- Heading -->
                <div class="sidebar-heading">
                    Update
                </div>

                <!-- Nav Item - Pages Collapse Menu -->


                <!-- Nav Item - Utilities Collapse Menu -->
                <li class="nav-item">
                    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities" aria-expanded="true" aria-controls="collapseUtilities">
                        <i class="fas fa-fw fa-wrench"></i>
                        <span>อัพเดทค่าน้ำ ไฟเเละปัญหา</span>
                    </a>
                    <div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
                        <div class="bg-white py-2 collapse-inner rounded">
                            <h6 class="collapse-header">การอัพเดท:</h6>
                            <a class="collapse-item" href="test2.php">ค่าน้ำ</a>
                            <a class="collapse-item" href="test3.php">ค่าไฟ</a>
                            <a class="collapse-item" href="test4.php">การเเจ้งปัญหา</a>
                        </div>
                    </div>
                </li>

                <!-- Divider -->
                <hr class="sidebar-divider">

                <!-- Heading -->
                <div class="sidebar-heading">
                    Money
                </div>

                <!-- Nav Item - Pages Collapse Menu -->
                <li class="nav-item">
                    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages" aria-expanded="true" aria-controls="collapsePages">
                        <i class="fas fa-fw fa-folder"></i>
                        <span>รายได้</span>
                    </a>
                    <div id="collapsePages" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
                        <div class="bg-white py-2 collapse-inner rounded">
                            <h6 class="collapse-header">เกี่ยวกับเงิน:</h6>
                            <a class="collapse-item" href="test8.php">ค่าใช่จ่ายต่อเดือน</a>
                            <a class="collapse-item" href="test6.php">รายได้ทั้งหมด</a>

                        </div>
                    </div>
                </li>

                <!-- Divider -->
                <hr class="sidebar-divider d-none d-md-block">

                <!-- Sidebar Toggler (Sidebar) -->
                <div class="text-center d-none d-md-inline">
                    <button class="rounded-circle border-0" id="sidebarToggle"></button>
                </div>
                <?php if (isset($_SESSION['Superadmin_login'])) {
                    echo "<li class='nav-item'>
                    <a class='nav-link' href='test1.php'>
                        <i class='fa-solid fa-user fa-fade'></i>
                        <span>ข้อมูลผู้ใช้</span></a>
                </li>";
                }   ?>
                <!-- Sidebar Message -->


            </ul>
            <!-- End of Sidebar -->

            <!-- Content Wrapper -->
            <div id="content-wrapper" class="d-flex flex-column">

                <!-- Main Content -->
                <div id="content">

                    <!-- Topbar -->
                    <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">
                        <h4>รายงาน(เจ้าของหอพัก)</h4>
                        <!-- Sidebar Toggle (Topbar) -->
                        <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                            <i class="fa fa-bars"></i>
                        </button>

                        <!-- Topbar Search -->

                        <!-- Topbar Navbar -->
                        <ul class="navbar-nav ml-auto">

                            <!-- Nav Item - Search Dropdown (Visible Only XS) -->


                            <!-- Nav Item - Alerts -->


                            <!-- Nav Item - Messages -->


                            <div class="topbar-divider d-none d-sm-block"></div>
                            <?php
                            // ใช้ $id ในการสร้าง SQL query หรือในการดึงข้อมูลจากฐานข้อมูล
                            $sql2 = $conn->prepare("SELECT id, Name, Lname FROM user WHERE id = :id");
                            $sql2->bindParam(':id', $id);
                            $sql2->execute();
                            $result2 = $sql2->fetch(PDO::FETCH_ASSOC);
                            $row2 = $result2;
                            ?>
                            <!-- Nav Item - User Information -->
                            <li class="nav-item dropdown no-arrow">
                                <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <span class="mr-2 d-none d-lg-inline text-gray-600 small"><?php echo $row2['Name'] . ' ' . $row2['Lname'] ?> </span>
                                    <img class="img-profile rounded-circle" src="img/undraw_profile.svg">
                                </a>
                                <!-- Dropdown - User Information -->
                                <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                                    <div class="dropdown-divider"></div>
                                    <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                                        <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                        <form method="post" action="">
                                            <input type="submit" name="logout" value="ออกจากระบบ">
                                        </form>
                                    </a>
                                </div>
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
                                    <td>สัญญาเช่า</td>
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
                                $sql2 = "SELECT month.roomId,month.Date_cack,month.S_EL,month.S_WA,month.Dps,month.total,month.MC_sta,imges.Date_up,imges.file_name,imges.type_img FROM month LEFT JOIN imges ON imges.roomId=month.roomId AND imges.Date_up =month.Date_cack WHERE  month.roomId LIKE :searchid AND Date_cack LIKE :searchdate AND MC_sta LIKE :searchtype ORDER by roomId";
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
                </div>
            </div>
            <!-- End of Main Content -->
        </div>
        <!-- Footer -->
        <footer class="container sticky-footer bg-white">
            <div class="container my-auto">
                <div class="copyright text-center my-auto">
                    <pre>หอพักนางตีมะขำธานี 51/46 ม.4 ต.คลองหนึ่ง อ. คลองหลวง จ.ปทุมธานี้ ถนน พหลโยธิน
  โทร 025161320 โทรศัพท์ 0984610262   Gmail polamet.yingni@vru.ac.th Facebook  Nus’Den
  </pre>
                </div>
            </div>
        </footer>
        <!-- End of Footer -->


        <!-- End of Content Wrapper -->

        </div>
        <!-- End of Page Wrapper -->

        <!-- Scroll to Top Button-->
        <a class="scroll-to-top rounded" href="#page-top">
            <i class="fas fa-angle-up"></i>
        </a>
        <!-- Logout Modal-->
        <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>
                    <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
                    <div class="modal-footer">
                        <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                        <a class="btn btn-primary" href="login.html">Logout</a>
                    </div>
                </div>
            </div>
        </div>
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

        <!-- Bootstrap core JavaScript-->
        <script src="vendor/jquery/jquery.min.js"></script>
        <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
        <script src="js/sb-admin-2.min.js"></script>

</body>

</html>