<?php 
    require("functions.php");

    $id = $_GET["id"];
    $item = query("SELECT * FROM items WHERE id = $id");

    if ( isset($_POST["submit"]) ) {
        if (edit_item($id, $_POST) > 0) {
            echo "<script>
                alert('Item updated');
                document.location.href = 'index.php';
            </script>";
        } else {
            echo "<script>
                alert('Failed to update item');
                document.location.href = 'index.php';
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
        .item-preview {
            width: 200px;
        }
    </style>
</head>
<body>
    <h1>Edit Item</h1>
    <a href="index.php">Back</a>

    <br><br>
    <img class="item-preview" src="./assets/images/<?= $item[0]["image"] ?>" alt="">

    <form class="new-item-form" action="" method="POST" enctype="multipart/form-data">
        <input type="hidden" name="previous_image" value="<?= $item[0]["image"]?>">
        <div class="new-item-form__items">
            <label for="name">Name</label>
            <input type="text" name="name" id="name" required value="<?= $item[0]["name"]?>">
        </div>
    
        <div class="new-item-form__items">
            <label for="price">Price</label>
            <input type="text" name="price" id="price" required value="<?= $item[0]["price"]?>">
        </div>
    
        <div class="new-item-form__items">
            <label for="description">Description</label>
            <input type="text" name="description" id="description" required value="<?= $item[0]["description"]?>">
        </div>
    
        <div class="new-item-form__items">
            <label for="rating">Rating</label>
            <input type="text" name="rating" id="rating" required value="<?= $item[0]["rating"]?>">
        </div>
    
        <div class="new-item-form__items">
            <label for="image">Image</label>
            <input type="file" name="image" id="image" value="<?= $item[0]["image"]?>">
        </div>
    
        <div class="new-item-form__items">
            <label for="sold">Sold</label>
            <input type="text" name="sold" id="sold" required value="<?= $item[0]["sold"]?>">
        </div>

        <button type="submit" name="submit">Save</button>
    </form>
</body>
</html>