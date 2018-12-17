<?php
    // return object Product if exist, else return 0
    function getProduct($id) {
        include('db/db.php'); // now we have $db to communicate with database
        include('Product.php');

        // Prepared Statement (prepare, bind, execute) -> prevent SQL injection
        $ready = $db->prepare("select * from products where id = ?");
        $ready->bind_param('s', $id);
        $ready->execute();
        
        // Get the result of execution
        $row = $ready->get_result();

        // Check whether the product is exist or not
        if (mysqli_num_rows($row)) {

            // return an object Product
            return new Product(
                $row["id"],
                $row["name"],
                $row["description"],
                $row["stock"],
                $row["image"],
                $row["time"]
            );
        }
        else {
            return 0;
        }
    }
?>