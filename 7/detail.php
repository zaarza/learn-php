<?php 
    if (!isset($_GET["name"]) || 
        !isset($_GET["price"]) || 
        !isset($_GET["rating"]) || 
        !isset($_GET["image"])) {
        header("Location: ../1.php");
        exit;
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail</title>
</head>
<body>
    <h1><?= $_GET["name"]; ?></h1>
    <p>Rp. <?= $_GET["price"]; ?></p>
    <p>Rating: <?= $_GET["rating"]; ?></p>
    <p>Sold <?= $_GET["price"]; ?></p>
    <img src="../<?= $_GET["image"];?>" alt="Item image">
    <a href="../1.php">Back</a>
</body>
</html>