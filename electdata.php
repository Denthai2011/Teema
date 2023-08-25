<?php session_start();
require_once 'mysql/connect.php';
?>
<!DOCTYPE html>
<html>
<meta charset="utf-8">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
<script src="https://kit.fontawesome.com/401736f69f.js" crossorigin="anonymous"></script>

<head>
    <style>
        label {
            font-size: 20px;
        }

        td {
            border: 50px;
        }
    </style>
</head>

<body>
    <header>
        <ul class="nav nav-tabs bg-dark">
            <li class="nav-item">
                <a class="nav-link" aria-current="page" href="home.php"><i class="fa-solid fa-house fa-fade fa-xl"></i></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="usermang.php">ข้อมูลผู้ใช้</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="waterdata.php">ค่าน้ำ</a>
            </li>
            <li class="nav-item">
            <a class="nav-link active" href="electdata.php">ค่าไฟ</a>
            </li>
            <li class="nav-item">
                <a class="nav-link " href="login.php"><i class="fa-solid fa-bed-front"></i></a>
            </li>
        </ul>
        </ul>
    </header>
    <section>
        <div class="container">
            <table class="table table-striped table-bordered table-hover">
                <thead>
                    <tr>
                        <td>ห้อง</td>
                        <td>วันที่จด</td>
                        <td>ค่าไฟเดือนก่อน</td>
                        <td>ค่าไฟเดือนนี้</td>
                    </tr>
                </thead>
                <tbody>
                    <?php $sql = "SELECT * FROM elect";
                    $stmt = $conn->prepare($sql);
                    $stmt->execute();
                    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
                    if ($result) {
                        foreach ($result as $row) {
                            $E_id = $row['E_id'];   
                        
                    ?><tbody>
                            <tr>
                                <td><?php echo $row["E_id"] ?></td>
                                <td><?php echo $row["E_dsave"] ?></td>
                                <td><?php echo $row["E_bef"] ?></td>
                                <td><?php echo $row["E_af"] ?></td>
                                <td>
                                    <div class="col-md-6">
                                        <a href="#editelmodal_<?php echo $row['E_id'];?>" class="btn btn-warning" data-bs-toggle="modal">Update </a>
                                    </div>
                                <td>
                                <?php include("elect_editmodal.php"); ?>
                            </tr>
                            
                </tbody>
        <?php   }
                    } ?>
        </tbody>
            </table>
        </div>
    </section>
</body>
</html>
