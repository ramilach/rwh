<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up</title>
    <!-- Font Awesome CSS -->
    <link rel="stylesheet" href="assets/css/all.min.css">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <!-- Custom CSS -->
    <link rel="stylesheet" href="assets/css/style.css">
    <style>
        .orange {
            color: #ff8f00;
        }
    </style>
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
    <div class="aler">
        <?php
        if(isset($_SESSION["status"]))
        {
            echo"<h4>".$_SESSION["status"]."</h4>";
            unset($_SESSION["status"]);
        }
        ?>
    </div>

    <h2 class="mb-4">مرحبًا بك في <span style="color: #ff8f00;">مركز العمل عن بُعد!</span></h2>
<form id="signupForm" method="POST" action="/source-code/backend/register.php"> 
    <div class="form-group">
        <input type="text" class="form-control" name="name" id="name" placeholder="الاسم الكامل">
    </div>
    <div class="form-group">
        <input type="email" class="form-control" name="email" id="email" placeholder="أدخل البريد الإلكتروني">
    </div>
    <div class="form-group">
        <input type="password" class="form-control" name="password" id="password" placeholder="كلمة المرور">
    </div>
    <div class="form-group">
        <input type="date" class="form-control" name="birthdate" id="date" placeholder="تاريخ الميلاد">
    </div>
    <button class="btn btn-outline-dark my-2 my-sm-0 mx-2 btn-login" name="signup_btn" type="submit">التسجيل</button>
</form>
<p class="mt-3">لديك حساب بالفعل؟ <a href="login.php" class="btn btn-outline-dark my-2 my-sm-0 mx-2" type="button" style="background-color: #ff8f00;">تسجيل الدخول</a></p>
</div>


    <!-- Bootstrap JS -->
    <script src="/assets/js/bootstrap.bundle.min.js"></script>
    <!-- Custom JavaScript -->
    <script src="/assets/js/main.js"></script>

</body>

</html>
