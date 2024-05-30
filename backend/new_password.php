<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    include('bdcon.php');

    
    $email = mysqli_real_escape_string($con, $_POST["email"]);
    $verify_token = mysqli_real_escape_string($con, $_POST["verify_token"]);
    $new_password = mysqli_real_escape_string($con, $_POST["password"]);

    
    $sql = "SELECT * FROM userdata WHERE email = '$email' AND verify_token = '$verify_token'";
    $result = mysqli_query($con, $sql);

    if (mysqli_num_rows($result) == 1) {
        
        $hashed_password = password_hash($new_password, PASSWORD_DEFAULT);

        
        $update_sql = "UPDATE userdata SET password = '$hashed_password' WHERE email = '$email'";
        if (mysqli_query($con, $update_sql)) {
            
            $_SESSION["status"] = "Password updated successfully. Please login with your new password.";
            mysqli_close($con);
            header("Location: /source-code/login.php");
            exit();
        } else {
            $_SESSION["status"] = "Error updating password: " . mysqli_error($con);
        }
    } else {
        
        $_SESSION["status"] = "Incorrect email or verification token. Please try again.";
    }

    
    mysqli_close($con);

    
    header("Location: /source-code/forgot_password.php");
    exit();
}
?>
