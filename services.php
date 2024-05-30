<!DOCTYPE html>
<html lang="en">

<head>
    <title>Services</title>
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
 
<section id="what-we-offer" class="py-5">
    <div class="container"> <br>
        <h2 class="text-center mb-4">ما نقدمه</h2>
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="embed-responsive embed-responsive-16by9">
                    <video class="embed-responsive-item mx-auto d-block" controls>
                        <source src="assets/vids/who are we/what we offer.mp4" type="video/mp4">
                        متصفحك لا يدعم تشغيل مقاطع الفيديو.
                    </video>
                </div>
            </div>
        </div>
    </div>
</section>


<section id="how-it-works" class="py-5">
    <div class="container">
        <h2 class="text-center mb-4">كيف يعمل الأمر</h2>
        <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
            <ol class="carousel-indicators">
                <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
                <li data-target="#carouselExampleIndicators" data-slide-to="3"></li>
            </ol>
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img class="d-block w-100" src="assets/img/1.png" alt="الشريحة الأولى">
                </div>
                <div class="carousel-item">
                    <img class="d-block w-100" src="assets/img/2.png" alt="الشريحة الثانية">
                </div>
                <div class="carousel-item">
                    <img class="d-block w-100" src="assets/img/3.png" alt="الشريحة الثالثة">
                </div>
                <div class="carousel-item">
                    <img class="d-block w-100" src="assets/img/4.png" alt="الشريحة الرابعة">
                </div>
            </div>
            <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">السابق</span>
            </a>
            <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">التالي</span>
            </a>
        </div>
    </div>
</section>


    <!--bootstrap js-->
    <script src="assets/js/bootstrap.bundle.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <!--js-->
    <script src="assets/js/main.js"></script>

</body>

</html>
