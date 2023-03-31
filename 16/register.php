<?php 
    require('functions.php');

    if (isset($_POST['submit'])) {
        if (register($_POST) > 0) {
            echo "<script>alert('Register succesfully')</script>";
        } else {
            echo "<script>alert('Register failed')</script>";
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <style>
        form {
            display: flex;
            flex-direction: column;
            row-gap: 10px;
        }
        .input-items {
            display: flex;
            flex-direction: column;
            row-gap: 10px;
        }
    </style>
</head>
<body>
    <h1>Register</h1>

    <form action="" method="POST">
        <div class="input-items">
            <label for="username">Username</label>
            <input type="text" name="username" id="username">
        </div>

        <div class="input-items">
            <label for="password">Password</label>
            <input type="password" name="password" id="password">
        </div>

        <div class="input-items">
            <label for="password">Confirm password</label>
            <input type="password" name="confirm_password" id="confirm_password">
        </div>

        <button type="submit" name="submit">Register</button>
    </form>
</body>
</html>