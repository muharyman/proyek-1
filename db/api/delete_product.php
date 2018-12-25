<?php
    include('../../assets/php/checkauth_api.php');

    $id = $_GET["id"];

    if ($id) {
        $product = getProduct($id);
    }
    else {
        $product = getProduct(1);
    }

    if ($product) {
        unlink(__DIR__ . '/../../assets/images/' . explode('assets/images/', $product->image1)[1]);
        unlink(__DIR__ . '/../../assets/images/' . explode('assets/images/', $product->image2)[1]);
        unlink(__DIR__ . '/../../assets/images/' . explode('assets/images/', $product->image3)[1]);
    }

    header('Location: /admin');
?>