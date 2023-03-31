<?php 
    session_start();
    require("functions.php");

    if ( isset($_COOKIE[hash("sha256", "username")]) && isset($_COOKIE[hash("sha256", "id")])) {
        $_SESSION["username"] = $_COOKIE[hash("sha256", "username")];
        $_SESSION["id"] = $_COOKIE[hash("sha256", "id")];
    }

    if ( isset($_SESSION["id"]) && isset($_SESSION["username"]) ) {
        header("Location: index.php");
        exit;
    };

    if ( isset($_POST["submit"]) ) {
        if ( login($_POST) ) {
            if (isset($_POST["remember"])) {
                setcookie(hash("sha256", "id"), hash("sha256", $_SESSION["id"]), time()+60*60*24*2);
                setcookie(hash("sha256", "username"), hash("sha256", $_SESSION["username"]), time()+60*60*24*2);
            };
            header("Location: index.php");
            exit;
        } else {
            $error = true;
        }
    };
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <style>
        .login-fail-message {
            color: red;
        }

        .login-form {
            display: flex;
            flex-direction: column;
            row-gap: 10px;
        }
    </style>
</head>
<body>
    <h1>Login</h1>

    <?php if (isset($error)) : ?>
        <p class="login-fail-message">Username / password salah</p>
    <?php endif; ?>
    
    <form action="" method="POST" class="login-form">
        <div class="login-form__items">
            <label for="username">Username</label>
            <input type="text" name="username" id="username">
        </div>

        <div class="login-form__items">
            <label for="password">Password</label>
            <input type="password" name="password" id="password">
        </div>

        <div class="login-form__items">
            <label for="remember">Remember me</label>
            <input type="checkbox" name="remember" id="remember">
        </div>

        <button type="submit" name="submit">Login</button>
    </form>
</body>
</html>