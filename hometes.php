<?php session_start();
require_once 'mysql/connect.php';
if (!isset($_SESSION['admin_login']) AND !isset($_SESSION['Superadmin_login'])) {
    $_SESSION['error'] = 'กรุณาเข้าสู่ระบบ';
    header('location: index.php');
}
if (isset($_POST['logout'])) {
    session_destroy();
    header('location: index.php');
    exit();
}
if (isset($_SESSION['admin_login'])) {
    $id = $_SESSION['admin_login'];
}
if (isset($_SESSION['Superadmin_login'])) {
    $id = $_SESSION['Superadmin_login'];
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

<!-- Custom styles for this template-->
<link href="css/sb-admin-2.min.css" rel="stylesheet">
<style>
    article {
        padding: 10px;
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
                <li class="nav-item">
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
                    <a class='nav-link' href='owner.php'>
                        <i class='fa-solid fa-user fa-fade'></i>
                        <span>เจ้าของหอ</span></a>
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

                        <!-- Sidebar Toggle (Topbar) -->
                        <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                            <i class="fa fa-bars"></i>
                        </button>

                        <!-- Topbar Search -->
                        <form method="post" class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
                            <div class="input-group">
                                <input type="text" class="form-control bg-light border-0 small" placeholder="ชื่อที่..." name="search">
                                -
                                <input type="text" class="form-control bg-light border-0 small" placeholder="ห้องที่..." name="searchroom">
                                <div class="input-group-append">
                                    <button class="btn btn-primary" type="submit" name="see">
                                        <i class="fas fa-search fa-sm"></i>
                                    </button>
                                </div>
                            </div>
                        </form>

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
                        <div class="contianer">
                            <table class="table table-striped table-bordered table-hover">
                                <thead style="text-align: center;">
                                    <tr>
                                        <td>เลขห้อง</td>
                                        <td>ชั้น</td>
                                        <td>ชื่อ-สกุล</td>
                                        <td>ขนาดห้อง</td>
                                        <td>สถานะ</td>
                                        <td>เข้าชม</td>
                                    </tr>
                                </thead>
                                <?php
                                if (empty($_POST['search'])) {
                                    $search = "";
                                }
                                if (empty($_POST['searchroom'])) {
                                    $searchroom = "";
                                }
                                if (isset($_POST['see'])) {
                                    $search = $_POST['search'];
                                    $searchroom = $_POST['searchroom'];
                                }

                                $sql = "SELECT room.roomId, room.layer, starm.staId, starm.staName, room.Name, room.Lname, room.roomtype FROM room 
                            LEFT JOIN starm ON starm.staId = room.staId
                            WHERE room.layer LIKE :search AND room.roomId LIKE :searchroom 
                            ORDER BY room.roomId ASC";

                                $stmt = $conn->prepare($sql);
                                $stmt->bindValue(':search', "%$search%", PDO::PARAM_STR);
                                $stmt->bindValue(':searchroom', "%$searchroom%", PDO::PARAM_STR);
                                $stmt->execute();
                                $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
                                if ($result) {
                                    foreach ($result as $row) { ?>
                                        <?php
                                        $roomId = $row['roomId'];
                                        $staName = $row['staName'];
                                        if (empty($row['Name'])) {
                                            $row['Name'] = "ว่าง";
                                            $color = "black";
                                        } else {
                                            $color = "";
                                        }
                                        if ($staName == "ว่าง") {
                                            $string =  'btn btn2 btn-success';
                                        } else if ($staName == "จองเเล้ว") {
                                            $string =  'btn btn2 btn-warning';
                                        } else {
                                            $string = 'btn btn2 btn-info';
                                        }
                                        if ($row['roomtype'] == "ห้องใหญ่") {
                                            $type =  'Red';
                                        }


                                        ?>
                                        <tbody style="text-align:center">
                                            <tr>
                                                <td>
                                                    <h5 class="card-title" style="color:#000080;font-size:25px;"><?php echo $row['roomId']; ?></h5>
                                                </td>
                                                <td>
                                                    <h5 class="card-title" style="color:#000080;font-size:25px;"><?php echo $row['layer']; ?></h5>
                                                </td>
                                                <td>
                                                    <p class="card-text fw-bolder" style="color:#000080;font-size:20px;"><span style="color:<?php echo $color ?>;font-size:20px;"><?php echo $row['Name']; ?> <?php echo $row['Lname']; ?></span></p>
                                                </td>
                                                <td>
                                                    <h1 class="<?php echo  $string; ?>"><?php echo $row['staName']; ?></h1>
                                                </td>

                                                <td>
                                                    <p class="card-text fw-bolder" style="color:#000080;font-size:20px;"><span style="color:<?php echo $type ?>;font-size:20px;"><?php echo $row['roomtype']; ?></span></p>
                                                </td>
                                                <td>
                                                    <a href="detaroomhome.php?roomId=<?php echo $row['roomId']; ?>" class="btn btn1 button btn-primary">รายระเอียดห้อง</a>
                                                </td>
                                            </tr>
                                    <?php
                                    }
                                } ?>
                                        </tbody>
                            </table>
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

        <script src="vendor/jquery/jquery.min.js"></script>
        <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

        <!-- Core plugin JavaScript-->


        <!-- Page level plugins -->



</body>

</html>