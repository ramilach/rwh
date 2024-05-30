<?php
session_start();
include_once "backend/bdcon.php";


if (!isset($_SESSION['user_id'])) {
    
    header("Location: login.php");
    exit();
}


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    $problemTitle = isset($_POST['problemTitle']) ? mysqli_real_escape_string($con, $_POST['problemTitle']) : '';
    $category = isset($_POST['category']) ? mysqli_real_escape_string($con, $_POST['category']) : '';
    $priority = isset($_POST['priority']) ? mysqli_real_escape_string($con, $_POST['priority']) : '';

    
    $query = "INSERT INTO support (supportdesc, category, priority) VALUES ('$problemTitle', '$category', '$priority')";
    
    
    if (mysqli_query($con, $query)) {
       
        $success_message = "تم إرسال المشكلة بنجاح!";
    } else {
        
        $error_message = "حدث خطأ أثناء إرسال المشكلة: " . mysqli_error($con);
    }
}



?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Support</title>
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
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav ml-auto">
            <li class="nav-item active">
            <a class="nav-link active" href="/source-code/seller.php">المشاركات <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item active">
                <a class="nav-link" href="/source-code/chat.php">رسائلي <span class="sr-only">(current)</span></a>
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

    <!-- Form Section -->
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-6 mt-5">
                <?php if(isset($success_message)) { ?>
                    <div class="alert alert-success"><?php echo $success_message; ?></div>
                <?php } ?>
                <?php if(isset($error_message)) { ?>
                    <div class="alert alert-danger"><?php echo $error_message; ?></div>
                <?php } ?>
                <form action="" method="POST">
                    <div class="form-group">
                        <label for="problemTitle">صف المشكلة الخاصة بك</label>
                        <textarea class="form-control" name="problemTitle" id="problemTitle" rows="3" placeholder="اكتب مشكلتك هنا..." required></textarea>
                    </div>
                    <div class="form-group">
                        <label for="category">الفئة</label>
                        <select class="form-control" id="category" name="category" required>
                            <option value="تقنية">تقنية</option>
                            <option value="حساب">حساب</option>
                            <option value="أخرى">أخرى</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="priority">الأولوية</label>
                        <select class="form-control" id="priority" name="priority" required>
                            <option value="منخفضة">منخفضة</option>
                            <option value="متوسطة">متوسطة</option>
                            <option value="عالية">عالية</option>
                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary">إرسال</button>
                </form>
            </div>
        </div>
    </div>
    
    <!-- Contact Information -->
    <section class="contact-section bg-light py-5">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8 text-center">
                <h2>تواصل معنا</h2>
                <p>إذا كنت بحاجة إلى مساعدة فورية، فلا تتردد في الاتصال بنا باستخدام المعلومات أدناه:</p>
                <ul class="list-unstyled">
                    <li>البريد الإلكتروني: rwhsupport@gmail.com</li>
                    <li>الهاتف: +1 (123) 456-7890</li>
                </ul>
            </div>
        </div>
    </div>
</section>

    <!-- Bootstrap JS and other scripts -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
