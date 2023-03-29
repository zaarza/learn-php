<?php 
    require("functions.php");

    $id = $_GET["id"];
    if ( delete_item($id) > 0 ) {
        echo "<script>
                alert('Item with id $id deleted');
                document.location.href = 'index.php';
            </script>";
    } else {
        echo "<script>
                alert('Failed to delete item!');
                document.location.href = 'index.php';
            </script>";
    }
?>