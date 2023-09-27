<?php
session_start();
require_once 'mysql/connect.php';
if (!isset($_SESSION['admin_login'])) {
    $_SESSION['error'] = 'กรุณาเข้าสู่ระบบ';
    header('location: index.php');}
if (isset($_POST['logout'])) {
        session_destroy();
        header('location: index.php');
        exit();
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

<head>
    <style>
        .col {
            display: flex;
            justify-content: start;

        }

        .btn1 {
            border: none;
            color: white;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            font-size: 16px;
            margin: 4px 2px;
            cursor: pointer;
            -webkit-transition-duration: 0.4s;
            /* Safari */
            transition-duration: 0.4s;

        }

        .btn1:hover {
            box-shadow: 0 12px 16px 0 rgba(0, 0, 0, 0.24), 0 17px 50px 0 rgba(0, 0, 0, 0.19);
        }

        body {
            font-family: 'Pattaya', sans-serif;
            background-color: white;
        }

        .card1 {
            border-radius: 20px;
            margin: 10px;
            border: 2px white solid;
            background-color: #F0F1EB;
            box-shadow: 5px 5px 7px 7px #000080;
        }

        .span1 {
            box-shadow: 0 5px 5px 0 rgba(0, 0, 0, 0.24), 0 17px 50px 0 rgba(0, 0, 0, 0.19);
            background-color: white;
            margin-bottom: 20px;
        }
        .container1{
            display: flex;
            flex-direction: column;
        }
        .container2{
            display:flex;
            flex-direction: row;
        }
        .container3{
            display: flex;
            flex-direction: column;
        }
    </style>
</head>

<body>
    <header>
        <ul class="nav nav-tabs bg-dark">
            <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="home.php"><i class="fa-solid fa-house fa-fade fa-xl"></i></a>
            </li>
            <li class="nav-item">
                <a class="nav-link " href="usermang.php">ข้อมูลผู้ใช้</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="waterdata.php">ค่าน้ำ</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="electdata.php">ค่าไฟ</a>
            </li>
            <li class="nav-item">
                <a class="nav-link " href="report.php"><i class="fa-regular fa-flag fa-bounce"></i></a>
            </li>
            <li>
            <form method="post" action="">
            <input type="submit" name="logout" value="ออกจากระบบ">
            </form>
            </li>
        </ul>
    </header><?php if (isset($_SESSION['Success'])) { ?>
        <div class="alert alert-success">
            <?php
                    echo $_SESSION['Success'];
                    unset($_SESSION['Success']);
            ?>
        </div>
    <?php } ?>
    <section style="margin:20px 20px 20px 20px;">
        <div class="container">
            <?php
            $sql = "SELECT roomId,staName,Name FROM room LEFT JOIN starm ON starm.staId = room.staId ORDER BY roomId asc ";
            $stmt = $conn->prepare($sql);
            $stmt->bindParam(':roomId', $roomId);
            $stmt->execute();
            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
            $i = 1;
            if ($result) {
                foreach ($result as $row) {

                    if ($row['roomId'] == 1) {
                        $i = 1;
                        $conrow = "<div class='row'>";
                    } else {
                        $i = 0;
                    }
                    if ($row['roomId'] == 6) {
                        $i = 2;
                        $conrow = "<div class='row'>";
                    }
                    if ($row['roomId'] == 13) {
                        $i = 3;
                        $conrow = "<div class='row'>";
                    }
                    if ($i > 0) {
                        echo "$conrow<span class='span1' style='border:5px black solid;border-radius:15px;font-size:20px;color:#330099;padding: 5px;'>ชั้นที่ $i </span>";
                    }
                    echo "<div class='col'>";
            ?><br>
                    <div class="card1 card shadow p-3 mb-5" style="width: 22rem;margin-right:20px;" action="detaroom.php" method="post">
                        <div class="card-body">
                            <?php
                            $roomId = $row['roomId'];
                            $staName = $row['staName'];
                            if ($staName == "ว่าง") {
                                $string =  'btn btn2 btn-success';
                            } else if ($staName == "จองเเล้ว") {
                                $string =  'btn btn2 btn-warning';
                            } else {
                                $string = 'btn btn2 btn-info';
                            }
                            if (empty($row['Name'])) {
                                $row['Name'] = "ว่าง";
                                $color = "black";
                            } else {
                                $color = "#330000";
                            }
                            ?>
                            <div class="container1">
                                <div class="container2">
                                    <div class="container3">
                                        <div><h5 class="card-title" style="color:#000080;font-size:25px;">ห้องที่: <?php echo $row['roomId']; ?></h5>
                                        </div><p class="card-text fw-bolder" style="color:#000080;font-size:20px;">ห้องของ: <span style="color:<?php echo $color ?>;font-size:20px;"><?php echo $row['Name']; ?></span></p>
                                    </div>
                                    <div style="margin-bottom:20px;margin-left:20px;">
                                        <img src="img/380793682_277571401895208_5723792637580905258_n.png" style="height: 90px;width:90px">
                                    </div> 
                                </div>   
                                <div><a href="detaroom.php?roomId=<?php echo $row['roomId']; ?>" class="btn btn1 button btn-primary">รายระเอียดค่าห้อง</a>
                                     <a style="margin: 5px;" href="#" class="<?php echo  $string; ?>"><?php echo $row['staName']; ?></a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php echo "</div>";
                    if ($row['roomId'] == 5 || $row['roomId'] == 12 || $row['roomId'] == 20) {
                        echo "</div>";
                    }
                    ?>
            <?php  };
            } ?>
        </div>
        </div>
    </section>
</body>

</html>