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

<!-- Custom styles for this template-->
<link href="css/sb-admin-2.min.css" rel="stylesheet">
<style>
    article {
        padding: 10px;
    }

    h5 {
        color: #fff;
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

                        <!-- Sidebar Toggle (Topbar) -->
                        <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                            <i class="fa fa-bars"></i>
                        </button>

                        <!-- Topbar Search -->
                        <form method="post" class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
                            <div class="input-group">
                                <input type="text" class="form-control bg-light border-0 small" placeholder="ชื่อผู้ใช้..." name="search">
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
                        <button type="button" class="btn btn-success " data-bs-toggle="modal" data-bs-target="#Add">Add</button>
                        <div class="container">
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
                                    if (isset($_POST['search'])) {
                                        $home = $_POST['search'];
                                    }  // ไม่ต้องใส่ + หรือ ''
                                    $sql = "SELECT * FROM user WHERE urold='ผู้เช่า' AND Name LIKE :search";
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
                                    } else {
                                        echo "ไม่พบผลลัพธ์";
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