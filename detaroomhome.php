<?php session_start();
require_once 'mysql/connect.php';
$roomId = $_GET['roomId'];
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
        section {
            display: flex;
            justify-content: center;
            flex-direction: column;
            align-items: center;
            height: 100vh;
            /* ให้ container มีความสูงเท่ากับ viewport height */
            background: linear-gradient(rgba(0, 0, 0, 0.6), rgba(0, 0, 0, 0.2)), url(img/hotel_auto_x2.jpg) center/cover no-repeat;
            background-attachment: fixed;

            /* เพื่อให้ภาพปรากฏในทุกระดับขนาดหน้าจอ *
            /* กำหนดตำแหน่งที่ภาพจะปรากฏ (center) */
            overflow: auto;
        }

        h2 {
            color: white;
            text-shadow: 2px 2px 2px 2px black;
            border-bottom: 1px solid white;
        }

        .container {
            display: flex;
            justify-content: center;
            flex-direction: column;
            align-items: center;
            padding-top: 5px;
        }
        .p2 {
            font-size: 20px;
            color: black;
            opacity: 0.7;
            width: 70%;
            text-align: center;
            margin: auto;
        }
        section p {
            font-size: 20px;
            color: white;
            opacity: 0.7;
            width: 50%;
            text-align: center;
        }

        .p1 {
            border-bottom: 2px solid rgb(252, 143, 24);
 
            color: black;
            font-size: 25px;

        }

        .container2 {
    display: flex;
    justify-content: center;
    flex-direction: column-reverse;
    align-items: center;
    margin-right: 20px;
    background-color: white;
    width: 40%;
    padding: 5px;
    border-radius: 10px;
}

        .container3 {
            display: flex;
            flex-direction: column;
            padding: 20px;
            margin-left: 20px;
            /* เพิ่ม margin ด้านล่าง */
            align-items: center;
        }

        footer {
            background-color: #777;
            padding: 10px;
            text-align: center;
            color: white;
        }

        body {
            font-family: Pattaya;
        }

        .zoom {
            height: auto;
            cursor: pointer;
            -webkit-transition-property: all;
            -webkit-transition-duration: 2s;
            -webkit-transition-timing-function: ease;
            border-radius: 50%;
        }

        .zoom:hover {
            transform: scale(2.5);
        }
        .nav-link{
            color:gold;
        }
        .nav-link.active{
            color:green;
        }
        .containernav {
            display: flex;
            flex-direction: row;
            min-width: 100%;
            flex-wrap: nowrap;
        }

        .containernav1 {
            display: flex;
            flex-direction: row;
            justify-content: flex-start;
            flex-wrap: wrap;
            font-size:15px;
            
        }

        .containernav2 {
            display: flex;
            display: flex;
            justify-content: flex-end;
            flex-direction: row;
        }

        .nav-tabs {
            --bs-nav-tabs-border-width: none;
            --bs-nav-tabs-link-active-bg: none;
            --bs-nav-tabs-link-active-color: #e9ecef;
        }
        button{
            margin: 20px 0;
    font-size: 20px;
    font-weight: bold;
    border: 3px solid #fff;
    background: transparent;
    padding: 13px 20px;
    background: rgba(0, 0, 0, 0.3);
    color: #fff;
    cursor: pointer;
    transition: var(--transition);
}
    a{
        color: white;
    }
    article{
        background: linear-gradient(rgba(0, 0, 0, 0.6), rgba(0, 0, 0, 0.2)), url(img/customer-banner.jpg) center/cover no-repeat;
        height: 100;
    }
    h1{
        color: white;
        font-size: 40px;
        border-bottom:2px solid orange ;
        max-width: fit-content;
    }
    </style>
    </style>
</head>

<body>
    <header>
        <nav class="container containernav nav nav-tabs bg-dark">
            <ul class="container containernav1 flex-start">
                <?php if (!isset($_SESSION['admin_login'])) {
                    echo "
            <li>
                <a class='nav-link active' aria-current='page' href='detaroomhome.php?roomId=$roomId'><i class='fa-solid fa-house fa-fade fa-xl'></i></a>
            </li>";
                } else {
                    echo "
            <li>
                <a class='nav-link active' aria-current='page' href='hometes.php'><i class='fa-solid fa-house fa-fade fa-xl'></i></a>
                </li>";
            } ?>
                
                <h4 style="color:white;padding:5px;text-shadow: white 2px 1px;"> ห้องที่ <?php echo $roomId ?> </h4>
                <a class='nav-link' aria-current='page' href='detaroom copy.php?roomId=<?php echo $roomId ?>'>ข้อมูลค่าใช้จ่ายประจำเดือน</a>
                
                
                <a class='nav-link' aria-current='page' href='datareportuser.php?roomId=<?php echo $roomId ?>'>แจ้งซ่อม</a>
                
                
                <a class='nav-link' aria-current='page' href='profile.php?roomId=<?php echo $roomId ?>'>เจ้าของหอพัก</a>
                
            </ul>
            <ul class="container containernav2 flex-end">

                    <?php $sql = "SELECT Name,Lname FROM room WHERE roomId = :roomId";
                    $stmt = $conn->prepare($sql);
                    $stmt->bindParam(':roomId', $roomId);
                    $stmt->execute();
                    $row = $stmt->fetch(PDO::FETCH_ASSOC);
                    ?>
                    <h4 style="color:white;padding:5px;text-shadow: white 1px 1px;"><?php echo $row['Name']; ?> <?php echo $row['Lname']; ?> </h4>

                    <form method='post' action=''>
                        <input type='submit' class="btn btn-dark" name='logout' value='ออกจากระบบ'>
                    </form>

            </ul>
        </nav>
    </header>
    <?php if (isset($_SESSION['Success'])) { ?>
        <div class="alert alert-success">
            <?php
            echo $_SESSION['Success'];
            unset($_SESSION['Success']);
            ?>
        </div>
    <?php } ?>
    <section>
        <h2>หอพักนางตีมะขำธานี</h2><br>
        <p>ห้องพักนี้สร้างขึ้นเมื่อปีพ.ศ 2532 โดยมีเเรงจูงใจจาการที่มีอุตสากรรมเพิ่มขึ้นทำให้มีผู้คนต่างถิ่นย้ายมาทำงานมากขึ้น
            โดยตัวห้องนั้นมี ขนาด4*4 ในเเบบขนาดเล็ก เเละ 6*6 ในเเบบขนาดใหญ่
        </p>
        <button type="button"><a href="#section"> รายระเอียดห้อง</a></button>

    <?php if ($roomId==20){
        $room = "roomB.jpg";
    } 
          else{
            $room = "roomM.jpg";
          }
    ?>
    </section>
    <article style="background-color: #F8F8FF;">
    <br><h1 id="section">ห้องที่<?php echo $roomId ?></h1>
    <div class="container" >
        <div class="container2">
            <div style=" display: flex;justify-content: center;"><img class="zoom" src="img/<?php echo $room?>" width="80px" height="85px" alt="#section"></div>
            <div class="container3">
                <div>
                    <p class="p1" style="text-align: center;">ตัวห้องภายใน</p>
                </div>
                <div>
                    <p class="p2 zoom"> ห้องมีความมีสะอาดจากการทาสีใหม่เเละทำความสะอาด หลังจากที่ผู้เช่าคนเก่าออกเมื่อ ปี66 วันที่25 เดือน 7</p>
                </div>
            </div>
        </div><br>
        <div class="container2">
            <div style=" display: flex;justify-content: center;"><img class="zoom" src="img/toilet1.jpg" width="80px" height="85px"></div>
            <div class="container3">
                <div>
                    <p class="p1">ห้องน้ำ</p>
                </div>
                <div>
                    <p class="p2 zoom"> ห้องมีขนาดเล็กใช่อาบเเล้ว เเละทำภารากิจ กรุณาอย่านำเอาขยะหรือเศษเอาหาเทลงท่อระบายน้ำ เพราะอาจมีการอุตันได้</p>
                </div>
            </div>
        </div><br>
        <div class="container2">
            <div style=" display: flex;justify-content: center;"><img class="zoom" src="img/มิตเตอร์น้ำ.png" width="85px" height="23px"><img class="zoom" src="img/มิตเตอร์.png" width="85px" height="120px"></div>
            <div class="container3">
                <div>
                    <p class="p1">ไฟ/น้ำ</p>
                </div>
                <div>
                    <p class="p2 zoom">ในส่วนของน้ำเเละไฟนั้นจะคิดมิตเตอร์อยู่ที่ 10 บาท ต่ออยู่นิตเเละจะเก็บทุกๆ สินเดือนของทุกเดือน</p>
                </div>
            </div>
        </div>
    </div>
    <br>
    </article>
    <footer>
        <pre>หอพักนางตีมะขำธานี 51/46 ม.4 ต.คลองหนึ่ง อ. คลองหลวง จ.ปทุมธานี้ ถนน พหลโยธิน
  โทร 025161320 โทรศัพท์ 0984610262   Gmail polamet.yingni@vru.ac.th Facebook  Nus’Den
  </pre>
    </footer>
</body>

</html>