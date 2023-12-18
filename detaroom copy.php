<?php
session_start();
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
        label {
            font-size: 20px;
        }



        th {
            color: #3d3c38;
            font-size: 18px;
            text-shadow: 1px 1px #431919;
            text-align: center;
        }

        footer {
            background-color: #777;
            padding: 10px;
            text-align: center;
            color: white;
        }

        td {
            font-size: 16px;
            color: black;
            opacity: 0.7;
            font-style: italic;
        }

        .table2 {
            border-collapse: collapse;
            font-size: 16px;
            margin-right: 20px;
            text-align: center;
        }

        /* สไตล์สำหรับแถวหัวของตาราง */
        .table2 th {
            text-align: left;
            padding: 8px;
        }

        /* สไตล์สำหรับแถวของตาราง */
        .table2 td {
            padding: 8px;
        }

        .table3 {
            text-align: center;
            margin-right: 20px;
        }

        .table3 th {
            text-align: left;
            padding: 8px;
        }

        /* สไตล์สำหรับแถวของตาราง */
        .table3 td {
            padding: 8px;
        }

        section {
            padding: 10px;
            background: linear-gradient(rgba(0, 0, 0, 0.6), rgba(0, 0, 0, 0.2)), url(img/customer-banner.jpg) center/cover no-repeat;
            height: 100vh;
            margin: auto;
            display: flex;
            flex-wrap: wrap;
            align-content: center;
        }

        /* สไตล์สำหรับแถวเลขคี่ */

        /* สไตล์สำหรับแถวเมื่อเลื่อนเมาส์เข้า */
        tr:hover {
            background-color: #f0e68c;
        }

        .form1 {

            padding: 20px;
            border-radius: 10px;
            justify-content: center;
            margin-top: 20px;
        }

        .container9 {
            display: flex;
            flex-direction: column;
        }

        .container8 {
            border-radius: 10px 10px 0px 0px;
            box-shadow: 2px 2px 2px 2px wheat;
            background-color: #ffffff;
            padding: 20px;
            width: 100%;
        }

        .container2 {
            display: flex;
            flex-direction: column;
            justify-content: space-around;

        }

        .table1 {
            width: 100%;
        }

        .table1 td,
        .table1 th {
            padding: 10px;
        }

        .input-value {
            display: inline-block;
            padding: 5px 10px;
            background-color: #ffffff;
            border: 1px solid #ccc;
            border-radius: 5px;
            font-weight: bold;
        }

        ul h4 {
            color: #f2f2f2;
            padding: 2px;
            padding-left: 20px;
        }

        .headdiv {
            align-self: center;
            font-size: 30px;
            color: #FFD700;
            text-shadow: 2px 2px black;
        }

        .headdiv2 {
            align-self: center;
            text-align: center;
            font-size: 30px;
            color: red;
            text-shadow: 2px 2px black;

        }

        body {
            background-color: #F8F8FF;
        }

        .container3 {
            display: flex;
            flex-direction: column;
        }

        body,
        html {
            margin: 0;
            padding: 0;
            overflow-x: hidden;
        }

        #animeContainer {
            width: 100%;
            max-width: 1200px;
            margin: 0 auto;
            /* ตั้งค่าตำแหน่งเริ่มต้นทางซ้าย */
            transform: translateX(-100%);
        }

        * {
            box-sizing: border-box
        }

        body {
            font-family: Verdana, sans-serif;
            margin: 0
        }

        .mySlides {
            text-align: center;
        }

        .img1 {
            vertical-align: middle;
            border-radius: 20%;
            box-shadow: darkgray 5px 5px 5px 5px;
        }

        /* Slideshow container */
        .slideshow-container {
            max-width: 1000px;
            position: relative;
            margin: auto;
        }

        /* Next & previous buttons */
        .prev,
        .next {
            cursor: pointer;
            position: absolute;
            top: 50%;
            width: auto;
            padding: 16px;
            margin-top: -22px;
            color: black;
            font-weight: bold;
            font-size: 18px;
            transition: 0.6s ease;
            border-radius: 0 3px 3px 0;
            user-select: none;
        }

        /* Position the "next button" to the right */
        .next {
            right: 0;
            border-radius: 3px 0 0 3px;
        }

        /* On hover, add a black background color with a little bit see-through */
        .prev:hover,
        .next:hover {
            background-color: rgba(0, 0, 0, 0.8);
        }

        /* Caption text */
        .text {
            color: #f2f2f2;
            font-size: 15px;
            padding: 8px 12px;
            position: absolute;
            bottom: 8px;
            width: 100%;
            text-align: center;
        }

        /* Number text (1/3 etc) */
        .numbertext {
            color: #f2f2f2;
            font-size: 12px;
            padding: 8px 12px;
            position: absolute;
            top: 0;
        }

        /* The dots/bullets/indicators */
        .dot {
            cursor: pointer;
            height: 15px;
            width: 15px;
            margin: 0 2px;
            background-color: #bbb;
            border-radius: 50%;
            display: inline-block;
            transition: background-color 0.6s ease;
        }

        .active,
        .dot:hover {
            background-color: #717171;
        }

        /* Fading animation */
        .fade {
            animation-name: fade;
            animation-duration: 3s;
        }

        @keyframes fade {
            from {
                opacity: .4
            }

            to {
                opacity: 1
            }
        }

        /* On smaller screens, decrease text size */
        @media only screen and (max-width: 300px) {

            .prev,
            .next,
            .text {
                font-size: 11px
            }
        }

        .custom-link {
            text-decoration: none;
            color: #007BFF;
        }

        .custom-link:hover {
            text-decoration: underline;
            color: #ffffff;
            background-color: #3d3c38;
            border-radius: 5px;
        }

        .custom-link.active {
            color: #ffffff;
            background-color: #3d3c38;
            border-radius: 5px;
        }

        .modal-backdrop {
            position: unset;
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
            align-content: flex-end;
            font-size: 15px;
        }

        .nav-link {
            color: gold;
        }

        .nav-link.active {
            color: green;
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

        header {
            font-family: Pattaya;
        }

        .textpaytime {
            display: flex;
            flex-direction: row;
            justify-content: space-around;
            text-shadow: 1px 1px black;
        }
    </style>
</head>

<body>
    <header>
        <?php if (isset($_SESSION['Success'])) { ?>
            <div class="alert alert-success">
            <?php
            echo $_SESSION['Success'];
            unset($_SESSION['Success']);
        } ?>
            </div>
            <nav class="container containernav nav nav-tabs bg-dark">
                <ul class="container containernav1 flex-start">
                    <?php if (!isset($_SESSION['admin_login'])) {
                        echo "
            <li>
                <a class='nav-link' aria-current='page' href='detaroomhome.php?roomId=$roomId'><i class='fa-solid fa-house fa-fade fa-xl'></i></a>
            </li>";
                    } else {
                        echo "
            <li>
                <a class='nav-link' aria-current='page' href='hometes.php'><i class='fa-solid fa-house fa-fade fa-xl'></i></a>
            </li>";
                    } ?>
                    <h4 style="color:white;padding:5px;text-shadow: white 2px 1px;"> ห้องที่ <?php echo $roomId ?> </h4>

                    <a class='nav-link active' aria-current='page' href='detaroom copy.php?roomId=<?php echo $roomId ?>'>ข้อมูลค่าใช้จ่ายประจำเดือน</a>


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
            <?php if ($roomId == 20) {
                $room = "roomB.jpg";
            } else {
                $room = "roomM.jpg";
            }
            ?>
    </header>

    <div style="background-color:white">
        <div class="slideshow-container">
            <h1 class="headdiv" style="text-align: center;">สภาพห้อง</h1>
            <div class="mySlides">
                <a href="#section"><img class="img1" src="img/<?php echo $room ?>" width="800" height="750"></a>
                <div class="text">ตัวห้อง</div>
            </div>
            <div class="mySlides">
                <a href="#section"><img class="img1" src="img/toilet1.jpg" width="800" height="750"></a>
                <div class="text">ห้องน้ำ</div>
            </div>
            <a class="prev" onclick="plusSlides(-1)">❮</a>
            <a class="next" onclick="plusSlides(1)">❯</a>

        </div>
        <br>

        <div style="text-align:center">
            <span class="dot" onclick="currentSlide(1)"></span>
            <span class="dot" onclick="currentSlide(2)"></span>
        </div>
        <h1 class="headdiv2">กรุณาทำความสะอาดห้องเเล้วเก็บขยะหน้าห้องเช่าของท่านด้วย</h1>
    </div>
    <script>
        let slideIndex = 1;
        showSlides(slideIndex);

        function plusSlides(n) {
            showSlides(slideIndex += n);
        }

        function currentSlide(n) {
            showSlides(slideIndex = n);
        }

        function showSlides(n) {
            let i;
            let slides = document.getElementsByClassName("mySlides");
            let dots = document.getElementsByClassName("dot");
            if (n > slides.length) {
                slideIndex = 1
            }
            if (n < 1) {
                slideIndex = slides.length
            }
            for (i = 0; i < slides.length; i++) {
                slides[i].style.display = "none";
            }
            for (i = 0; i < dots.length; i++) {
                dots[i].className = dots[i].className.replace(" active", "");
            }
            slides[slideIndex - 1].style.display = "block";
            dots[slideIndex - 1].className += " active";
        }
    </script>

    <?php if (isset($_SESSION['Success'])) { ?>
        <div class="alert alert-success">
            <?php
            echo $_SESSION['Success'];
            unset($_SESSION['Success']);
            ?>
        </div>
    <?php } ?>

    <?php
    // ดึงข้อมูลจากฐานข้อมูล
    $sql = "SELECT room.Name,room.Lname,room.Dps,elect.E_dsave ,elect.E_bef ,elect.E_af,water.W_dsave ,water.W_bef ,water.W_af,renting.Deppay,renting.Deposit, renting.Datein,renting.End_ren,month.Mc_sta,month.Date_cack  FROM room Left join elect on room.roomId = elect.roomId Left join water on room.roomId = water.roomId Left join renting on room.roomId = renting.roomId Left join month on month.roomId = room.roomId
    WHERE room.roomId = :roomId order by Date_cack DESC";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':roomId', $roomId);
    $stmt->execute();
    $row = $stmt->fetch(PDO::FETCH_ASSOC);
    // แสดงข้อมูลในฟอร์ม
    if ($row['End_ren'] == 'เลิกเช่า') {
        $row['Name'] = "";
        $row['Lname'] = "";
    }
    ?>
    <section id="section">
        <div class="container9" style="width: fit-content;" id="animeContainer">
            <div class="container8">
                <div class="headdiv" style="text-align: center;">ข้อมูลผู้เช่า</div>
                <div class="container3">
                    <form class="form1">
                        <table class="table1">
                            <tr>
                                <dive>
                                    <th>
                                        <label for="roomId">ห้องที่<?php echo $roomId; ?></label>
                                    </th>
                                </dive>
                            </tr>
                            <div>
                                <tr>
                                    <th>
                                        <label for="Name">ชื่อ: </label>
                                    </th>
                                    <td><label type="text" id="Name" name="Name"> <?php echo $row['Name']; ?> </label></td>
                            </div>
                            <div>
                                <th>
                                    <label for="Name">นามสกุล: </label>
                                </th>
                                <td><label type="text" id="Lname" name="Lname"><?php echo $row['Lname']; ?></label></td>
                            </div>
                            </tr>
                            <tr>
                                <div>
                                    <th>
                                        <label for="Dps">ค่าห้อง:</label>
                                    </th>
                                    <td><label type="tedx" id="Dps" name="Dps"><?php echo $row['Dps']; ?></label></td>
                                </div>

                                <div>
                                    <th>
                                        <label for="staDps">ค่ามัดจำ:</label>
                                    </th>
                                    <?php $Depsum = $row['Deposit'] - $row['Deppay'];
                                    $Depshow = 'จ่ายเเล้ว';
                                    if ($row['End_ren'] != 'เลิกเช่า') {

                                        if ($row['Deppay'] != 0 and $Depsum == 0) {
                                            echo "<td><label type='tedx' id='Dps' name='Deppay'>$Depshow</label></td>";
                                        }
                                        if ($row['Deppay'] >= 500 and $Depsum != 0) {
                                            echo "<td><label type='tedx' id='Dps' name='Deppay'>$Depsum</label></td>";
                                        }
                                    } else {
                                        echo "<td><label type='tedx' id='Dps' name='Deppay'>ยังไม่มีคนเช่า</label></td>";
                                    }
                                    if ($row['Deppay'] == 0) {
                                        echo "<td><label type='tedx' id='Dps' name='Deppay'>ยังไม่มีคนเช่า</label></td>";
                                    }


                                    ?>


                                </div>
                            </tr>
                        </table>
                    </form>
                </div>
            </div>
            <br>
            <?php $Date_cack = $row['Date_cack'];
            echo $Date_cack; // เปลี่ยนเป็นวันที่ที่คุณได้รับมาจริง
            if ($row['End_ren'] != 'เลิกเช่า') {
                // วันที่ปัจจุบัน
                $currentDate = date("Y-m-d");

                // ทำการเพิ่ม 1 เดือน
                if ($currentDate >= $Date_cack) {
                    $paytime = 'ถึงเวลาจ่ายเเล้ว';
                } else {


                    $row["Dps"] = 0;
                    $paytime = 'ยังไม่ถึงเวลาจ่าย';
                }
            } else {

                $currentDate = date("Y-m-d");
                $row["Dps"] = 0;
                $paytime = 'ยังไม่ถึงเวลาจ่าย';
                $row['E_bef'] = 0;
                $row['E_af'] = 0;
                $row['W_bef'] = 0;
                $row['W_af'] = 0;
            }
            ?>
            <div class="container8">
                <div class="container2">
                    <table class="table2">
                        <div class="headdiv" style="text-align:center;padding-bottom:20px;">ข้อมูลค่าใช้จ่าย</div>
                        <div class="textpaytime"><?php
                                                    if ($paytime == 'ถึงเวลาจ่ายเเล้ว') {
                                                        echo "<p style='color:red'>$paytime";
                                                    }
                                                    if ($row['End_ren'] != 'เลิกเช่า') {
                                                        if ($paytime == 'ยังไม่ถึงเวลาจ่าย') {
                                                            echo "<p style='color:green'>$paytime </p><p style='color:blue;'>กำหนดจ่าย $Date_cack</p>";
                                                        }
                                                    }
                                                    ?>
                        </div>
                        <thead>

                            <th>ค่ามิเตอร์ไฟเดือนก่อน</th>



                            <th>ค่ามิเตอร์ไฟเดือนนี้</th>


                            <th>ค่าต่างมิเตอร์</th>

                            </tr>
                            <tr>
                                <td><?php echo $row["E_bef"] ?></td>
                                <td><?php echo $row["E_af"] ?></td>
                                <td><?php echo $Eitp = $row["E_af"] - $row["E_bef"]  ?></td>
                            </tr>
                    </table>
                    <br>
                    <table class="table3">
                        <thead>
                            <tr>
                                <th>ค่ามิเตอร์น้ำเดือนก่อน</th>


                                <th>ค่ามิเตอร์น้ำเดือนนี้</th>


                                <th>ค่าต่างมิเตอร์</th>

                            </tr>
                            <tr>
                                <td><?php echo $row["W_bef"] ?></td>
                                <td><?php echo $row["W_af"] ?></td>
                                <td><?php echo $Witp = $row["W_af"] - $row["W_bef"]  ?></td>
                            </tr>
                    </table>
                </div>
                <br>
                <table class="table4" style="width: 100%;">
                    <tr>
                        <th>ค่าไฟ</th>
                        <th>ค่าน้ำ</th>
                        <th>ค่าห้อง</th>
                        <th>รวม</th>
                    </tr>
                    <tr style="text-align: center;">
                        <td><?php echo $Eitp = $Eitp * 10  ?></td>
                        <td><?php echo $Witp = $Witp * 10  ?></td>
                        <td><?php echo $row['Dps'] ?></td>
                        <td><?php echo $Sum = $Eitp + $Witp + $row['Dps'] ?></td>
                    </tr>
                    </tr>
                </table>
            </div>
        </div>
        <?php
        if ($currentDate >= $Date_cack and $paytime == "ถึงเวลาจ่ายเเล้ว") {
            $S_EL = $Eitp;
            $S_WA = $Witp;
            $Dps = $row['Dps'];
            $total = $Sum;
            $MC_sta = "ยังไม่จ่าย";
            $sql2 = $conn->prepare("UPDATE month SET roomId=:roomId, S_EL=:S_EL, S_WA=:S_WA, Dps=:Dps, total=:total, Date_cack=:Date_cack,MC_sta=:MC_sta WHERE roomId=:roomId AND Date_cack = :Date_cack");
            $sql2->bindParam(":roomId", $roomId);
            $sql2->bindParam(":S_EL", $S_EL);
            $sql2->bindParam(":S_WA", $S_WA);
            $sql2->bindParam(":Dps", $Dps);
            $sql2->bindParam(":total", $total);
            $sql2->bindParam(":Date_cack", $Date_cack);
            $sql2->bindParam(":MC_sta", $MC_sta);
            $sql2->execute();
        }
        ?>
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                var animeContainer = document.getElementById('animeContainer');
                animeContainer.style.transition = 'transform 0.5s ease-in-out';
                animeContainer.style.transform = 'translateX(0)';
            });
        </script>
        <div class="modal fade" id="usermodal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">จัดการข้อมูลผู้เช่า</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form action="edit.php" method="post">
                            <div class="mb-3">
                                <input type="hidden" name="roomId" value="<?php echo $roomId ?>">
                            </div>
                            <div class="mb-3">
                                <label for="Name" class="col-form-label">ชื่อ:</label>
                                <select name="Name" id="selectName">
                                    <?php
                                    if ($row !== false) {
                                        $nameselect = $conn->prepare("SELECT Name, Lname FROM user");
                                        $nameselect->bindParam(':Name', $Name);
                                        $nameselect->execute();
                                        $result = $nameselect->fetchAll(PDO::FETCH_ASSOC);
                                        if ($result) {
                                            foreach ($result as $row_name) {
                                    ?>
                                                <option value="<?php echo $row_name['Name']; ?>"><?php echo $row_name['Name']; ?></option>
                                    <?php
                                            }
                                        }
                                    }
                                    ?>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="Lname" class="col-form-label">นามสกุล:</label>
                                <input type="text" name="Lname" id="inputLname" class="form-control" value="">
                            </div>
                            <div class="mb-3">
                                <label for="staID">สถานะห้อง:</label>
                                <select name="staID">
                                    <option value="1">จองแล้ว</option>
                                    <option value="2">เช่า</option>
                                    <option value="3">ว่าง</option>
                                </select>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                <button type="submit" name="edit" class="btn btn-primary">Save Changes</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <script>
            document.getElementById('selectName').addEventListener('change', function() {
                var selectedName = this.value;
                var result = <?php echo json_encode($result); ?>;
                var selectedLname = result.find(function(item) {
                    return item.Name === selectedName;
                }).Lname;
                document.getElementById('inputLname').value = selectedLname;
            });
        </script>
        <div class="contiant_img">
            <div class="row mt-5">
                <div class="col-12">
                <form action="upload.php" method="POST" enctype="multipart/form-data" id="imageForm">
                        <div class="text-center justify-content-center align-items-center p-4 border-2 border-dashed rounded-3">
                            <h6 class="my-2 text-white">หลักฐานการโอนเงิน</h6>
                            <?php $type_img = "ค่าใช้จ่าย/เดือน"; ?>
                            <input type="file" name="file" class="form-control streched-link" accept="image/gif, image/jpeg, image/png" id="imageInput">
                            <input type="text" name="roomId" hidden value="<?php echo $roomId ?>">
                            <input type="date" name="Date_up" hidden value="<?php echo $Date_cack ?>">
                            <input type="text" name="type_img" hidden value="<?php echo $type_img ?>">
                            <p class="small mb-0 mt-2 text-white"><b>โปรดทราบ:</b> Only JPG, JPEG, PNG & GIF คือนามสกุลไฟล์ที่อนุญาติให้อัพโหลด</p>
                            <div id="imagePreview"></div>
                        </div>
                        <div class="d-sm-flex justify-content-center mt-2">
                            <input type="submit" name="img" value="Upload" class="btn btn-sm btn-primary mb-3">
                        </div>
                    </form>
                </div>
            </div>
            <div class="row">
                <?php if (!empty($_SESSION['statusMsg'])) { ?>
                    <div class="alert alert-success" role="alert">
                        <?php
                        echo $_SESSION['statusMsg'];
                        unset($_SESSION['statusMsg']);
                        ?>
                    </div>
                <?php } ?>
            </div>
        </div>
    </section>

    <script>

        document.getElementById('imageInput').addEventListener('change', function() {
            var input = this;
            var preview = document.getElementById('imagePreview');

            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function(e) {
                    preview.innerHTML = '<img src="' + e.target.result + '" alt="Preview">';
                };

                reader.readAsDataURL(input.files[0]);
            }
        })
        ;
        

    </script>
    <footer>
        <pre>หอพักนางตีมะขำธานี 51/46 ม.4 ต.คลองหนึ่ง อ. คลองหลวง จ.ปทุมธานี้ ถนน พหลโยธิน
  โทร 025161320 โทรศัพท์ 0984610262   Gmail polamet.yingni@vru.ac.th Facebook  Nus’Den
  </pre>
    </footer>
</body>

</html>