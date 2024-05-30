<?php
include('bdcon.php');


$search = isset($_POST['search']) ? mysqli_real_escape_string($con, $_POST['search']) : '';
$category = isset($_POST['category']) ? mysqli_real_escape_string($con, $_POST['category']) : 'all';


$category_condition = ($category != 'all') ? " AND category = '$category'" : "";


$query = "SELECT p.*, u.name, u.rating FROM post p JOIN userdata u ON p.userid = u.userid 
          WHERE (posttitle LIKE '%$search%' OR postdescription LIKE '%$search%') $category_condition";

$result = mysqli_query($con, $query);

if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
        echo '<div class="col-md-4">';
        echo '<div class="card">';
        echo '<div class="card-header">' . $row['name'] . '</div>'; 
        echo '<div class="card-body">';
        echo '<h5 class="card-title">' . $row['posttitle'] . '</h5>';
        echo '<p class="card-text">' . $row['postdescription'] . '</p>';
        echo '<p class="card-text">المهارات: ' . $row['skills'] . '</p>';
        echo '<p class="card-text"> السعر: دينار ' . $row['price'] . '</p>';
        echo '<p class="card-text">الفئة: ' . $row['category'] . '</p>';
        echo '<p class="card-text">الوقت: ' . $row['time'] . '</p>';
        echo '<p class="card-text">الموقع: ' . $row['postlocation'] . '</p>';

        
        $rating = $row['rating'];
        $stars = '';
        for ($i = 0; $i < $rating; $i++) {
            $stars .= '<span class="fa fa-star checked"></span>';
        }
        echo '<p class="card-text">التقييم: ' . $stars . '</p>';

        
        echo '<a href="backend/propose.php?postid=' . $row['postid'] . '&sellerid=' . $row['userid'] . '" class="btn btn-primary">اقتراح</a>';
        echo '</div>';
        echo '</div>';
        echo '</div>';
    }
} else {
    echo '<p>لم يتم العثور على منشورات.</p>';
}

mysqli_close($con);
?>
