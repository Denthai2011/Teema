<?php session_start();
require_once 'mysql/connect.php';
if (!isset($_SESSION['admin_login'])) {
    $_SESSION['error'] = 'กรุณาเข้าสู่ระบบ';
    header('location: index.php');}
if (isset($_POST['logout'])) {
        session_destroy();
        header('location: index.php');
        exit();
}?>
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
}

/* Style the header */
header {
  background-color: #666;
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
  background: #ccc;
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
  background-color: #777;
  padding: 10px;
  text-align: center;
  color: white;
}
.nav{
    display: flex;
    flex-direction: column;
    text-align: center;
    margin: auto;
    width: 80%;
}
.li1{

    margin-top: 10px;
    font-size: 30px;

}
.li1:active{background-color: #696969;
    box-shadow: 3px 3px 5px 5px black;
    font-size: 30px;}
.li2{

    margin-top: 15px;
    
}
.nav-link.active{background-color: #696969;
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
.li1:hover{
    background-color: orange;
    box-shadow: 2px 2px 2px 2px black;
}

.li2 input:hover{
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
  <h2>ห้องเช่า</h2>
</header>

<section>
    <nav class="nav1">
    <form>
    <ul class="nav">
        <li class="li1 nav-item">
            <a class="nav-link active" aria-current="page" href="hometes.php"><i class="fa-solid fa-house fa-fade fa-lg"></i></a>
        </li>
        <li class="li1 nav-item">
        <a href="test1.php" class="nav-link "><i class="fa-solid fa-user fa-fade"></i></a>
        </li>
        <li class="li1 nav-item">
            <a class="nav-link " href="test2.php"><i class="fa-solid fa-water fa-fade"></i></a>
        </li>
        <li class="li1 nav-item">
            <a class="nav-link" href="test3.php"><i class="fa-solid fa-bolt fa-fade"></i></a>
        </li>
        <li class="li1 nav-item">
            <a class="nav-link" href="test4.php"><i class="fa-regular fa-flag fa-fade"></i></a>
        </li>
    </form>
        <li class="li2">
            <form method="post" action="">
                <input type="submit" name="logout" value="ออกจากระบบ">
            </form>
        </li>
    </ul>
</nav>
<
  <article>
        <div class="container">
        <form action="" method="get">
    <label for="roomNumber">เลขห้อง:</label>
    <input type="text" id="whereid" name="whereid">
    <input type="submit" value="ค้นหา">
        </form>
            
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
                        echo "$conrow<span class='span1' style='border:5px black solid;border-radius:10px;font-size:20px;color:#330099;padding: 5px;'>ชั้นที่ $i </span>";
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

<footer>
  <p>Footer</p>
</footer>

</body>
</html>

