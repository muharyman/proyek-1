<?php
    include('../../assets/php/checkauth_api.php');
    include('get_product.php');
    include('../db2.php');
    include('../model/Product.php');

    $id = (int) $_GET["id"];
    
    $ready = $db->prepare("select * from products where id = ?");
    $ready->bind_param('d', $id);
    $ready->execute();

    $row = $ready->get_result();

    if (mysqli_num_rows($row)) {
        $a = $row->fetch_assoc();

        $images = explode(';', $a["image"]);

        $image1 = $images[0];
        $image2 = $images[1];
        $image3 = $images[2];

        $product = new Product(
            $id,
            $a["name"],
            $a["description"],
            $image1,
            $image2,
            $image3,
            $a["time"],
            $a["cost"]
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