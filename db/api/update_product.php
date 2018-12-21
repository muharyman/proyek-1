<?php
    include('../../assets/php/checkauth_api.php');
    include('../db2.php');

    $isUploadImage = true;
   
    $file_size = $_FILES["image"]["size"];
    if ($file_size == 0) {
        $isUploadImage = false;
    }

    if ($isUploadImage) {
        $file_name = $_FILES["image"]["name"];
        $file_extension = strtolower(end(explode('.',$file_name)));
        $upload_tmp = $_FILES["image"]["tmp_name"];
    }

    // Get post request
    $id = $_POST["submit"];
    $name = $_POST["name"];
    $description = $_POST["description"];
    $stock = $_POST["stock"];
    $cost = $_POST["cost"];

    // the image size cannot be more than 10 MB
    if ($file_size <= 10000000) {
        if ($isUploadImage) {
            $upload_time = time();
            $image = 'assets/images/a' . $upload_time . '.' . $file_extension;
            $upload_path = explode('db/api', getcwd())[0] . $image;

            $did_upload = move_uploaded_file($upload_tmp, $upload_path);
        }
        else {
            $did_upload = 1;
        }

        if ($did_upload) {
            // Insert product info to database
            if ($isUploadImage) {
                $old_path = $db->query("select image from products where id = " . $id)->fetch_assoc()["image"];

                // Delete old image
                unlink(__DIR__ . '/../../assets/images/' . explode('assets/images/', $old_path)[1]);

                $ready = $db->prepare("update products set name = ? , description = ? , stock = ? , image = ? , cost = ? where id = ?");
                $ready->bind_param('ssdsdd', $name, $description, $stock, $image, $cost, $id);
                $ready->execute();
            }
            else {
                $ready = $db->prepare("update products set name = ? , description = ? , stock = ? , cost = ? where id = ?");
                $ready->bind_param('ssddd', $name, $description, $stock, $cost, $id);
                $ready->execute();
            }

            header('Location: /products');
        }
        else {
            header('Location: /editproduct');
        }
    }
    else {
        header('Location: /editproduct');
    }
?>