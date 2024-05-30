<!DOCTYPE html>
<html lang="en">

<head>
    <title>Get Verification Token</title>
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
                <div class="card-header">الحصول على رمز التحقق</div>
                <div class="card-body">
                    <form action="/source-code/backend/get_token_backend.php" method="POST">
                        <div class="form-group">
                            <label for="email">البريد الإلكتروني:</label>
                            <input type="email" class="form-control" id="email" name="email" placeholder="أدخل بريدك الإلكتروني" required>
                        </div>
                        <button type="submit" class="btn btn-primary">الحصول على الرمز</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>


</body>

</html>
