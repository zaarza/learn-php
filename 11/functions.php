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
    };

    function new_item ($data) {
        global $connection;

        $name = htmlspecialchars($data["name"]);
        $price = htmlspecialchars($data["price"]);
        $description = htmlspecialchars($data["description"]);
        $rating = htmlspecialchars($data["rating"]);
        $image = htmlspecialchars($data["image"]);
        $sold = htmlspecialchars($data["sold"]);

        $ADD_ITEM_QUERY = "INSERT INTO items VALUES 
                            (null, '$name', $price, $description, $rating, '$image', $sold)
                        ";
        mysqli_query($connection, $ADD_ITEM_QUERY);

        return mysqli_affected_rows($connection);
    };

    function delete_item ($id) {
        global $connection;
        mysqli_query($connection, "DELETE FROM items WHERE id = $id");
        return mysqli_affected_rows($connection);
    };
    
    function edit_item ($id, $data) {
        global $connection;

        $name = htmlspecialchars($data["name"]);
        $price = htmlspecialchars($data["price"]);
        $description = htmlspecialchars($data["description"]);
        $rating = htmlspecialchars($data["rating"]);
        $image = htmlspecialchars($data["image"]);
        $sold = htmlspecialchars($data["sold"]);

        $EDIT_ITEM_QUERY = "UPDATE items SET 
                            name = '$name',
                            price = '$price',
                            description = '$description',
                            rating = '$rating',
                            image = '$image',
                            sold = '$sold' 
                            WHERE id = $id";
                            
        mysqli_query($connection, $EDIT_ITEM_QUERY);

        return mysqli_affected_rows($connection);
    }
?>