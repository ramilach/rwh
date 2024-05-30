<?php
session_start();
include('bdcon.php');

if(isset($_POST['email'])) {
    $email = $_POST['email'];

    
    $query = "SELECT verify_token FROM userdata WHERE email = '$email' LIMIT 1";
    $result = mysqli_query($con, $query);

    if(mysqli_num_rows($result) == 1) {
        $row = mysqli_fetch_assoc($result);
        $verify_token = $row['verify_token'];
        $_SESSION['verify_token'] = $verify_token; 
        header("Location: /source-code/show_token.php"); 
        exit;
    } else {
        $_SESSION['status'] = "خطأ: لم يتم العثور على رمز التحقق";
        header("Location: /source-code/show_token.php");
        exit;
    }
    } else {
        $_SESSION['status'] = "خطأ: البريد الإلكتروني غير مُقدم";
    
    header("Location: /source-code-show_token.php");
    exit;
}
?>
