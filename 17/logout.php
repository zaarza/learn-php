<?php 
    session_start();
    $_SESSION = [];
    session_unset();
    session_destroy();
    setcookie(hash("sha256", "username"), '', time() - 3600);
    setcookie(hash("sha256", "id"), '', time() - 3600);

    header("Location: login.php");
    exit;
?>