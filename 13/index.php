<?php 
    require("functions.php");

    if (isset($_GET["search"])) {
        $keyword = $_GET["keyword"];
        $items = search_item($keyword);
    } else {
        $items = query("SELECT * FROM items");
    };
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Learn PHP 9</title>
    <style>
        body {
            font-family: sans-serif;
            font-size: 14px;
            background-color: #eaeaea
        }
        .table {
            border-collapse: collapse;
            overflow: auto;
            max-width: 768px;
        }

        .table__item {
            border: 1px solid black;
            padding: 10px
        }

        .table__item--head {
            background-color: black;
            color: white;
        }

        .table__image {
            width: 100px;
            aspect-ratio: 1;
            object-fit: cover;
        }

    </style>
</head>
<body>
    <h1>Item List</h1>
    <a href="add-new-item.php">Add new item</a>

    <br>
    <br>

    <form action="" method="GET">
        <input type="text" name="keyword" id="keyword" placeholder="Search by name..." autocomplete="off" autofocus>
        <button type="submit" name="search">Search</button>
    </form>

    <br>
    <br>

    <table class="table">
        <tr>
            <th class="table__item table__item--head">No.</th>
            <th class="table__item table__item--head">Name</th>
            <th class="table__item table__item--head">Price</th>
            <th class="table__item table__item--head">Description</th>
            <th class="table__item table__item--head">Rating</th>
            <th class="table__item table__item--head">Image</th>
            <th class="table__item table__item--head">Sold</th>
            <th class="table__item table__item--head">Action</th>
        </tr>

        <?php foreach($items as $item) : ?>
            <tr>
                <td class="table__item"><?= $item["id"] ?></td>
                <td class="table__item"><?= $item["name"] ?></td>
                <td class="table__item">Rp. <?= $item["price"] ?></td>
                <td class="table__item"><?= $item["description"] ?></td>
                <td class="table__item"><?= $item["rating"] ?></td>
                <td class="table__item"><img class="table__image" src="./assets/images/<?= $item["image"] ?>" alt=""></td>
                <td class="table__item"><?= $item["sold"] ?></td>
                <td class="table__item"><a href="edit-item.php?id=<?= $item["id"]?>">Edit</a> | <a href="delete-item.php?id=<?= $item["id"]?>" onclick="return confirm('Delete item?')">Remove</a></td>
            </tr>
        <?php endforeach; ?>
    </table>
</body>
</html>