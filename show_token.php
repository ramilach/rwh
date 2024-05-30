<?php
session_start();


if (isset($_SESSION['verify_token'])) {
    $verify_token = $_SESSION['verify_token'];
} else {
    $verify_token = "Error: Verification token not found";
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>Verification Token</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <!-- Custom CSS -->
    <link rel="stylesheet" href="assets/css/style.css">
</head>

<body>

<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">رمز التحقق الخاص بك</div>
                <div class="card-body">
                    <p class="text-center">انسخ هذا الرمز واحتفظ به بأمان. ستحتاج إليه لاسترجاع كلمة المرور وغيرها من الإجراءات المتعلقة بالحساب.</p>
                    <h2 class="text-center"><?php echo $verify_token; ?></h2>
                </div>
                <div class="card-footer">
                    <a href="login.php" class="btn btn-primary btn-block">سجل الآن</a>
                </div>
            </div>
        </div>
    </div>
</div>


</body>

</html>
