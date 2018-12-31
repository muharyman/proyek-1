<?php
    function getSearch($input) {
        include('db/db.php'); // now we have $db to communicate with database
        include('db/model/Product.php');

        $string = $input;

        // Prepared Statement (prepare, bind, execute) -> prevent SQL injection
        $ready = $db->prepare("select id, name, description, image, time, cost from products where name like CONCAT('%',?,'%')");
        $ready->bind_param('s', $string);
        $ready->execute();
        
        $ready->store_result();
        $ready->bind_result($id, $name, $description, $image, $time, $cost);

        $products = array();
        while($ready->fetch()) {
            $images = explode(';', $image);

            $image1 = $images[0];
            $image2 = $images[1];
            $image3 = $images[2];

            array_push($products, new Product(
                $id,
                $name,
                $description,
                $image1,
                $image2,
                $image3,
                $time,
                $cost
            ));
        }

        return $products;
    }
?>