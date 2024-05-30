<?php
session_start();
include_once "backend/bdcon.php";


if (isset($_GET['user_id'])) {
    $userId = $_GET['user_id'];
} else {
   
    header("Location: chat.php");
    exit();
}


$sql_user = "SELECT name, rating FROM userdata WHERE userid = '$userId'";
$result_user = mysqli_query($con, $sql_user);
$user_row = mysqli_fetch_assoc($result_user);
$talkingWithUser = $user_row['name'];
$talkingWithUserRating = $user_row['rating'];


$currentUserId = $_SESSION['user_id'];
$sql = "SELECT m.*, u.name AS sender_name
        FROM messages m 
        JOIN userdata u ON m.sender_id = u.userid 
        WHERE (m.sender_id = '$currentUserId' AND m.receiver_id = '$userId') 
        OR (m.sender_id = '$userId' AND m.receiver_id = '$currentUserId') 
        ORDER BY m.timestamp ASC";
$result = mysqli_query($con, $sql);


if (!$result) {
    die("Error: " . mysqli_error($con));
}


if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['message'])) {
    
    $message = mysqli_real_escape_string($con, $_POST['message']);
    
    
    $insertSql = "INSERT INTO messages (sender_id, receiver_id, message_text, timestamp) 
                  VALUES ('$currentUserId', '$userId', '$message', NOW())";
    $insertResult = mysqli_query($con, $insertSql);

    
    if (!$insertResult) {
        die("Error: " . mysqli_error($con));
    }

    
    header("Location: conversation.php?user_id=$userId");
    exit();
}


if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['rating'])) {
    
    $rating = floatval($_POST['rating']);
    if ($rating >= 1 && $rating <= 5) {
        
        $newRating = ($talkingWithUserRating + $rating) / 2;
        
        
        $updateRatingSql = "UPDATE userdata SET rating = '$newRating' WHERE userid = '$userId'";
        $updateRatingResult = mysqli_query($con, $updateRatingSql);

        
        if (!$updateRatingResult) {
            die("Error: " . mysqli_error($con));
        }

        
        $talkingWithUserRating = $newRating;
    } else {
        echo "Invalid rating value. Please enter a value between 1 and 5.";
    }

    
    header("Location: conversation.php?user_id=$userId");
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0"><br>
    <title>التحدث مع <?php echo $talkingWithUser; ?></title>
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
    <style>
        .message-container {
            margin-bottom: 10px;
        }
        .message-text {
            padding: 10px;
            border-radius: 20px;
            max-width: 70%;
            word-wrap: break-word;
        }
        .sender-message {
            text-align: right;
            background-color: #dcf8c6;
            margin-left: auto;
        }
        .receiver-message {
            text-align: left;
            background-color: #f3f3f3;
            margin-right: auto;
        }
        .message-sender {
            font-size: 14px;
            font-weight: bold;
            color: #333;
            margin-bottom: 5px;
        }
        .message-timestamp {
            font-size: 12px;
            color: #777;
            margin-top: 5px;
        }
        .header-text {
            font-size: 24px; 
        }
        .rating-form {
            margin-top: 20px;
        }
        .rating-input {
            width: 100px;
            margin-right: 10px;
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

<div class="container">
<h1 class="header-text">تتحدث إلى <span style="color: #ff8f00;"><?php echo $talkingWithUser; ?></span></h1>
<!-- Rating Form -->
<form id="rating-form" action="" method="post" class="rating-form">
        <div class="input-group">
            <input type="number" class="form-control rating-input" name="rating" min="1" max="5" step="0.1" placeholder="تقييم 1-5" required>
            <div class="input-group-append">
                <button class="btn btn-outline-secondary" type="submit">تأكيد التقييم</button>
            </div>
        </div>
    </form>

    <div id="chat-container">
        <?php
        
        if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
                
                $messageText = $row['message_text'];
                $senderName = ($row['sender_id'] == $currentUserId) ? 'أنا' : $row['sender_name'];
                $timestamp = date('Y-m-d H:i:s', strtotime($row['timestamp']));
                $messageClass = ($row['sender_id'] == $currentUserId) ? 'sender-message' : 'receiver-message';
                echo '<div class="message-container">';
                echo '<div class="message-text ' . $messageClass . '">';
                echo '<p class="message-sender">' . $senderName . '</p>';
                echo '<p>' . $messageText . '</p>';
                echo '<p class="message-timestamp">' . $timestamp . '</p>';
                echo '</div>';
                echo '</div>';
            }
        } else {
            echo "No messages found.";
        }
        ?>
    </div>

    <form id="message-form" action="" method="post">
        <div class="input-group mb-3">
            <input type="text" class="form-control" name="message" placeholder="اكتب رسالتك..." required>
            <div class="input-group-append">
                <button class="btn btn-outline-secondary" type="submit">إرسال</button>
            </div>
        </div>
    </form>

</div>

<!-- Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</body>
</html>
