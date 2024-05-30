<?php
session_start();

include('bdcon.php');

if(isset($_SESSION['user_id'])) {
    $userId = $_SESSION['user_id'];
    
    
    if(isset($_GET['delete_post']) && isset($_GET['postid'])) {
        $postId = mysqli_real_escape_string($con, $_GET['postid']);
        
        
        $deleteQuery = "DELETE FROM post WHERE userid = $userId AND postid = $postId";
        if(mysqli_query($con, $deleteQuery)) {
            
            header("Location: {$_SERVER['PHP_SELF']}");
            exit();
        } else {
            echo "Error deleting post: " . mysqli_error($con);
        }
    }
    
    
    $query = "SELECT * FROM post WHERE userid = $userId";
    $result = mysqli_query($con, $query);

    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            echo '<div class="col-md-4">';
            echo '<div class="card mb-4">';
            echo '<div class="card-body">';
            echo '<h5 class="card-title">' . $row['posttitle'] . '</h5>';
            echo '<p class="card-text">' . $row['postdescription'] . '</p>';
            echo '<p class="card-text">المهارات: ' . $row['skills'] . '</p>';
            echo '<p class="card-text">السعر: دينار' . $row['price'] . '</p>';
            echo '<p class="card-text">الفئة: ' . $row['category'] . '</p>';
            echo '<p class="card-text">الوقت: ' . $row['time'] . '</p>';
            echo '<p class="card-text">الموقع: ' . $row['postlocation'] . '</p>';
          
            echo '<div class="text-center">';
            echo '<a href="http://localhost/source-code/editpost.php?postid=' . $row['postid'] . '" class="btn btn-orange mb-2">تعديل</a>'; 
            echo '<a href="?delete_post=true&postid=' . $row['postid'] . '" class="btn btn-orange mb-2">حذف</a>';
            echo '<a href="http://localhost/source-code/view_proposals.php?postid=' . $row['postid'] . '" class="btn btn-orange mb-2">العروض</a>';
            echo '</div>';
            echo '</div>';
            echo '</div>';
            echo '</div>';
        }
    } else {
        echo '<p>لا توجد مشاركات.</p>';
    }
} else {
    header("Location: /source-code/login.php");
    exit();
}

mysqli_close($con);
?>
