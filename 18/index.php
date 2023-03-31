<?php 
    session_start();
    require("functions.php");

    if ( !isset($_GET["keyword"]) ) {
        $_GET["keyword"] = "";
    };

    if ( !isset($_GET["page"]) ){
        $_GET["page"] = 1;
    };

    $keyword = $_GET["keyword"];

    if ( isset($_COOKIE[hash("sha256", "username")]) && isset($_COOKIE[hash("sha256", "id")])) {
        $_SESSION["username"] = $_COOKIE[hash("sha256", "username")];
        $_SESSION["id"] = $_COOKIE[hash("sha256", "id")];
    }

    if ( !isset($_SESSION["id"]) && !isset($_SESSION["username"]) ) {
        header("Location: login.php");
        exit;
    };

    $current_page = $_GET["page"];
    $total_data_per_page = 3;
    $initial_data = ($current_page * $total_data_per_page) - $total_data_per_page;

    if ( $keyword != '') {
        $items = query("SELECT * FROM items WHERE name LIKE '%$keyword%' LIMIT $initial_data, $total_data_per_page");
        $total_data = count(query("SELECT * FROM items WHERE name LIKE '%$keyword%'"));
    } else {
        $total_data = count(query("SELECT * FROM items"));
        $items = query("SELECT * FROM items LIMIT $initial_data, $total_data_per_page");
    };

    $total_page = ceil($total_data / $total_data_per_page);
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

        a {
            color: black;
            text-decoration: none;
        }
        
        .active {
            font-weight: bold;
        }

    </style>
</head>
<body>
    <a href="logout.php">Logout</a>
    <a href="index.php">RESET</a>
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


    <?php if ($current_page > 1) : ?>
        <a href="?page=<?= $current_page - 1 ?>">&laquo;</a>
    <?php endif; ?>

    <?php for ($i = 1; $i <= $total_page; $i++) : ?>
        <a href="./?keyword=<?= $keyword ?>&page=<?= $i ?>" class="<?= $i == $current_page ? 'active' : '' ?>"><?= $i ?></a>
    <?php endfor; ?>

    <?php if ($current_page != $total_page) : ?>
        <a href="?page=<?= $current_page + 1 ?>">&raquo;</a>
    <?php endif; ?>


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

        <?php foreach($items as $index => $item) : ?>
            <tr>
                <td class="table__item"><?= $initial_data + $index + 1 ?></td>
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

    <br>
    <br>

    <?php if ($current_page != 1) : ?>
        <a href="?page=<?= $current_page - 1 ?>">&laquo;</a>
    <?php endif; ?>

    <?php for ($i = 1; $i <= $total_page; $i++) : ?>
        <a href="?page=<?= $i ?>" class="<?= $i == $current_page ? 'active' : '' ?>"><?= $i ?></a>
    <?php endfor; ?>

    <?php if ($current_page != $total_page) : ?>
        <a href="?page=<?= $current_page + 1 ?>">&raquo;</a>
    <?php endif; ?>

</body>
</html>