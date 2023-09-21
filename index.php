<?php
session_start();
require_once 'mysql/connect.php'; ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
    <script src="https://kit.fontawesome.com/401736f69f.js" crossorigin="anonymous"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Oswald:wght@600&display=swap" rel="stylesheet">
    <title>Login</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-image: linear-gradient(100deg, #3498db, #2ecc71);
        }

        .login-container {
            width: 300px;
            margin: 0 auto;
            margin-top: 100px;
            border-radius: 20px;
            transform: scale(1.5);
            /* ขยายขนาดเป็น 2 เท่า */
            transform-origin: top left;
            /* จุดเริ่มต้นของการขยาย */
        }

        h2 {
            text-align: center;
            margin-bottom: 20px;
        }

        h1 {
            border: 3px solid blue;
            border-radius: 20px;
            width: 500px;
            margin: auto;
        }

        .center-icon {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100px;
            /* ทำให้ไอคอนเต็มสูงของหน้าจอ */
        }







        input[type="submit"] {
            width: 50%;
            padding: 10px;
            margin-left: 50px;
            background-color: rgba(0, 0, 0, 0.3);
            color: #fff;
            border: none;
            cursor: pointer;
            font-size: 16px;
            border-radius: 20px;
        }

        input[type="submit"]:hover {
            background-color: #ffffff;
            color: #34495e;
            cursor: pointer;
        }

        input[type="text"] {
            color: #ffffff;
        }

        input[type="text"]::placeholder {
            color: #ffffff;
        }

        input.transparent-input {
            background: transparent;
            border: none;
            border-bottom: 2px white solid;
        }
    </style>
</head>

<body>
    <header>
        <?php if (isset($_SESSION['error'])) { ?>
            <div class="alert alert-danger">
                <?php echo $_SESSION['error'];
                unset($_SESSION['error']);
                ?>
            </div>
        <?php } ?>
    </header>
    <section>
        <div class="login-container">

            <div class="center-icon" style="margin-Right:40px;">
                <form action="login_db.php" method="post">
                    <span style="text-align: center;color:#ffffff;font-size:20px;margin-right: 10px;font-family: 'Oswald', sans-serif;
">TEEMA</span>
                    <i class="fa-solid fa-hotel fa-2xl" style="color: #ffffff;"></i>

            </div>
            <div class="form-group" style="height: 70px;">
                <i class="fa-regular fa-user fa-fade fa-lg" style="color: #ffffff;"></i>
                <input type="text" id="username" class="transparent-input" name="username" placeholder="username">
            </div>
            <div class="form-group" style="height: 70px;">
                <i class="fa-solid fa-lock fa-fade fa-lg" style="color: #ffffff;"></i>
                <input type="text" id="password" class="transparent-input" name="password" placeholder="password">
            </div>
            <input type="submit" class="btn-submit" name="login" value="Login">
            </form>
        </div>

    </section>
</body>

</html>