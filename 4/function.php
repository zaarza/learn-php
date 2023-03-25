<?php 
    function greet($time = "morning", $name = "User") {
        return "Good $time, $name!";
    };
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Learn PHP 4</title>
</head>
<body>
    <?= greet("night", "Arza"); ?>
    <br>
    <?= greet(); ?>
</body>
</html>