<?php
session_start();


if (file_exists('backend/bdcon.php')) {
    include('backend/bdcon.php');
} else {
    die('Error: Database connection file not found.');
}

if (isset($_SESSION['user_id'])) {
    $userId = $_SESSION['user_id'];

    if (isset($_GET['postid'])) {
        $postId = mysqli_real_escape_string($con, $_GET['postid']);

        
        $query = "
            SELECT p.*, u.name, u.rating 
            FROM proposal p 
            JOIN userdata u ON p.sellerid = u.userid 
            WHERE p.postid = $postId
        ";
        $result = mysqli_query($con, $query);

        $proposals = [];
        if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
                $proposals[] = $row;
            }
        }
    } else {
        echo '<p>لم يتم تحديد أي منشور.</p>';
        exit();
    }
} else {
    header("Location: /source-code/login.php");
    exit();
}

mysqli_close($con);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>العروض</title>
    <!--fonts-->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Caprasimo&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Protest+Strike&display=swap" rel="stylesheet">
    <!--fontawesome css-->
    <link rel="stylesheet" href="assets/css/all.min.css">
    <!--bootstrap css-->
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <!--custom css-->
    <link rel="stylesheet" href="assets/css/style.css">
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

    <!-- Main Content -->
    <div class="container">
        <br><br><h2>العروض لهذا المنشور</h2>
        <div class="row">
            <?php if (!empty($proposals)): ?>
                <?php foreach ($proposals as $proposal): ?>
                    <div class="col-md-4">
                        <div class="card">
                            <div class="card-header"><?php echo $proposal['name']; ?></div>
                            <div class="card-body">
                                <?php
                                $rating = $proposal['rating'];
                                $stars = '';
                                for ($i = 0; $i < $rating; $i++) {
                                    $stars .= '<span class="fa fa-star checked"></span>';
                                }
                                echo '<p class="card-text">التقييم: ' . $stars . '</p>';
                                ?>
                                <a href="conversation.php?user_id=<?php echo $proposal['sellerid']; ?>" class="btn btn-primary">بدء المحادثة</a>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            <?php else: ?>
                <p>لا توجد عروض لهذا المنشور.</p>
            <?php endif; ?>
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
