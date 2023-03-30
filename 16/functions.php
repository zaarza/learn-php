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

    function register ($data) {
        global $connection;

        $username = strtolower(stripslashes($data["username"]));
        $password = mysqli_real_escape_string($connection, $data["password"]);
        $confirm_password = mysqli_real_escape_string($connection, $data["confirm_password"]);

        if ($password !== $confirm_password) {
            echo "<script>alert('Password not match')</script>";
            return false;
        }

        $CHECK_EXIST_QUERY = "SELECT username FROM users WHERE username = '$username'";
        $check_exist_result = query($CHECK_EXIST_QUERY);

        if ( $check_exist_result ) {
            echo "<script>alert('Username has been used')</script>";
            return false;
        }

        $password = password_hash($password, PASSWORD_DEFAULT);
        mysqli_query($connection, "INSERT INTO users VALUES (null, '$username', '$password')");

        return mysqli_affected_rows($connection);
    };
    
    function upload_image () {
        $file_name = $_FILES["image"]["name"];
        $file_tmp_location = $_FILES["image"]["tmp_name"];
        $file_size = $_FILES["image"]["size"];
        $error = $_FILES["image"]["error"];

        // Check is there a file to upload
        if ($error === 4) {
            echo "<script>alert('No file to upload')</script>";
            return false;
        };

        
        // Check file is image file (method 1)
        // $file_type = $_FILES["image"]["type"];
        // $supported_formats = ['image/jpeg', 'image/png'];
        // if ( !in_array( $file_type, $supported_formats ) ) {
        //     echo "<script>alert('Only image file can uploaded')</script>";
        //     return false;
        // };

        // Check file is image file (method 2)
        $file_type = explode('.', $file_name);
        $file_type = strtolower(end($file_type));
        $supported_formats = ['jpg', 'png', 'jpeg'];

        if ( !in_array( $file_type, $supported_formats ) ) {
            echo "<script>alert('Only image file can uploaded')</script>";
            return false;
        }

        // Check file size (max 1MB)
        $max_size = 1000000;

        if ( $file_size > $max_size ) {
            echo "<script>alert('Max file image size is 1MB')</script>";
            return false;
        }
        
        $new_file_name = time() . '.' . $file_type;

        move_uploaded_file($file_tmp_location, "assets/images/$new_file_name");

        return $new_file_name;
    };

    function new_item ($data) {
        global $connection;

        $name = htmlspecialchars($data["name"]);
        $price = htmlspecialchars($data["price"]);
        $description = htmlspecialchars($data["description"]);
        $rating = htmlspecialchars($data["rating"]);
        $image = upload_image();

        if ( !$image ) {
            return false;
        };

        $sold = htmlspecialchars($data["sold"]);

        $ADD_ITEM_QUERY = "INSERT INTO items VALUES 
                            (null, '$name', $price, '$description', $rating, '$image', $sold)
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
        $previous_image = htmlspecialchars($data["previous_image"]);
        $sold = htmlspecialchars($data["sold"]);

        if ( $_FILES["image"]["error"] === 4 ) {
            $image = $previous_image;
        } else {
            $image = upload_image();
        }

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
    };

    function search_item ($keyword) {
        $SEARCH_ITEM_QUERY = "SELECT * FROM items WHERE 
        name LIKE '%$keyword%' OR
        description LIKE '%$keyword%'
        ";
        return query($SEARCH_ITEM_QUERY);
    };
    
    function login ($data) {
        global $connection;

        $username = strtolower(stripslashes($data["username"]));
        $password = $data["password"];

        // Check if username is exist
        $CHECK_EXIST_QUERY = "SELECT * FROM users WHERE username = '$username'";
        $check_exist_result = mysqli_query($connection, $CHECK_EXIST_QUERY);

        $user = mysqli_fetch_assoc($check_exist_result);

        if ( !$user ) {
            return false;
        };

        // Verify password
        if ( !password_verify($password, $user["password"]) ) {
            return false;
        };

        $_SESSION["user"] = $user;
        header("Location: index.php");
        return true;
    };
?>