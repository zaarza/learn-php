<!-- <?php 
// Looping
// 1. For

for ($index = 1; $index <= 5; $index++) {
    echo "For loop $index <br>";
};

echo "<br>";

// 2. While
$i = 1;
while ($i <=5) {
    echo "While loop $i <br>";
    $i++;
};

echo "<br>";

// 3. Do while
$ii = 1;
do {
    echo "Do while loop $ii <br>";
    $ii++;
} while ($ii <=5);


?> -->

<!-- Implementation -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Learn PHP 3</title>

    <style>
        .colored {
            background-color: gray;
        }
    </style>
</head>
<body>
    <table border="1">
        <?php for ($row = 1; $row <= 3; $row ++) : ?>
            <?php if ($row % 2 === 0) { ?>
                <tr class="colored">
            <?php } else { ?>
                <tr>
            <?php }?>
                <?php for ($column = 1; $column <= 5; $column++) : ?>
                    <td>
                        <?= "row $row, column $column"; ?>
                    </td>
                <?php endfor; ?>
            </tr>
        <?php endfor; ?>
    </table>
</body>
</html>