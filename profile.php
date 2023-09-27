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

        tr {
            border-bottom: 2px solid #c4c2bc;
        }


        th {
            color: #3d3c38;
            font-size: 18px;
            text-shadow: 1px 1px #431919;
        }

        footer {
            background-color: #777;
            padding: 10px;
            text-align: center;
            color: white;
        }

        td {
            font-size: 16px;
            color: blue;
            font-style: italic;
        }

        .table2 {
            border-collapse: collapse;
            font-size: 16px;
            margin-right: 20px;
        }

        /* สไตล์สำหรับแถวหัวของตาราง */
        .table2 th {
            text-align: left;
            padding: 8px;
        }

        /* สไตล์สำหรับแถวของตาราง */
        .table2 td {
            padding: 8px;
            border-bottom: 1px solid #ddd;
        }

        section {
            padding: 10px;
        }

        /* สไตล์สำหรับแถวเลขคี่ */

        /* สไตล์สำหรับแถวเมื่อเลื่อนเมาส์เข้า */
        .table2 tr:hover {
            background-color: #f0e68c;
        }

        .table3 tr:hover {
            background-color: #f0e68c;
        }

        .container {
            display: flex;
            flex-direction: column;
            border-radius: 10px 10px 0px 0px;
            box-shadow: 2px 2px 2px 2px wheat;
            background-color: #ffffff;
            padding: 20px;
        }

        .container2 {
            display: flex;
            flex-direction: row;
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
            align-self: left;
            margin-left: 10%;
            font-size: 30px;
            color: #FFD700;
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
            display: block;
            margin: auto;
            text-align: center;
            
        }

        img {
            vertical-align: middle;
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
            color: white;
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
        header{
            background-color: #bbb;
        }
        .active,
        .dot:hover {
            background-color: #717171;
        }

        /* Fading animation */
        .fade {
            animation-name: fade;
            animation-duration: 1.5s;
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
.custom-link.active{
  color: #ffffff;
  background-color: #3d3c38;
  border-radius: 5px;
}
    </style>
</head>

<body>
    <header>
        <?php if (!isset($_SESSION['admin_login'])) {
            echo "
            <form method='post' action=''>
            <input type='submit' name='logout' value='ออกจากระบบ'>
            </form>
            <div style='text-align: center;padding:10px'>
            <a href='detaroom copy.php?roomId=$roomId'; class='custom-link'>ข้อมูลห้อง</a>
            <a href='datareportuser.php?roomId=$roomId'; class='custom-link'>เเจ้งซ่อม</a>
            <a href='profile.php?roomId=$roomId'; class='custom-link active'>เเอดมิน/คำเเนะนำ</a>
            </div>
            ";
        } else {
            echo "<nav>
                <ul class='nav nav-tabs bg-dark'>
                <li class='nav-item'>
                    <a class='nav-link active' aria-current='page' href='hometes.php'><i class='fa-solid fa-house fa-fade fa-xl'></i></a>
                </li>
                <li class='nav-item'>
                    <a class='nav-link'  href='test1.php'>ข้อมูลผู้ใช้</a>
                </li>
                <li class='nav-item'>
                    <a class='nav-link'  href='test2.php'>ค่าน้ำ</a>
                </li>
                <li class='nav-item'>
                    <a class='nav-link'  href='test3.php'>ค่าไฟ</a>
                </li>
                <li class='nav-item'>
                    <a class='nav-link' href='test4.php'><i class='fa-solid fa-bed-front'></i></a>
                </li>
                ";
        } ?>
        </ul>
        </nav>
        <div style="background-color:rgba(0,250,154, 0.3)">
        <div class="slideshow-container">

            <div class="mySlides">
                <div class="numbertext">1 / 3</div>
                <img src="img/nus1.jpg" style="width:50%">
                <div class="text">Caption Text</div>
            </div>

            <div class="mySlides">
                <div class="numbertext">2 / 3</div>
                <img src="img/nus2.jpg" style="width:50%">
                <div class="text">Caption Two</div>
            </div>

            <div class="mySlides">
                <div class="numbertext">3 / 3</div>
                <img src="img/nus3.jpg" style="width:50%">
                <div class="text">Caption Three</div>
            </div>

            <a class="prev" onclick="plusSlides(-1)">❮</a>
            <a class="next" onclick="plusSlides(1)">❯</a>

        </div>
        <br>

        <div style="text-align:center">
            <span class="dot" onclick="currentSlide(1)"></span>
            <span class="dot" onclick="currentSlide(2)"></span>
            <span class="dot" onclick="currentSlide(3)"></span>
        </div>
        </div>
    </header>
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
        <h2 style="text-align: center;color:gold;text-shadow:2px 2px black;">เเอดมิน<i class="fa-regular fa-flag fa-bounce" style="color: #f6ee04;text-align:center;"></i></h2>

        <div class="container">
            <h5 style="text-align: center;">นายปรเมษฐ์ ยิ่งนิยม นักศึกษาปี4</h5>
<pre>       เป็นผู้ทำระบบจัดการข้อมูลหอพัก นางตีมะ ซึ่งมีเป้าหมายว่าต้องการระบบจัดการข้อมูลหอพักที่สามารถให้ผู้เช่าภายในหอพักสามารถติดตามการอัพเดทข้อมูลการ
    ชำระเงินได้อย่างระเอียดเเละ ยังให้สามรถเเจ้งปัญหาได้อีกด้วย
       ทั้งนี้ตัวระบบสามารถใช้ได้ทุกฟั่งชั่นที่มีเเต่เนื่องจากการทำระบบเพียงครั้งเเรงอาจมีผิดผลาดสามารถเเจ้งได้ที่ 0984610262ขอขอบคุณท่านที่รับชมเเละทดลองใช้
    ระบบด้วยครับ</pre>
        
        </div>
    </section>
    <footer>
        <pre>หอพักนางตีมะขำธานี 51/46 ม.4 ต.คลองหนึ่ง อ. คลองหลวง จ.ปทุมธานี้ ถนน พหลโยธิน
  โทร 025161320 โทรศัพท์ 0984610262   Gmail polamet.yingni@vru.ac.th Facebook  Nus’Den
  </pre>
    </footer>
</body>

</html>