<?php
session_start(); 

include_once "backend/bdcon.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>My Chat</title>
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
    <style>
        .user-list {
            list-style-type: none;
            padding: 0;
        }
        .user-list-item {
            display: flex;
            align-items: center;
            padding: 8px 16px;
            border-bottom: 1px solid #ddd;
        }
        .user-list-item:last-child {
            border-bottom: none;
        }
        .user-icon {
            margin-right: 10px;
        }
        .stars-outer {
            display: inline-block;
            position: relative;
            font-family: FontAwesome;
        }
        .stars-outer::before {
            content: "\f006 \f006 \f006 \f006 \f006";
            font-size: 16px;
            color: #ccc;
        }
        .stars-inner {
            position: absolute;
            top: 0;
            left: 0;
            white-space: nowrap;
            overflow: hidden;
            font-family: FontAwesome;
            color: #ff8f00;
        }
        .stars-inner::before {
            content: "\f005 \f005 \f005 \f005 \f005";
            font-size: 16px;
        }
    </style>
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
</nav><br><br><br>


<!-- Chat Page -->
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
            
            <h3 class="text-center">قائمة</h3>
            <div class="list-group user-list">
                <?php
                
                $currentUserId = $_SESSION['user_id'] ?? null;
                if ($currentUserId) {
                    $sql = "SELECT userid, name, rating FROM userdata WHERE userid != '$currentUserId'";
                    $result = mysqli_query($con, $sql);

                    
                    if (mysqli_num_rows($result) > 0) {
                        
                        while ($row = mysqli_fetch_assoc($result)) {
                            $rating = number_format($row['rating'], 1); 
                            $starPercentage = ($row['rating'] / 5) * 100; 
                            echo '<a href="conversation.php?user_id=' . $row['userid'] . '" class="list-group-item list-group-item-action user-list-item">
                                <i class="fas fa-user user-icon"></i>' . $row['name'] . '
                                <div class="stars-outer">
                                    <div class="stars-inner" style="width:' . $starPercentage . '%;"></div>
                                </div>
                            </a>';
                        }
                    } else {
                        echo '<div class="list-group-item text-center">No other users found.</div>';
                    }
                } else {
                    echo '<div class="list-group-item text-center">Error: User not logged in.</div>';
                }

                
                mysqli_close($con);
                ?>
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
