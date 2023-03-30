<?php 
    session_start();
    require("functions.php");

    if ( isset($_SESSION["user"]) ) {
        header("Location: index.php");
        exit;
    }

    if ( isset($_POST["submit"]) ) {
        if ( login($_POST) ) {
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

        <button type="submit" name="submit">Login</button>
    </form>
</body>
</html>