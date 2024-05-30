<?php
session_start();
include('bdcon.php');

if(isset($_POST['signup_btn'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password']; 
    $hashed_password = password_hash($password, PASSWORD_DEFAULT); 
    $birthdate = $_POST['birthdate'];

    
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $_SESSION['status'] = "الرجاء إدخال عنوان بريد إلكتروني صحيح.";
        header("Location: /source-code/signup.php");
        exit;
    }
    

    
    $verify_token = md5(rand()); 
    $query = "INSERT INTO userdata (name, email, password, birthdate, verify_token) VALUES ('$name', '$email', '$hashed_password', '$birthdate', '$verify_token')";
    $query_run = mysqli_query($con, $query);
    
    if($query_run) {
        
        header("Location: /source-code/get_token.php");
        exit; 
    } else {
        $_SESSION['status'] = "Registration failed!";
    }
    
    header("Location: /source-code/signup.php"); 
    exit; 
}
?>
