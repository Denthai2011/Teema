<?php require_once 'mysql/connect.php' ?>
<?php $stmt = $conn->query('SELECT * FROM starm');
$row = $stmt->fetch(PDO::FETCH_ASSOC);
$staName = $row['staName'];
if ($staName == "ว่าง") {
    $string =  'btn btn2 btn-danger';
} else {
    $string =  '<button stlye="blackground:blue;"></button>';
}
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
        </ul>
        </ul>
    </header>
    <section style="margin:20px 20px 20px 20px;">
        <div class="row">
            <?php
                    $sql = "SELECT * FROM starm LEFT JOIN room ON starm.staId = room.staId WHERE room.roomId=:roomId";
                    $stmt = $conn->prepare($sql);
                    $stmt->bindParam(':roomId', $roomId);
                    $stmt->execute();
                    $rows = $stmt->fetchAll(PDO::FETCH_ASSOC); { ?>
            <div class="card" style="width: 22rem;margin-right:20px;">
                <img src="img/img1.jpg" class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title">Card title</h5>
                    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                    <a href="#" class="btn btn1 button btn-primary">รายระเอียดค่าห้อง</a><a style="margin: 5px;" href="#" class="<?php echo  $string; ?>"><?php echo $row ['$roomId']; ?></a>
                </div>
            </div>     
            <?php }; ?>
            <!-- <div class="card" style="width: 22rem;margin-right:20px;">
                <img src="img/img1.jpg" class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title">Card title</h5>
                    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                    <a href="#" class="btn btn1 btn-primary">รายระเอียดค่าห้อง</a><a style="margin: 5px;" href="#" class="btn btn2 btn-primary">Go somewhere</a>
                </div>
            </div>
            <div class="card" style="width: 22rem;margin-right:20px;">
                <img src="img/img1.jpg" class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title">Card title</h5>
                    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                    <a href="#" class="btn btn1 btn-primary">รายระเอียดค่าห้อง</a><a style="margin: 5px;" href="#" class="btn btn2 btn-primary">Go somewhere</a>
                </div>
            </div>
            <div class="card" style="width: 22rem;margin-right:20px;">
                <img src="img/img1.jpg" class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title">Card title</h5>
                    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                    <a href="#" class="btn btn1 btn-primary">รายระเอียดค่าห้อง</a><a style="margin: 5px;" href="#" class="btn btn2 btn-primary">Go somewhere</a>
                </div>
            </div>
            <div class="card" style="width: 22rem;margin-right:20px;">
                <img src="img/img1.jpg" class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title">Card title</h5>
                    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                    <a href="#" class="btn btn1 btn-primary">รายระเอียดค่าห้อง</a><a style="margin: 5px;" href="#" class="btn btn2 btn-primary">Go somewhere</a>
                </div>
            </div> -->
        </div>
    </section>
</body>

</html>