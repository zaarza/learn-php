<?php 
    session_start();
    require("functions.php");
    
    if ( isset($_COOKIE[hash("sha256", "username")]) && isset($_COOKIE[hash("sha256", "id")])) {
        $_SESSION["username"] = $_COOKIE[hash("sha256", "username")];
        $_SESSION["id"] = $_COOKIE[hash("sha256", "id")];
    }

    if ( !isset($_SESSION["id"]) && !isset($_SESSION["username"]) ) {
        header("Location: login.php");
        exit;
    };

    if ( isset($_POST["submit"]) ) {
        if (new_item($_POST) > 0) {
            echo "<script>
                alert('Item added');
                document.location.href = 'index.php';
            </script>";
        } else {
            echo "<script>
                alert('Failed');
                document.location.href = 'add-new-item.php';
            </script>";
        };
    };
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add new item</title>
    <style>
        .new-item-form {
            display: flex;
            flex-direction: column;
            row-gap: 20px;
        }

        .new-item-form__items {
            display: flex;
            flex-direction: column;
            row-gap: 10px;
        }
    </style>
</head>
<body>
    <h1>New Item</h1>
    <a href="index.php">Back</a>

    <br><br>

    <form class="new-item-form" action="" method="POST" enctype="multipart/form-data">
        <div class="new-item-form__items">
            <label for="name">Name</label>
            <input type="text" name="name" id="name" required>
        </div>
    
        <div class="new-item-form__items">
            <label for="price">Price</label>
            <input type="text" name="price" id="price" required>
        </div>
    
        <div class="new-item-form__items">
            <label for="description">Description</label>
            <input type="text" name="description" id="description" required>
        </div>
    
        <div class="new-item-form__items">
            <label for="rating">Rating</label>
            <input type="text" name="rating" id="rating" required>
        </div>
    
        <div class="new-item-form__items">
            <label for="image">Image</label>
            <input type="file" name="image" id="image">
        </div>
    
        <div class="new-item-form__items">
            <label for="sold">Sold</label>
            <input type="text" name="sold" id="sold" required>
        </div>

        <button type="submit" name="submit">+ Add</button>
    </form>
</body>
</html>