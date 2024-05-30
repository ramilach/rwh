<?php
session_start();


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    include('bdcon.php');

    
    $email = mysqli_real_escape_string($con, $_POST["email"]);
    $password = mysqli_real_escape_string($con, $_POST["password"]);

    
    $sql = "SELECT * FROM userdata WHERE email = '$email'";
    $result = mysqli_query($con, $sql);

    if ($result) {
        if (mysqli_num_rows($result) == 1) {
            
            $row = mysqli_fetch_assoc($result);
            $hashed_password = $row['password'];

            
            if (password_verify($password, $hashed_password)) {
                
                $_SESSION['user_id'] = $row['userid']; 
                header("Location: /source-code/buyer.php");
                exit();
            } else {
                $_SESSION["status"] = "كلمة مرور غير صحيحة. الرجاء المحاولة مرة أخرى.";
            }
            } else {
                $_SESSION["status"] = "البريد الإلكتروني غير موجود. الرجاء التسجيل.";
            }
            
    } else {
        
        $_SESSION["status"] = "Error: " . mysqli_error($con);
    }

    
    mysqli_close($con);

   
    header("Location: /source-code/login.php");
    exit();
} else {
    
    header("Location: /source-code/login.php");
    exit();
}
?>
