<!DOCTYPE html>
<html lang="en">

<head>
    <title>Login</title>
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
    <h2 class="mb-4">مرحبًا بك في <span style="color: #ff8f00;">مركز العمل عن بُعد!</span></h2>
        <form method="post" action="backend/login_backend.php">
            <div class="aler">
                <?php
                if(isset($_SESSION["status"]))
                {
                    echo "<h4>".$_SESSION["status"]."</h4>";
                    unset($_SESSION["status"]);
                }
                ?>
            </div>
                
            <div class="login-form">
    <input type="email" class="form-control" name="email" id="Email1" aria-describedby="emailHelp" placeholder="أدخل البريد الإلكتروني">
</div>
<div class="form-group">
    <input type="password" class="form-control" name="password" id="Password" placeholder="كلمة المرور">
</div>
<button class="btn btn-outline-dark my-2 my-sm-0 mx-2 btn-login" type="submit">تسجيل الدخول</button>
</form>
<p class="mt-3">جديد هنا؟ <a href="signup.php" class="btn btn-outline-warning my-2 my-sm-0" type="button" style="background-color: #ff8f00;">التسجيل</a></p>

<!-- Forgot password link -->
<p><a href="forgot_password.php">هل نسيت كلمة المرور؟</a></p>
</div>


    <!--bootstrap js-->
    <script src="/assets/js/bootstrap.bundle.min.js"></script>
    <!--js-->
    <script src="/assets/js/main.js"></script>

</body>
</html>
