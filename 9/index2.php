<?php 
    $connection = mysqli_connect('localhost', 'root', '', 'learn-php');
    $result = mysqli_query($connection, "SELECT * FROM items");
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

        <?php while ( $items = mysqli_fetch_assoc($result)) : ?>
                <tr>
                    <td class="table__item"><?= $items["id"] ?></td>
                    <td class="table__item"><?= $items["name"] ?></td>
                    <td class="table__item">Rp. <?= $items["price"] ?></td>
                    <td class="table__item"><?= $items["description"] ?></td>
                    <td class="table__item"><?= $items["rating"] ?></td>
                    <td class="table__item"><img class="table__image" src="./assets/images/<?= $items["image"] ?>" alt=""></td>
                    <td class="table__item"><?= $items["sold"] ?></td>
                    <td class="table__item"><a href="">Edit</a> | <a href="">Remove</a></td>
                 </tr>
        <?php endwhile; ?>
    </table>
</body>
</html>