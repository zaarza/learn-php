<?php 
    $connection = mysqli_connect("127.0.0.1", "root", "", "learn-php");

    function query ($query) {
        global $connection;
        $result = mysqli_query($connection, $query);

        $itemsArray = [];

        while ( $item = mysqli_fetch_assoc($result) ) {
            $itemsArray[] = $item;
        };

        return $itemsArray;
    }
?>