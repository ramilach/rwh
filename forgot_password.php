<!DOCTYPE html>
<html lang="en">

<head>
    <title>Update Password</title>
    <!--fonts-->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Caprasimo&display=swap" rel="stylesheet">
    <!--fontawesome css-->
    <link rel="stylesheet" href="assets/css/all.min.css">
    <!--boostrap css-->
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <!--css-->
    <link rel="stylesheet" href="assets/css/style.css">
</head>

<body class="login-page">
    <?php
    session_start();
    ?>
    
    <!-- Navigation Bar -->
    <nav class="navbar navbar-expand-lg navbar-light bg-light fixed-top">
    <a class="navbar-brand" href="#" style="font-family: Caprasimo; color: #ff8f00;">RWH</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav ml-auto">
            <li class="nav-item active">
                <a class="nav-link" href="/source-code/index.php">الصفحة الرئيسية <span class="sr-only">(الحالي)</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="/source-code/services.php">الخدمات</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="/source-code/about.php">حول</a>
            </li>
        </ul>
    </div>
    <a href="login.php" class="btn btn-outline-dark my-2 my-sm-0 mx-2" type="button">تسجيل الدخول</a>
    
    <a href="signup.php" class="btn btn-outline-warning my-2 my-sm-0" type="button" style="background-color: #ff8f00;">التسجيل</a>
</nav>

    <br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>

    <div class="login-container" style="background-color: #f0f0f0; padding: 20px;">
    <div class="alert">
    <?php

        if(isset($_SESSION["status"])) {
            echo "<p>" . $_SESSION["status"] . "</p>";
            unset($_SESSION["status"]);
        }
        ?>
    </div>

    <h2 class="mb-4">قم بتحديث كلمة المرور الخاصة بك!</h2>
<form method="post" action="backend/new_password.php">
    <div class="form-group">
        <input type="email" class="form-control" name="email" id="email" placeholder="أدخل البريد الإلكتروني">
    </div>    
    <div class="login-form">
        <input type="text" class="form-control" name="verify_token" id="verify_token"  placeholder="رمز التحقق">
    </div>
    <div class="form-group">
        <input type="password" class="form-control" name="password" id="password" placeholder="كلمة المرور الجديدة">
    </div>
    <button class="btn btn-outline-dark my-2 my-sm-0 mx-2 btn-login" type="submit">تحديث</button>
</form>


    <!--bootstrap js-->
    <script src="/assets/js/bootstrap.bundle.min.js"></script>
    <!--js-->
    <script src="/assets/js/main.js"></script>

</body>
</html>
