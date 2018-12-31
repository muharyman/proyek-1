<?php
    include('../../assets/php/checkauth_api.php');
    include('get_product.php');
    include('../db2.php');
    include('../model/Product.php');

    $id = (int) $_GET["id"];
    
    $ready = $db->prepare("select name, description, image, time, cost from products where id = ?");
    $ready->bind_param('d', $id);
    $ready->execute();

    $ready->store_result();
    $ready->bind_result($name, $description, $image, $time, $cost);

    // Check whether the product is exist or not
    if ($ready->fetch()) {
        $images = explode(';', $image);

        $image1 = $images[0];
        $image2 = $images[1];
        $image3 = $images[2];

        // return an object Product
        $product = new Product(
            $id,
            $name,
            $description,
            $image1,
            $image2,
            $image3,
            $time,
            $cost
        );
    }
    else {
        $product = 0;
    }

    if ($product) {
        unlink(__DIR__ . '/../../assets/images/' . explode('assets/images/', $product->image1)[1]);
        unlink(__DIR__ . '/../../assets/images/' . explode('assets/images/', $product->image2)[1]);
        unlink(__DIR__ . '/../../assets/images/' . explode('assets/images/', $product->image3)[1]);

        $ready = $db->prepare("delete from products where id = ?");
        $ready->bind_param('d', $id);
        $ready->execute();
    }

    header('Location: /admin');
?>