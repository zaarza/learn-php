<?php 
    session_start();
    require("functions.php");

    if ( !isset($_SESSION["user"]) ) {
        header("Location: login.php");
        exit;
    };

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