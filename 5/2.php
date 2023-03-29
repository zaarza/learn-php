<?php 
    $students = ["Udin", "Bagas", "Edo"];

    for ($index = 0; $index < count($students); $index++) {
        echo $students[$index] . "<br>";
    }

    foreach($students as $student) {
        echo $student;
    }
?>