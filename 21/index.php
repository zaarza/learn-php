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

        @media print {
            .print {
                display: none;
            }
        }
    </style>
</head>
<body>
    <a href="logout.php" class="print">Logout</a>
    <a href="index.php" class="print">Reset</a>
    <h1>Item List</h1>
    <a href="add-new-item.php" class="print">Add new item</a>

    <br class="print">
    <br class="print">

    <form action="" method="GET" class="print">
        <input type="text" name="keyword" id="search-input" placeholder="Search by name..." autocomplete="off" autofocus>
        <button type="submit" name="search" id="search-submit">Search</button>
    </form>

    <br class="print">
    <br class="print">

    <a href="print.php" target="_blank" class="print">Print</a>
    <br>
    <br>

    <div id="table__container">
        <table class="table">
            <tr>
                <th class="table__item table__item--head">No.</th>
                <th class="table__item table__item--head">Name</th>
                <th class="table__item table__item--head">Price</th>
                <th class="table__item table__item--head">Description</th>
                <th class="table__item table__item--head">Rating</th>
                <th class="table__item table__item--head">Image</th>
                <th class="table__item table__item--head">Sold</th>
                <th class="table__item table__item--head print">Action</th>
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
                    <td class="table__item print"><a href="edit-item.php?id=<?= $item["id"]?>">Edit</a> | <a href="delete-item.php?id=<?= $item["id"]?>" onclick="return confirm('Delete item?')">Remove</a></td>
                </tr>
            <?php endforeach; ?>
        </table>
    </div>
    <script src="./script/main.js"></script>
</body>
</html>