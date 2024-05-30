<!DOCTYPE html>
<html lang="en">

<head>
    <title>home</title>
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

<body>

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

    <!-- Description Section -->
    <div class="description-section" style="background-color: #f0f0f0;">
    <div class="container">
        <div class="description-text">
            <h2><span style="color: rgba(255,143,0,255);">الموقع رقم 1 </span>للعثور على وظائف عن بُعد في الجزائر</h2>
            <p>اعثر على وظيفتك التالية من راحة منزلك.</p>
            <a href="signup.php" class="btn btn-primary get-started-btn">ابدأ الآن</a>
        </div>
    </div>
</div>

    <!--who are we?-->

    <div class="container mt-5">
        <div class="row">
            <div class="col-12 text-center">
                <h2>من نحن ؟</h2>
            </div>
        </div>
        <div class="row">
            <div class="col-12 video-player mt-3">

                <video controls width="100%" height="auto">
                    <source src="assets/vids/who are we/who are we.mp4" type="video/mp4">
                    Your browser does not support the video tag.
                </video>
            </div>
        </div>
    </div>


    <!--icons-->

    <div class="container mt-5">
    <div class="text-center">
        <h1>انطلق للأمام مع <span style="color: #ff8f00;">مركز العمل عن بُعد</span></h1>
        <p class="lead">طريقك إلى النجاح في العمل عن بُعد</p>
    </div>

    <div class="row mt-4">
        <div class="col-md-3 text-center">
            <i class="fas fa-users fa-3x mb-2"></i>
            <p>انضم إلى مجتمعنا</p>
        </div>
        <div class="col-md-3 text-center">
            <i class="fas fa-briefcase fa-3x mb-2"></i>
            <p>احصل على وظيفتك الأولى</p>
        </div>
        <div class="col-md-3 text-center">
            <i class="fas fa-money-bill-alt fa-3x mb-2"></i>
            <p>الدفع يد بيد</p>
        </div>

        <div class="col-md-3 text-center">
            <i class="fas fa-comment fa-3x mb-2"></i>
            <p>ردود الفعل والتقييم</p>
        </div>
    </div>
</div>

    <!--bootstrap js-->
    <script src="assets/js/bootstrap.bundle.min.js"></script>
    <!--js-->
    <script src="assets/js/main.js"></script>

</body>

</html>
