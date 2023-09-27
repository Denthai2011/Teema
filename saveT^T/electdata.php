<?php session_start();
require_once 'mysql/connect.php';
if(!isset($_SESSION['admin_login'])){
    $_SESSION['error']='กรุณาเข้าสู่ระบบ';
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
        label {
            font-size: 20px;
        }

        td {
            border: 2px black solid;

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
    <section>
        <div class="container">
            <table class="table table-striped table-bordered table-hover">
                <thead>
                    <tr>
                        <td>ห้อง</td>
                        <td>วันที่จด</td>
                        <td>ค่าไฟเดือนก่อน</td>
                        <td>ค่าไฟเดือนนี้</td>
                        <td>หมายเหตุ</td>
                    </tr>
                </thead>
                <tbody class="table-danger">
                    <?php $sql = "SELECT * FROM elect";
                    $stmt = $conn->prepare($sql);
                    $stmt->execute();
                    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
                    if ($result) {
                        foreach ($result as $row) {
                            $E_id = $row['E_id'];   
                        
                    ?>
                        
                            <tr>
                                <td><?php echo $row["E_id"] ?></td>
                                <td><?php echo $row["E_dsave"] ?></td>
                                <td><?php echo $row["E_bef"] ?></td>
                                <td><?php echo $row["E_af"] ?></td>
                                <td>
                                    <div class="col-md-6">
                                        <a href="#editelmodal_<?php echo $row['E_id'];?>" class="btn btn-warning" data-bs-toggle="modal">Update </a>
                                    </div>
                                 </td>
                                
                            </tr><?php include("elect_editmodal.php"); ?>
                            
        <?php   }
                    } ?>
        </tbody>
            </table>
        </div>
    </section>
</body>
</html>
