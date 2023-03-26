<?php 
    $items = [
        [
            "name" => "Wooden Chair",
            "price" => 200000,
            "rating" => 4,5,
            "sold" => 10,
            "image" => "./assets/chair.jpg"
        ],
        [
            "name" => "Baseball",
            "price" => 50000,
            "rating" => 4,2,
            "sold" => 5,
            "image" => "./assets/baseball.jpg"
        ],
        [
            "name" => "Camera",
            "price" => 5000000,
            "rating" => 5,
            "sold" => 2,
            "image" => "./assets/camera.jpg"
        ],
        [
            "name" => "T-Shirt",
            "price" => 65000,
            "rating" => 4,8,
            "sold" => 23,
            "image" => "./assets/t-shirt.jpg"
        ],
    ]
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Learn PHP 6</title>
</head>
<style>
    * {
        padding: 0;
        margin: 0;
        box-sizing: border-box;
    }
    body  {
        background-color: #eaeaea;
        padding: 50px;
        font-family: sans-serif;
        font-size: 12px;
    }

    .items {
        display: flex;
        flex-direction: column;
        row-gap: 50px;
    }
    .item {
        background-color: white;
        padding: 25px 30px;
        border-radius: 12px;
        display: flex;
        flex-direction: column;
        row-gap: 5px;
    }
    .item__image {
        width: 200px;
        object-position: cover;
    }

</style>
<body>
    <ul class="items">
        <?php foreach($items as $item) : ?>
            <li class="item">
                <h1 class="item__name"><?= $item["name"] ?></h1>
                <h2 class="item__price">Rp. <?= $item["price"] ?></h2>
                <h3 class="item__rating">Rating <?= $item["rating"] ?></h3>
                <h4 class="item__sold">Sold <?= $item["sold"] ?></h4>
                <img class="item__image" src=<?= $item["image"] ?> alt="Item image">
            </li>
        <?php endforeach; ?>
    </ul>
</body>
</html>