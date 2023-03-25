<?php 
// PHP Syntax

/*  Standard output:
    There is 4 kind in PHP:

    echo or print: used for print something to html
    print_r: same as echo but is specially for array type
    var_dump: used to view detail about the content
*/


/*  2 ways to write code:
    1. PHP inside HTML
    2. HTML inside PHP

    Recomended to use PHP inside HTML because it makes more clearly to divide HTML and PHP
*/

/*  Variable
    => Variable in PHP is dynamic type like Javascript

    Use dollar symbol followed by variable name

    example: $variable = "content"
*/
$firstname = "Arzaqul";
$surname = "Mughny";

/* 
    Operator
    - Aritmethic * / + - %
    - String concate using (.)
    - Perbandingan
    - Logic && || !
*/


echo $firstname . " " .$surname;
?>
<!-- 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Belajar PHP 2</title>
</head>
<body>
    <h1>Hello <?php echo $name?></h1>
</body>
</html> -->