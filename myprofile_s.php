<?php
session_start();


if (!isset($_SESSION['user_id'])) {
    
    header("Location: /source-code/login.php");
    exit();
}

include_once("backend/bdcon.php");


$userId = $_SESSION['user_id'];
$query = "SELECT * FROM userdata WHERE userid = $userId";
$result = mysqli_query($con, $query);

if ($result && mysqli_num_rows($result) == 1) {
    
    $userData = mysqli_fetch_assoc($result);
} else {
    
    echo "Error: User data not found.";
    exit();
}


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    $name = mysqli_real_escape_string($con, $_POST['name']);
    $email = mysqli_real_escape_string($con, $_POST['email']);
    $userLocation = mysqli_real_escape_string($con, $_POST['userlocation']);
    $skills = mysqli_real_escape_string($con, $_POST['skills']);
    $description = mysqli_real_escape_string($con, $_POST['description']);
    $birthdate = mysqli_real_escape_string($con, $_POST['birthdate']);

    
    $updateQuery = "UPDATE userdata SET name = '$name', email = '$email', userlocation = '$userLocation', skills = '$skills', description = '$description', birthdate = '$birthdate' WHERE userid = $userId";
    $updateResult = mysqli_query($con, $updateQuery);

    if ($updateResult) {
       
        header("Location: /source-code/myprofile.php");
        exit();
    } else {
        
        echo "Error: " . mysqli_error($con);
        exit();
    }
}

mysqli_close($con);
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <title>My Profile</title>
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
            <a class="nav-link active" href="/source-code/seller.php">المشاركات <span class="sr-only">(الحالي)</span></a>
            </li>
            <li class="nav-item active">
                <a class="nav-link" href="/source-code/chat.php">رسائلي <span class="sr-only">(الحالي)</span></a>
            </li>
        </ul>
    </div>
    <a href="support_s.php" class="btn btn-outline-dark my-2 my-sm-0 mx-2 rounded-circle" type="button"><i class="fas fa-flag"></i></a>
    
    <a href="#" class="btn btn-outline-dark my-2 my-sm-0 mx-2 rounded-circle" type="button" data-toggle="collapse" data-target="#navMenu">
        <i class="fa-solid fa-user"></i>
    </a>
    <!--collapse-->
    <div class="collapse" id="navMenu">
        <div class="card card-body">
            <ul class="list-group list-group-flush">
                <li class="list-group-item border-0">
                    <a href="/source-code//buyer.php"  class="text-decoration-none text-dark">
                        <i class="fas fa-exchange-alt mr-2"></i>تبديل الدور
                    </a>
                </li>
                <li class="list-group-item border-0">
                    <a href="/source-code//myprofile_s.php" class="text-decoration-none text-dark">
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

<!-- Main content -->
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    <h2 class="text-center">ملفي الشخصي</h2>
                </div>
                <div class="card-body">
                    <form method="POST" action="">
                        <div class="form-group">
                            <label for="name">الاسم:</label>
                            <input type="text" class="form-control" id="name" name="name" value="<?php echo $userData['name']; ?>">
                        </div>
                        <div class="form-group">
                            <label for="email">البريد الإلكتروني:</label>
                            <input type="email" class="form-control" id="email" name="email" value="<?php echo $userData['email']; ?>">
                        </div>
                        <div class="form-group">
                            <label for="userlocation">الموقع:</label>
                            <input type="text" class="form-control" id="userlocation" name="userlocation" value="<?php echo $userData['userlocation']; ?>">
                        </div>
                        <div class="form-group">
                            <label for="skills">المهارات:</label>
                            <input type="text" class="form-control" id="skills" name="skills" value="<?php echo $userData['skills']; ?>">
                        </div>
                        <div class="form-group">
                            <label for="description">الوصف:</label>
                            <textarea class="form-control" id="description" name="description"><?php echo $userData['description']; ?></textarea>
                        </div>
                        <div class="form-group">
                            <label for="birthdate">تاريخ الميلاد:</label>
                            <input type="date" class="form-control" id="birthdate" name="birthdate" value="<?php echo $userData['birthdate']; ?>">
                        </div>
                        <button type="submit" class="btn btn-primary">تحديث</button>
                    </form>
                </div>
            </div>
        </div>
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
