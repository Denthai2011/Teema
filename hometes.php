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
        }

        .nav-link.active i {
            color: #ffffff;
        }

        .span1 {
            box-shadow: 0 5px 5px 0 rgba(0, 0, 0, 0.24), 0 17px 50px 0 rgba(0, 0, 0, 0.19);
            background-color: white;
            margin-bottom: 20px;
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
        <h2 style="color:black;text-shadow:3px 3px gold;">ห้องเช่า</h2>
    </header>

    <section>
        <nav class="nav1">
            <form>
                <ul class="nav">
                    <li class="li1 nav-item">
                        <a class="nav-link active" aria-current="page" href="hometes.php"><i class="fa-solid fa-house fa-fade fa-lg"></i></a>
                    </li>
                    <li class="li1 nav-item">
                        <a href="test1.php" class="nav-link "><i class="fa-solid fa-user fa-fade"> ข้อมูลผู้ใช้</i></a>
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
        <article>
            <form method="post">
                <input class="col-form-label" type="text" placeholder="ชั้น" name="search">
                <input class="col-form-label" type="text" placeholder="ห้อง" name="searchroom">
                <button type="submit" class="btn btn-dark" name="see">ค้นหา</button>
                <button type="reset" class="btn btn-secondary">รีเฟรช</button>
            </form>
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

                    $sql = "SELECT roomId, layer, staName, Name, Lname, roomtype FROM room 
                            LEFT JOIN starm ON starm.staId = room.staId 
                            WHERE layer LIKE :search AND roomId LIKE :searchroom 
                            ORDER BY roomId ASC";

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
                                        <div>
                                        <a href="#usermodal_<?php echo $roomId ?>" data-bs-toggle='modal' class="<?php echo  $string; ?>"><?php echo $row['staName']; ?></a>
                                    </div>             <?php include("modalstaroom.php"); ?>                       

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
    </section>

    <footer>
    <pre>หอพักนางตีมะขำธานี 51/46 ม.4 ต.คลองหนึ่ง อ. คลองหลวง จ.ปทุมธานี้ ถนน พหลโยธิน
  โทร 025161320 โทรศัพท์ 0984610262   Gmail polamet.yingni@vru.ac.th Facebook  Nus’Den
  </pre>
    </footer>

</body>

</html>