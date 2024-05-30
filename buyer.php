<!DOCTYPE html>
<html lang="en">
<head>
    <title>My Posts</title>
    <!--fonts-->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Caprasimo&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Protest+Strike&display=swap" rel="stylesheet">
    <!--fontawesome css-->
    <link rel="stylesheet" href="assets/css/all.min.css">
    <!--boostrap css-->
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <!--custom css-->
    <link rel="stylesheet" href="assets/css/style.css">
    <!--CSS -->
    <style>
        .btn-orange {
            background: linear-gradient(to right, #ff7e5f, #feb47b); 
            border-color: #ff7e5f; 
            color: #fff; 
        }

        .btn-orange:hover {
            background: linear-gradient(to right, #ff7e5f, #feb47b); 
            border-color: #ff7e5f; 
            color: #fff; 
        }
    </style>
</head>
<body>

    <!-- Navigation Bar -->
    <nav class="navbar navbar-expand-lg navbar-whote bg-white fixed-top ">
    <a class="navbar-brand" href="#" style="font-family: Caprasimo; color: #ff8f00;">RWH</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="تبديل التنقل">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav ml-auto">
            <li class="nav-item active">
                <a class="nav-link" href="/source-code/buyer.php">مشاركاتي <span class="sr-only">(الحالي)</span></a>
            </li>
            <li class="nav-item active">
                <a class="nav-link" href="/source-code/chat_b.php">رسائلي <span class="sr-only">(الحالي)</span></a>
            </li>
        </ul>
    </div>
    <a href="support.php" class="btn btn-outline-dark my-2 my-sm-0 mx-2 rounded-circle" type="button"><i class="fas fa-flag"></i></a>
    
    <a href="#" class="btn btn-outline-dark my-2 my-sm-0 mx-2 rounded-circle" type="button" data-toggle="collapse" data-target="#navMenu">
        <i class="fa-solid fa-user"></i>
    </a>
    <!--collapse-->
    <div class="collapse" id="navMenu">
        <div class="card card-body">
            <ul class="list-group list-group-flush">
                <li class="list-group-item border-0">
                    <a href="/source-code//seller.php"  class="text-decoration-none text-dark">
                        <i class="fas fa-exchange-alt mr-2"></i>تبديل الدور
                    </a>
                </li>
                <li class="list-group-item border-0">
                    <a href="/source-code//myprofile.php" class="text-decoration-none text-dark">
                        <i class="fas fa-user-circle mr-2"></i>ملفي الشخصي
                    </a>
                </li>
                <li class="list-group-item border-0">
                    <a href="backend/logout.php" class="text-decoration-none text-dark">
                        <i class="fas fa-sign-out-alt mr-2"></i>تسجيل الخروج
                    </a>
                </li>
            </ul>
        </div>
    </div>
</nav><br><br>

<!--main page -->

<div class="container mt-5">
<h2 class="text-center">مشاركاتي</h2>
<div class="row justify-content-end mb-2">
    <div class="col-auto">
        <a href="newpost.php" class="btn btn-primary">إنشاء مشاركة جديدة</a>
    </div>
</div>

    </div>
    <div class="row mt-4">
        <?php include('backend/fetch_posts.php'); ?>
    </div>
</div>

<!--bootstrap js-->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<!--js-->
<script src="assets/js/main.js"></script>

</body>
</html>
