<?php $items = [
        [
            "name" => "Wooden Chair",
            "price" => 200000,
            "rating" => 4,5,
            "sold" => 10,
            "image" => "chair.jpg"
        ],
        [
            "name" => "Baseball",
            "price" => 50000,
            "rating" => 4,2,
            "sold" => 5,
            "image" => "baseball.jpg"
        ],
        [
            "name" => "Camera",
            "price" => 5000000,
            "rating" => 5,
            "sold" => 2,
            "image" => "camera.jpg"
        ],
        [
            "name" => "T-Shirt",
            "price" => 65000,
            "rating" => 4,8,
            "sold" => 23,
            "image" => "t-shirt.jpg"
        ],
    ] 
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Learn PHP 7</title>
</head>
<body>
    <h1>Item list</h1>
    <ul>
        <?php foreach($items as $item) : ?>
            <li>
            <a href="detail.php/?name=<?= $item["name"]?>&price=<?= $item["price"]?>&rating=<?= $item["rating"]?>&sold=<?= $item["sold"]?>&image=<?= $item["image"]?>">
            <?= $item["name"] ?></a>
            </li>
        <?php endforeach; ?>
    </ul>
</body>
</html>