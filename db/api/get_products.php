<?php
    // return array of object Product
    function getProducts() {
        include('db/db.php'); // now we have $db to communicate with database
        include('Product.php');

        // Prepared Statement (prepare, bind, execute) -> prevent SQL injection
        $get_products = $db->query("select * from products");
        
        $products = array();

        while($row = $get_products->fetch_assoc()) {
            array_push($orders, new Product(
                $row["id"],
                $row["name"],
                $row["description"],
                $row["stock"],
                $row["image"],
                $row["time"],
                $row["cost"])
            );
        }

        return $products;
    }
?>