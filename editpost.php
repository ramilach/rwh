<?php
session_start();
include_once("backend/bdcon.php");


$postId = $postTitle = $postDescription = $skills = $price = $category = $time = $postLocation = "";

if (!isset($_SESSION['user_id'])) {
    header("Location: /source-code/login.php");
    exit();
}

if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET['post_id'])) {
    $postId = mysqli_real_escape_string($con, $_GET['post_id']);
    $userId = $_SESSION['user_id'];

    
    $sql = "SELECT * FROM post WHERE postid = '$postId' AND userid = '$userId'";
    $result = mysqli_query($con, $sql);

    if (mysqli_num_rows($result) == 1) {
        $row = mysqli_fetch_assoc($result);
        $postTitle = $row['posttitle'];
        $postDescription = $row['postdescription'];
        $skills = $row['skills'];
        $price = $row['price'];
        $category = $row['category'];
        $time = $row['time'];
        $postLocation = $row['postlocation'];
    } else {
        
        header("Location: /source-code/buyer.php");
        exit();
    }
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $postId = mysqli_real_escape_string($con, $_POST['postId']);
    $postTitle = mysqli_real_escape_string($con, $_POST['postTitle']);
    $postDescription = mysqli_real_escape_string($con, $_POST['postDescription']);
    $skills = mysqli_real_escape_string($con, $_POST['skills']);
    $price = mysqli_real_escape_string($con, $_POST['price']);
    $category = mysqli_real_escape_string($con, $_POST['category']);
    $time = mysqli_real_escape_string($con, $_POST['time']);
    $postLocation = mysqli_real_escape_string($con, $_POST['postLocation']);
    $userId = $_SESSION['user_id'];

    
    $sql = "SELECT * FROM post WHERE postid = '$postId' AND userid = '$userId'";
    $result = mysqli_query($con, $sql);

    if (mysqli_num_rows($result) == 1) {
        
        $sql = "UPDATE post SET posttitle = '$postTitle', postdescription = '$postDescription', skills = '$skills', 
                price = '$price', category = '$category', time = '$time', postlocation = '$postLocation' WHERE postid = '$postId'";
        
        if (mysqli_query($con, $sql)) {
            header("Location: /source-code/buyer.php");
            exit();
        } else {
            echo "Error updating post: " . mysqli_error($con);
        }
    } else {
        
        header("Location: /source-code/buyer.php");
        exit();
    }
}


mysqli_close($con);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Edit Post</title>
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
</head>
<body>

    <!-- Navigation Bar -->
    <nav class="navbar navbar-expand-lg navbar-white bg-white fixed-top">
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
                    <a class="nav-link" href="#">رسائلي <span class="sr-only">(الحالي)</span></a>
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
                        <a href="/source-code/seller.php" class="text-decoration-none text-dark">
                            <i class="fas fa-exchange-alt mr-2"></i>تبديل الدور
                        </a>
                    </li>
                    <li class="list-group-item border-0">
                        <a href="/source-code/myprofile.php" class="text-decoration-none text-dark">
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
    <div class="container mt-5">
        <h2 class="text-center">تحرير المشاركة</h2>
        <div class="row justify-content-center">
            <div class="col-md-6">
                <form action="" method="POST">
                    <input type="hidden" name="postId" value="<?php echo $postId; ?>">
                    <div class="form-group">
                        <label for="postTitle">عنوان المشاركة</label>
                        <input type="text" class="form-control" id="postTitle" name="postTitle" value="<?php echo $postTitle; ?>" required>
                    </div>
                    <div class="form-group">
                        <label for="postDescription">وصف المشاركة</label>
                        <textarea class="form-control" id="postDescription" name="postDescription" rows="4" required><?php echo $postDescription; ?></textarea>
                    </div>
                    <div class="form-group">
                        <label for="skills">المهارات</label>
                        <input type="text" class="form-control" id="skills" name="skills" value="<?php echo $skills; ?>" required>
                    </div>
                    <div class="form-group">
                        <label for="price">السعر</label>
                        <input type="text" class="form-control" id="price" name="price" value="<?php echo $price; ?>" required>
                    </div>
                    <div class="form-group">
                        <label for="category">الفئة</label>
                        <input type="text" class="form-control" id="category" name="category" value="<?php echo $category; ?>" required>
                    </div>
                    <div class="form-group">
                        <label for="time">الوقت</label>
                        <input type="text" class="form-control" id="time" name="time" value="<?php echo $time; ?>" required>
                    </div>
                    <div class="form-group">
                        <label for="postLocation">موقع المشاركة</label>
                        <input type="text" class="form-control" id="postLocation" name="postLocation" value="<?php echo $postLocation; ?>" required>
                    </div>
                    <button type="submit" class="btn btn-primary">تحديث</button>
                </form>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS and other scripts -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
