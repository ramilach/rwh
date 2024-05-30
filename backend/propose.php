<?php
include('bdcon.php');
session_start(); // Start the session

if (isset($_GET['postid']) && isset($_GET['sellerid']) && isset($_SESSION['user_id'])) {
    $postid = mysqli_real_escape_string($con, $_GET['postid']);
    $sellerid = mysqli_real_escape_string($con, $_GET['sellerid']);
    $userid = mysqli_real_escape_string($con, $_SESSION['user_id']);

    
    $checkQuery = "SELECT * FROM proposal WHERE userid='$userid' AND sellerid='$sellerid' AND postid='$postid'";
    $checkResult = mysqli_query($con, $checkQuery);

    if (mysqli_num_rows($checkResult) > 0) {
        
        header("Location: /source-code/seller.php?message=" . urlencode("لقد تم تقديم العرض من فبل"));
        exit();
    } else {
        
        $query = "INSERT INTO proposal (userid, sellerid, postid) VALUES ('$userid', '$sellerid', '$postid')";
        if (mysqli_query($con, $query)) {
           
            header("Location: /source-code/seller.php?message=" . urlencode(".تم تقديم العرض بنجاح"));
            exit();
        } else {
            
            header("Location: /source-code/seller.php?message=" . urlencode("خطأ في تقديم العرض: " . mysqli_error($con)));
            exit();
        }
    }
} else {
    
    header("Location: /source-code/seller.php?message=" . urlencode("Invalid input"));
    exit();
}

if (isset($con)) {
    mysqli_close($con);
}
?>
