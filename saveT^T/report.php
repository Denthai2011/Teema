<?php
session_start();
require_once 'mysql/connect.php';
if (!isset($_SESSION['admin_login'])) {
    $_SESSION['error'] = 'กรุณาเข้าสู่ระบบ';
    header('location: index.php');
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
    body{        background-color: #FFFAF0;}
    thead th{
        padding: 5px;
    }
    tbody tr{
        border-bottom: 1px solid black;
    }
    table{
        text-align: center;
    }
    .container{
        background-color: #FFFFFF;
        width: 30%;
        border-radius: 15px; 
        margin-bottom: 20px;
    }
    p{
        background-color: #CD5C5C;
        color:#FFFF00;
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
        </ul>
    </header><?php if (isset($_SESSION['Success'])) { ?>
        <div class="alert alert-success">
            <?php
                    echo $_SESSION['Success'];
                    unset($_SESSION['Success']);
            ?>
        </div>
    <?php } ?>
    <section> <div class="container">
                    <p>เเจ้ง/ซ่อม<p>
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
                <?php
                $sql = "SELECT * FROM report";
                $stmt = $conn->prepare($sql);
                $stmt->execute();
                $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
                if ($result) {
                    foreach ($result as $row){ $ReId = $row['ReId'];
                    ?>
                        
                        <tr>
                        <td><?php echo $row['ReId'] ?></td>
                        <td><?php echo $row['Name'] ?></td>
                        <td><?php echo $row['roomId'] ?></td>
                        <td><?php echo $row['Retype'] ?></td>
                        <td><?php echo $row['Resta'] ?></td>
                        <td>
                                    <div class="col-md-6">
                                        <a href="#reportdetailmodal_<?php echo $row['ReId']; ?>"  class="btn btn-warning" data-bs-toggle="modal">จัดการ</a>
                                    </div>
                                </td>
                                <?php include("report_detailmodal.php"); ?>
                            </tr>
                        </tr>
                    </tbody>
                <?php };}
                ?>
            </table>
            </div>
    </section>
</body>

</html>