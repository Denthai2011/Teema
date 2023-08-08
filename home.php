<?php
session_start();
require_once 'mysql/connect.php';
// if(!isset($_SESSION['admin_login'])){
//     $_SESSION['error']= 'กรุณาเข้าสู่ระบบ';
//     header('location: login.php');
// }
?>

<!DOCTYPE html>
<html>
<meta charset="utf-8">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
<script src="https://kit.fontawesome.com/401736f69f.js" crossorigin="anonymous"></script>

<head>
    <style>
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
    </style>
</head>

<body>
    <header>
        <ul class="nav nav-tabs bg-dark">
            <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="#"><i class="fa-solid fa-house fa-fade fa-xl"></i></a>
            </li>
            <li class="nav-item">
                <a class="nav-link " href="#">Link</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">Link</a>
            </li>
            <li class="nav-item">
                <a class="nav-link disabled">Disabled</a>
            </li>
            <li class="nav-item">
                <a class="nav-link " href="login.php"><i class="fa-solid fa-bed-front"></i></a>
            </li>
        </ul>
        </ul>
    </header>
    <section style="margin:20px 20px 20px 20px;">
        <div class="row">
            <?php if (isset($_SESSION['Success'])) { ?>
                <div class="alert alert-success">
                    <?php
                    echo $_SESSION['Success'];
                    unset($_SESSION['Success']);
                    ?>
                </div>
            <?php } ?>
            <?php
            $sql = "SELECT roomId,staName,Name FROM room LEFT JOIN starm ON starm.staId = room.staId ORDER BY roomId asc ";
            $stmt = $conn->prepare($sql);
            $stmt->bindParam(':roomId', $roomId);
            $stmt->execute();
            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
            if ($result) {
                foreach ($result as $row) {
            ?>
                    <div class="card shadow p-3 mb-5 bg-body rounded" style="width: 22rem;margin-right:20px;" action="detaroom.php" method="post">
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
                            if (empty($row['Name'])){
                                $row['Name'] = "ว่างเกิน";
                            }
                            ?>
                            <h5 class="card-title text-success">ห้องที่<?php echo $row['roomId']; ?></h5>
                            <p class="card-text fw-bolder ">ห้องของ <?php echo $row['Name']; ?></p>
                            <a href="detaroom.php?roomId=<?php echo $row['roomId']; ?>" class="btn btn1 button btn-primary">รายระเอียดค่าห้อง</a>
                            <a style="margin: 5px;" href="#" class="<?php echo  $string; ?>"><?php echo $row['staName']; ?></a>
                        </div>
                    </div>
                    
            <?php  };
            } ?>
        </div>
    </section>
</body>

</html>