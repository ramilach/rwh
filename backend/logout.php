<?php
session_start();


$_SESSION = array();


session_destroy();


header("Location: /source-code/login.php");
exit();
?>
