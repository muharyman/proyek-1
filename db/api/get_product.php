<?php
    // return object Product if exist, else return 0
    function getProduct($id) {
        include('db/db.php'); // now we have $db to communicate with database
        include('db/model/Product.php');

        // Prepared Statement (prepare, bind, execute) -> prevent SQL injection
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
            return new Product(
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
            return 0;
        }
    }
?>