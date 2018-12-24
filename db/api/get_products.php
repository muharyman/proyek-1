<?php
    // return array of object Product
    function getProducts() {
        include('db/db.php'); // now we have $db to communicate with database
        include('db/model/Product.php');

        // Prepared Statement (prepare, bind, execute) -> prevent SQL injection
        $get_products = $db->query("select * from products");
        
        $products = array();

        while($row = $get_products->fetch_assoc()) {

            $images = explode(';', $row["image"]);

            $image1 = $images[0];
            $image2 = $images[1];
            $image3 = $images[2];

            array_push($products, new Product(
                $row["id"],
                $row["name"],
                $row["description"],
                $image1,
                $image2,
                $image3,
                $row["time"],
                $row["cost"])
            );
        }

        return $products;
    }
?>