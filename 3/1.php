<?php 
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

$ii = 1;
do {
    echo "Do while loop $ii <br>";
    $ii++;
} while ($ii <=5);
?>