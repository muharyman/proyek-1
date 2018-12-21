<?php
    include('../../assets/php/checkauth_api.php');
    include('../db2.php');

    // Get image info
    $file_name = $_FILES["image"]["name"];
    $file_size = $_FILES["image"]["size"];
    $file_extension = strtolower(end(explode('.',$file_name)));
    $upload_tmp = $_FILES["image"]["tmp_name"];

    // Get post request
    $name = $_POST["name"];
    $description = $_POST["description"];
    $stock = $_POST["stock"];
    $cost = $_POST["cost"];

    // the image size cannot be more than 10 MB
    if ($file_size <= 10000000) {
        $upload_time = time();
        $image = 'assets/images/a' . $upload_time . '.' . $file_extension;
        $upload_path = explode('db/api', getcwd())[0] . $image;

        $did_upload = move_uploaded_file($upload_tmp, $upload_path);

        if ($did_upload) {
            // Insert product info to database
            $ready = $db->prepare("insert into products (name, description, stock, image, cost) values (?, ?, ?, ?, ?)");
            $ready->bind_param('ssdsd', $name, $description, $stock, $image, $cost);
            $ready->execute();

            header('Location: /products');
        }
        else {
            header('Location: /addproduct');
        }
    }
    else {
        header('Location: /addproduct');
    }
?>