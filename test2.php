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
            box-shadow: 3px 3px 5px 5px black;
            font-size: 30px;
            background-color: black;
        }

        .nav-link.active i {
            color: lightseagreen;
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
        <h2 style="color:black;text-shadow:3px 3px gold;">จัดการค่าน้ำ</h2>
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
                        <a href="test5.php" class="nav-link"><i class="fa-solid fa-user fa-fade"> การเช่า</i></a>
                    </li>
                    <li class="li1 nav-item">
                        <a class="nav-link active" href="test2.php"><i class="fa-solid fa-water fa-fade"> ค่าน้ำ</i></a>
                    </li>
                    <li class="li1 nav-item">
                        <a class="nav-link" href="test3.php"><i class="fa-solid fa-bolt fa-fade"> ค่าไฟ</i></a>
                    </li>
                    <li class="li1 nav-item">
                        <a class="nav-link" href="test4.php"><i class="fa-regular fa-flag fa-fade"> เเจ้งปัญหา</i></a>
                    </li>
                    <li class="li1 nav-item">
                        <a class="nav-link" href="test6.php"><i class="fa-solid fa-money-bill"></i>รายได้ทั้งหมด</a>
                    </li>
            </form>
            <li class="li2">
                <form method="post" action="">
                    <input type="submit" name="logout" value="ออกจากระบบ">
                </form>
            </li>
            </ul>
        </nav>
        </nav>
        <article>
            <div class="container">
            <form method="post">
                    <input type="text" class="col-form-label" placeholder="เลขห้อง" name="search">
                    <button type="reset" class="btn btn-secondary">รีเฟรช</button>
                </form>
                <table class="table table-striped table-hover">
                    <thead style="border:1px black solid;">
                        <tr>
                            <td>ห้อง</td>
                            <td>วันที่จด</td>
                            <td>ค่าน้ำเดือนก่อน</td>
                            <td>ค่าน้ำเดือนนี้</td>
                            <td>หมายเหตุ</td>
                        </tr>
                    </thead>
                    <tbody class="table-primary">
                        <?php if (empty($_POST['search'])) {
                                $home = "";
                                }
                        if (isset($_POST['search'])){
                            $home = $_POST['search']; }
                        $sql = "SELECT * FROM water WHERE W_id LIKE :search";
                        $stmt = $conn->prepare($sql);
                        $stmt->bindValue(':search', "%$home%", PDO::PARAM_STR);
                        $stmt->execute();
                        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
                        if ($result) {
                            foreach ($result as $row) {
                                $W_id = $row['W_id'];

                        ?>
                                <tr>
                                    <td><?php echo $row["W_id"] ?></td>
                                    <td><?php echo $row["W_dsave"] ?></td>
                                    <td><?php echo $row["W_bef"] ?></td>
                                    <td><?php echo $row["W_af"] ?></td>
                                    <td>
                                        <div class="col-md-6">
                                            <a href="#editwtmodal_<?php echo $row['W_id']; ?>" class="btn btn-warning" data-bs-toggle="modal">Update </a>
                                        </div>
                                    </td>
                                    <?php include("water_editmodal.php"); ?>
                                </tr>
                        <?php   }
                        } 
                        else {
                            echo "ไม่พบผลลัพธ์";
                        } ?>
                    </tbody>
                </table>
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