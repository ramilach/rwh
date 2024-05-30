<?php
session_start();
?>

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
</head>
<body>

<!-- Message Alert -->
<?php
if (isset($_GET['message'])) {
    echo '<div class="alert alert-info message-alert" style="position: fixed; top: 50%; left: 50%; transform: translate(-50%, -50%); z-index: 1050; text-align: center;">' . htmlspecialchars($_GET['message']) . '</div>';
}
?>

<!-- Navigation Bar -->
<nav class="navbar navbar-expand-lg navbar-white bg-white fixed-top ">
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
                    <a href="/source-code//buyer.php" class="text-decoration-none text-dark">
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
</nav><br><br><br>

<!-- Main Content -->
<div class="container">
    
    <form id="searchForm" class="mb-4">
        <div class="form-row">
            <div class="col-md-6">
                <div class="form-group">
                    <input type="text" class="form-control" name="search" id="searchInput" placeholder="ابحث عن شيء...">
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <select class="form-control" name="category" id="categorySelect">
                        <option value="all">كل الفئات</option>
                        <option value="تركيب">تركيب</option>
                        <option value="تنظيف">تنظيف</option>
                        <option value="تقليم">تقليم</option>
                        <option value="دهان">دهان</option>
                        
                    </select>
                </div>
            </div>
        </div>
    </form>

    <div class="row" id="postContainer">
        
        <?php include('backend/fetch_listing.php'); ?>
    </div>
</div>

<!-- Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<!-- Custom JS -->
<script>
    $(document).ready(function(){
        
        setTimeout(function() {
            $('.message-alert').fadeOut('slow');
        }, 3000);

        function fetchPosts() {
            var search = $('#searchInput').val();
            var category = $('#categorySelect').val();

            $.post('backend/fetch_listing.php', { search: search, category: category }, function(data) {
                $('#postContainer').html(data);
            });
        }

        $('#searchInput').on('input', fetchPosts);
        $('#categorySelect').on('change', fetchPosts);
    });
</script>
</body>
</html>
