<?php
    // date()
    // Require at least 1 parameter
    echo ('Today is ' . date('l'));
    echo "<br>";
    echo ('Current date is ' . date('F, d Y'));

    echo "<br>";
    echo "<br>";

    // time
    echo time();
    echo "<br>";
    echo ('Three days later from now is ' . date('l', time()+60*60*24*3));
    echo "<br>";
    echo ('Three days ago from now is ' . date('l', time()-60*60*24*3));

    echo "<br>";
    echo "<br>";

    // mktime
    $born_at = mktime(0,0,0,3,27,2003);
    echo ('I was born at ' . date('l', $born_at));

    echo "<br>";
    echo "<br>";

    // strtotime
    echo date('l', strtotime('27 march 2003'));
?>