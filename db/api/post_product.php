<?php
    include('../../assets/php/checkauth_api.php');
    include('../db2.php');

    // Get image 1 info
    $file_name1 = $_FILES["image1"]["name"];
    $file_size1 = $_FILES["image1"]["size"];
    $file_extension1 = strtolower(end(explode('.',$file_name1)));
    $upload_tmp1 = $_FILES["image1"]["tmp_name"];

    // Get image 2 info
    $file_name2 = $_FILES["image2"]["name"];
    $file_size2 = $_FILES["image2"]["size"];
    $file_extension2 = strtolower(end(explode('.',$file_name2)));
    $upload_tmp2 = $_FILES["image2"]["tmp_name"];

    // Get image 3 info
    $file_name3 = $_FILES["image3"]["name"];
    $file_size3 = $_FILES["image3"]["size"];
    $file_extension3 = strtolower(end(explode('.',$file_name3)));
    $upload_tmp3 = $_FILES["image3"]["tmp_name"];

    // Get post request
    $name = $_POST["name"];
    $description = $_POST["description"];
    $cost = $_POST["cost"];

    $did_upload = 0;

    // the total image size cannot be more than 30 MB
    if (($file_size1 + $file_size2 + $file_size3) <= 30000000) {
        $upload_time = time();

        // Move image 1 to assets/images
        if ($file_size1 > 0) {
            $image1 = 'assets/images/a' . $upload_time . '.' . $file_extension1;
            $upload_path = explode('db/api', getcwd())[0] . $image1;
            $did_upload = $did_upload + move_uploaded_file($upload_tmp, $upload_path);
        }
        else {
            $image1 = '.';
        }

        // Move image 2 to assets/images
        if ($file_size2 > 0) {
            $image2 = 'assets/images/b' . $upload_time . '.' . $file_extension2;
            $upload_path = explode('db/api', getcwd())[0] . $image2;
            $did_upload = $did_upload + move_uploaded_file($upload_tmp, $upload_path);
        }
        else {
            $image2 = '.';
        }

        // Move image 3 to assets/images
        if ($file_size3 > 0) {
            $image3 = 'assets/images/c' . $upload_time . '.' . $file_extension3;
            $upload_path = explode('db/api', getcwd())[0] . $image3;
            $did_upload = $did_upload + move_uploaded_file($upload_tmp, $upload_path);
        }
        else {
            $image3 = '.';
        }

        $image = $image1 . ';' . $image2 . ';' . $image3;

        if ($did_upload) {
            // Insert product info to database
            $ready = $db->prepare("insert into products (name, description, image, cost) values (?, ?, ?, ?, ?)");
            $ready->bind_param('ssdsd', $name, $description, $image, $cost);
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