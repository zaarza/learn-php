<?php 
    session_start();
    require("functions.php");

    if ( isset($_COOKIE[hash("sha256", "username")]) && isset($_COOKIE[hash("sha256", "id")])) {
        $_SESSION["username"] = $_COOKIE[hash("sha256", "username")];
        $_SESSION["id"] = $_COOKIE[hash("sha256", "id")];
    }

    if ( !isset($_SESSION["id"]) && !isset($_SESSION["username"]) ) {
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