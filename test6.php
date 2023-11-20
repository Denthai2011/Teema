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
                        <a href="test1.php" class="nav-link"><i class="fa-solid fa-user fa-fade"> ผู้ใช้งาน</i></a>
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
                    <li class="li1 nav-item">
                        <a class="nav-link active" href="test6.php"><i class="fa-solid fa-money-bill"></i>รายได้ทั้งหมด</a>
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
            <div class="container">
            <form method="post">
                <input class="col-form-label" type="text" placeholder="ประเภท" name="searchtype">
                <input class="col-form-label" type="text" placeholder="ห้อง" name="searchid">
                <button type="submit" class="btn btn-dark" name="see">ค้นหา</button>
                <button type="reset" class="btn btn-secondary">รีเฟรช</button>
            </form>
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
                        <?php if (empty($_POST['search'])) {
                        $searchtype = "";
                    }
                    if (empty($_POST['searchroom'])) {
                        $searchid = "";
                    }
                    if (isset($_POST['see'])) {
                        $searchtype = $_POST['searchtype'];
                        $searchid = $_POST['searchid'];
                    }
                        if (isset($_POST['search'])){
                            $home = $_POST['search'];}  // ไม่ต้องใส่ + หรือ ''
                            $sql = "SELECT * FROM money WHERE typepay LIKE :searchtype AND roomId LIKE :searchid";
                            $stmt = $conn->prepare($sql);
                            $stmt->bindValue(':searchtype', "%$searchtype%", PDO::PARAM_STR);
                            $stmt->bindValue(':searchid', "%$searchid%", PDO::PARAM_STR);
                            $stmt->execute();
                            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
                        if ($result) {
                            foreach ($result as $row) {
                                $M_id = $row['M_id'];
                        ?>
                    <tbody>
                        <tr>
                            <td><?php echo $row["Datepay"] ?></td>
                            <td><?php echo $row["roomId"] ?></td>
                            <td><?php echo $row["price"] ?></td> 
                            <td style="white-space: nowrap;"><?php echo $row["typepay"] ?></td>
                        </tr>
                    <?php };}?>
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