<?php
    include('../../assets/php/checkauth_api.php');
    include('../db2.php');
   
    $file_size1 = $_FILES["image1"]["size"];
    if ($file_size1 > 0) {
        $file_name1 = $_FILES["image1"]["name"];
        $file_extension1 = strtolower(end(explode('.',$file_name1)));
        $upload_tmp1 = $_FILES["image1"]["tmp_name"];
    }

    $file_size2 = $_FILES["image2"]["size"];
    if ($file_size2 > 0) {
        $file_name2 = $_FILES["image2"]["name"];
        $file_extension2 = strtolower(end(explode('.',$file_name2)));
        $upload_tmp2 = $_FILES["image2"]["tmp_name"];
    }

    $file_size3 = $_FILES["image3"]["size"];
    if ($file_size3 > 0) {
        $file_name3 = $_FILES["image3"]["name"];
        $file_extension3 = strtolower(end(explode('.',$file_name3)));
        $upload_tmp3 = $_FILES["image3"]["tmp_name"];
    }

    // Get post request
    $id = (int) $_POST["submit"];
    $name = $_POST["name"];
    $description = $_POST["description"];
    $cost = $_POST["cost"];

    $did_upload = 0;

    // the total image size cannot be more than 30 MB
    if (($file_size1 + $file_size2 + $file_size3) <= 30000000) {
        $upload_time = time();
        $old_images = $db->query("select image from products where id = " . $id)->fetch_assoc()["image"];

        $images = explode(';', $old_images);
        $old_image1 = $images[0];
        $old_image2 = $images[1];
        $old_image3 = $images[2];
        
        if ($file_size1 > 0) {
            $image1 = 'assets/images/a' . $upload_time . '.' . $file_extension1;
            $upload_path = explode('db/api', getcwd())[0] . $image1;

            $did_upload = $did_upload + move_uploaded_file($upload_tmp1, $upload_path);
        }
        else {
            $image1 = $old_image1;
            $did_upload = $did_upload + 1;
        }

        if ($file_size2 > 0) {
            $image2 = 'assets/images/b' . $upload_time . '.' . $file_extension2;
            $upload_path = explode('db/api', getcwd())[0] . $image2;

            $did_upload = $did_upload + move_uploaded_file($upload_tmp2, $upload_path);
        }
        else {
            $image2 = $old_image2;
            $did_upload = $did_upload + 1;
        }

        if ($file_size3 > 0) {
            $image3 = 'assets/images/c' . $upload_time . '.' . $file_extension3;
            $upload_path = explode('db/api', getcwd())[0] . $image3;

            $did_upload = $did_upload + move_uploaded_file($upload_tmp3, $upload_path);
        }
        else {
            $image3 = $old_image3;
            $did_upload = $did_upload + 1;
        }

        $image = $image1 . ';' . $image2 . ';' . $image3;

        if ($did_upload) {
            // Insert product info to database
            if (($file_size1 + $file_size2 + $file_size3) > 0) {
                // Delete old images
                if ($image1 != $old_image1) {
                    unlink(__DIR__ . '/../../assets/images/' . explode('assets/images/', $old_image1)[1]);
                }

                if ($image2 != $old_image2) {
                    unlink(__DIR__ . '/../../assets/images/' . explode('assets/images/', $old_image2)[1]);
                }

                if ($image3 != $old_image3) {
                    unlink(__DIR__ . '/../../assets/images/' . explode('assets/images/', $old_image3)[1]);
                }

                $ready = $db->prepare("update products set name = ? , description = ? , image = ? , cost = ? where id = ?");
                $ready->bind_param('sssdd', $name, $description, $image, $cost, $id);
                $ready->execute();
            }
            else {
                $ready = $db->prepare("update products set name = ? , description = ? , cost = ? where id = ?");
                $ready->bind_param('ssdd', $name, $description, $cost, $id);
                $ready->execute();
            }

            header('Location: /admin');
        }
        else {
            header('Location: /editproduct');
        }
    }
    else {
        header('Location: /editproduct');
    }
?>