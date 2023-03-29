<!-- Conditional statement -->

<?php 

// 1. if else
$student_grade = 75;

if ($student_grade > 75) {
    echo "pass";
} else {
    echo "fail";
};

?>

<br>

<?php
// 2. if else if
if ($student_grade > 75) {
    echo "pass";
} else if ($student_grade === 75)  {
    echo "remedy";
}
else {
    echo "fail";
};

?>

<br>

<?php
// 3. ternary operator
echo $student_grade > 75 ? "pass" : "fail";

// 4. switch
switch (true) {
    case ($student_grade > 75 ):
        echo "pass";
        break;
    default:
        echo "fail";
}
?>